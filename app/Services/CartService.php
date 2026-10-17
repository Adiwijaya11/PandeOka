<?php

namespace App\Services;

use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartService
{
    /**
     * Get the active session ID safely.
     */
    public static function getSessionId(): ?string
    {
        if (request()->hasSession()) {
            return request()->session()->getId();
        }

        if (Session::isStarted()) {
            return Session::getId();
        }

        try {
            Session::start();

            return Session::getId();
        } catch (\Throwable) {
            return null;
        }
    }

    /**
     * Get the base query scoped to current user or guest session.
     */
    protected static function query()
    {
        $userId = Auth::id();
        $sessionId = self::getSessionId();

        return CartItem::query()
            ->when($userId, function ($query, $userId) {
                return $query->where('user_id', $userId);
            }, function ($query) use ($sessionId) {
                if ($sessionId) {
                    return $query->whereNull('user_id')->where('session_id', $sessionId);
                }

                return $query->whereRaw('1 = 0');
            });
    }

    /**
     * Migrate guest cart items to the authenticated user on login.
     */
    public static function migrateGuestCart(int $userId, ?string $sessionId = null): void
    {
        $sessionId = $sessionId ?? self::getSessionId();
        if (! $sessionId) {
            return;
        }

        $guestItems = CartItem::whereNull('user_id')->where('session_id', $sessionId)->get();

        foreach ($guestItems as $guestItem) {
            $userQuery = CartItem::where('user_id', $userId)
                ->where('product_id', $guestItem->product_id);

            if ($guestItem->variation !== null && $guestItem->variation !== '') {
                $userQuery->where('variation', $guestItem->variation);
            } else {
                $userQuery->whereNull('variation');
            }

            $userItem = $userQuery->first();

            if ($userItem) {
                $userItem->quantity += $guestItem->quantity;
                $userItem->save();
                $guestItem->delete();
            } else {
                $guestItem->user_id = $userId;
                $guestItem->session_id = null;
                $guestItem->save();
            }
        }
    }

    /**
     * Get all cart items with product loaded.
     *
     * @return Collection<int, CartItem>
     */
    public static function getItems(): Collection
    {
        return self::query()->with('product')->orderBy('id', 'desc')->get();
    }

    /**
     * Get total quantity count of all items in cart.
     */
    public static function getCount(): int
    {
        return (int) self::query()->sum('quantity');
    }

    /**
     * Add a product to the cart.
     */
    public static function addItem(int $productId, int $quantity = 1, ?string $variation = null): CartItem
    {
        $product = Product::findOrFail($productId);
        $userId = Auth::id();
        $sessionId = self::getSessionId();

        $query = CartItem::where('product_id', $productId);
        if ($variation !== null && $variation !== '') {
            $query->where('variation', $variation);
        } else {
            $query->whereNull('variation');
        }

        if ($userId) {
            $query->where('user_id', $userId);
        } else {
            $query->whereNull('user_id')->where('session_id', $sessionId);
        }

        $item = $query->first();

        if ($item) {
            $newQty = $item->quantity + $quantity;
            if ($product->stock > 0 && $newQty > $product->stock) {
                $newQty = $product->stock;
            }
            $item->quantity = $newQty;
            $item->save();
        } else {
            $item = CartItem::create([
                'user_id' => $userId,
                'session_id' => $userId ? null : $sessionId,
                'product_id' => $productId,
                'quantity' => max(1, $quantity),
                'variation' => $variation,
                'is_selected' => true,
            ]);
        }

        return $item->load('product');
    }

    /**
     * Update item quantity.
     */
    public static function updateQuantity(int $cartItemId, int $quantity): ?CartItem
    {
        $item = self::query()->with('product')->find($cartItemId);
        if (! $item) {
            return null;
        }

        if ($quantity <= 0) {
            $item->delete();

            return null;
        }

        $stock = $item->product?->stock ?? 999;
        $item->quantity = min($quantity, $stock);
        $item->save();

        return $item;
    }

    /**
     * Toggle or set item selection status.
     */
    public static function setSelected(int $cartItemId, bool $isSelected): ?CartItem
    {
        $item = self::query()->find($cartItemId);
        if ($item) {
            $item->is_selected = $isSelected;
            $item->save();
        }

        return $item;
    }

    /**
     * Select or deselect all items.
     */
    public static function selectAll(bool $isSelected): void
    {
        self::query()->update(['is_selected' => $isSelected]);
    }

    /**
     * Remove an item from the cart.
     */
    public static function removeItem(int $cartItemId): bool
    {
        $item = self::query()->find($cartItemId);
        if ($item) {
            return (bool) $item->delete();
        }

        return false;
    }

    /**
     * Clear all items from the cart.
     */
    public static function clear(): void
    {
        self::query()->delete();
    }

    /**
     * Get summary metrics for the cart.
     *
     * @return array<string, mixed>
     */
    public static function getSummary(): array
    {
        $items = self::getItems();
        $totalItems = $items->sum('quantity');
        $selectedItems = $items->where('is_selected', true);

        $selectedCount = $selectedItems->sum('quantity');
        $subtotal = 0;
        $originalTotal = 0;

        foreach ($selectedItems as $item) {
            $price = $item->product?->price ?? 0;
            $origPrice = $item->product?->original_price ?? $price;
            $subtotal += ($price * $item->quantity);
            $originalTotal += ($origPrice * $item->quantity);
        }

        $savings = max(0, $originalTotal - $subtotal);

        return [
            'total_items' => $totalItems,
            'selected_count' => $selectedCount,
            'subtotal' => $subtotal,
            'formatted_subtotal' => 'Rp '.number_format($subtotal, 0, ',', '.'),
            'original_total' => $originalTotal,
            'formatted_original_total' => 'Rp '.number_format($originalTotal, 0, ',', '.'),
            'savings' => $savings,
            'formatted_savings' => 'Rp '.number_format($savings, 0, ',', '.'),
        ];
    }
}
