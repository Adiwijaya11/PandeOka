<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Product;
use App\Services\CartService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\View\View;

class CartController extends Controller
{
    /**
     * Display the shopping cart page.
     */
    public function index(): View
    {
        $cartItems = CartService::getItems();
        $summary = CartService::getSummary();
        $recommendations = Product::inRandomOrder()->take(4)->get();

        return view('cart', compact('cartItems', 'summary', 'recommendations'));
    }

    /**
     * Get JSON data for cart badge, drawer, and live updates.
     */
    public function data(): JsonResponse
    {
        return response()->json([
            'count' => CartService::getCount(),
            'items' => CartService::getItems(),
            'summary' => CartService::getSummary(),
        ]);
    }

    /**
     * Add a product to the cart (CRUD - Create).
     */
    public function store(Request $request): JsonResponse|RedirectResponse
    {
        $validated = $request->validate([
            'product_id' => ['required', 'exists:products,id'],
            'quantity' => ['nullable', 'integer', 'min:1'],
            'variation' => ['nullable', 'string', 'max:255'],
        ]);

        $item = CartService::addItem(
            (int) $validated['product_id'],
            (int) ($validated['quantity'] ?? 1),
            $validated['variation'] ?? null
        );

        $count = CartService::getCount();
        $summary = CartService::getSummary();

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Produk berhasil ditambahkan ke keranjang belanja!',
                'count' => $count,
                'item' => $item,
                'summary' => $summary,
            ]);
        }

        return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }

    /**
     * Update cart item quantity or selection status (CRUD - Update).
     */
    public function update(Request $request, int $id): JsonResponse|RedirectResponse
    {
        $validated = $request->validate([
            'quantity' => ['nullable', 'integer', 'min:0'],
            'is_selected' => ['nullable', 'boolean'],
        ]);

        if (isset($validated['quantity'])) {
            CartService::updateQuantity($id, (int) $validated['quantity']);
        }

        if (isset($validated['is_selected'])) {
            CartService::setSelected($id, (bool) $validated['is_selected']);
        }

        $summary = CartService::getSummary();
        $count = CartService::getCount();

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'count' => $count,
                'summary' => $summary,
            ]);
        }

        return redirect()->route('cart.index')->with('success', 'Keranjang berhasil diperbarui.');
    }

    /**
     * Toggle selection of all items in cart.
     */
    public function toggleAll(Request $request): JsonResponse
    {
        $isSelected = $request->boolean('is_selected', true);
        CartService::selectAll($isSelected);

        return response()->json([
            'success' => true,
            'summary' => CartService::getSummary(),
        ]);
    }

    /**
     * Remove an item from the cart (CRUD - Delete).
     */
    public function destroy(Request $request, int $id): JsonResponse|RedirectResponse
    {
        CartService::removeItem($id);
        $count = CartService::getCount();
        $summary = CartService::getSummary();

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Item berhasil dihapus dari keranjang.',
                'count' => $count,
                'summary' => $summary,
            ]);
        }

        return redirect()->route('cart.index')->with('success', 'Item berhasil dihapus dari keranjang.');
    }

    /**
     * Clear all items from the cart (CRUD - Delete All).
     */
    public function clear(Request $request): JsonResponse|RedirectResponse
    {
        CartService::clear();

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Seluruh isi keranjang belanja berhasil dikosongkan.',
                'count' => 0,
                'summary' => CartService::getSummary(),
            ]);
        }

        return redirect()->route('cart.index')->with('success', 'Seluruh isi keranjang berhasil dikosongkan.');
    }

    /**
     * Checkout selected items and download workshop SPK Excel order.
     */
    public function checkoutExcel(Request $request): Response|RedirectResponse
    {
        $allCartItems = CartService::getItems();
        $selectedItems = $allCartItems->where('is_selected', true);

        $items = $selectedItems->isNotEmpty() ? $selectedItems : $allCartItems;

        if ($items->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Keranjang belanja Anda masih kosong. Silakan pilih produk terlebih dahulu.');
        }

        $user = Auth::user();
        $customerName = $request->input('customer_name', $user?->name ?? 'Pelanggan Pande Oka');
        $customerEmail = $request->input('customer_email', $user?->email ?? 'workshop@pandeoka.id');
        $customerPhone = $request->input('customer_phone', $user?->phone ?? '+62 812-3456-7890');

        $orderNumber = 'SPK-PO-'.date('Ymd').'-'.strtoupper(Str::random(5));
        $orderDate = date('d F Y, H:i').' WITA';

        $subtotalTotal = 0;
        foreach ($items as $item) {
            $unitPrice = (int) ($item->product?->price ?? 0);
            $subtotalTotal += $unitPrice * $item->quantity;
        }

        $voucherCode = $request->input('voucher_code', 'PANDEOKA2026');
        $discountTotal = ($voucherCode === 'PANDEOKA2026' && $subtotalTotal >= 500000) ? 250000 : 0;
        $grandTotal = max(0, $subtotalTotal - $discountTotal);

        $content = view('exports.order-excel', compact(
            'items',
            'orderNumber',
            'orderDate',
            'customerName',
            'customerEmail',
            'customerPhone',
            'subtotalTotal',
            'discountTotal',
            'grandTotal'
        ))->render();

        // Clear only the purchased items from cart
        $purchasedIds = $items->pluck('id')->all();
        CartItem::whereIn('id', $purchasedIds)->delete();

        $filename = 'SPK_Pesanan_PandeOka_'.$orderNumber.'.xls';

        return response($content, 200, [
            'Content-Type' => 'application/vnd.ms-excel; charset=utf-8',
            'Content-Disposition' => 'attachment; filename="'.$filename.'"',
            'Cache-Control' => 'no-cache, no-store, must-revalidate',
            'Pragma' => 'no-cache',
            'Expires' => '0',
        ]);
    }
}
