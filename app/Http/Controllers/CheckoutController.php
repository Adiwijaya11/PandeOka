<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Product;
use App\Services\CartService;
use App\Services\ProductCatalog;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\View\View;

class CheckoutController extends Controller
{
    /**
     * Display the dedicated "Beli Sekarang" / Checkout page.
     */
    public function index(Request $request): View|RedirectResponse
    {
        $productId = $request->query('product_id');
        $quantity = max(1, (int) $request->query('quantity', 1));
        $variation = $request->query('variation');

        $isDirect = false;
        $items = collect();

        // 1. Direct "Beli Sekarang" from Product Detail
        if ($productId) {
            $product = Product::find($productId);
            if (! $product) {
                $catalogItem = ProductCatalog::findById((int) $productId);
                if ($catalogItem) {
                    $product = (object) $catalogItem;
                }
            }

            if (! $product) {
                return redirect()->route('home')->with('error', 'Produk tidak ditemukan.');
            }

            if (! $variation) {
                $variation = ($product->finish ?? 'Natural Solid Wood').' • Ukuran: '.($product->dimensions ?? 'Standar Workshop');
            }

            $items->push((object) [
                'id' => 'direct_'.($product->id ?? $productId),
                'product' => $product,
                'quantity' => $quantity,
                'variation' => $variation,
            ]);

            $isDirect = true;
        } else {
            // 2. Checkout from Shopping Cart
            $cartItems = CartService::getItems();
            $selected = $cartItems->where('is_selected', true);
            $items = $selected->isNotEmpty() ? $selected : $cartItems;

            if ($items->isEmpty()) {
                return redirect()->route('home')->with('error', 'Keranjang belanja Anda kosong. Silakan pilih produk terlebih dahulu.');
            }
        }

        // Calculate Totals
        $subtotal = 0;
        foreach ($items as $item) {
            $price = (int) ($item->product->price ?? 0);
            $subtotal += $price * $item->quantity;
        }

        $voucherCode = $request->query('voucher', 'PANDEOKA2026');
        $voucherDiscount = ($voucherCode === 'PANDEOKA2026' && $subtotal >= 500000) ? 250000 : 0;
        $grandTotal = max(0, $subtotal - $voucherDiscount);

        $customer = Auth::user();

        return view('checkout', compact(
            'items',
            'subtotal',
            'voucherCode',
            'voucherDiscount',
            'grandTotal',
            'isDirect',
            'customer'
        ));
    }

    /**
     * Process checkout order and download the SPK Excel file output.
     */
    public function process(Request $request): Response|RedirectResponse
    {
        $validated = $request->validate([
            'customer_name' => ['required', 'string', 'max:100'],
            'customer_phone' => ['required', 'string', 'max:30'],
            'customer_email' => ['nullable', 'email', 'max:100'],
            'customer_notes' => ['nullable', 'string', 'max:500'],
            'payment_method' => ['nullable', 'string', 'max:50'],
            'voucher_code' => ['nullable', 'string', 'max:50'],
            'product_id' => ['nullable'],
            'quantity' => ['nullable', 'integer', 'min:1'],
            'variation' => ['nullable', 'string', 'max:255'],
        ]);

        $items = collect();
        $isDirect = ! empty($validated['product_id']);

        if ($isDirect) {
            $productId = $validated['product_id'];
            $product = Product::find($productId);
            if (! $product) {
                $catalogItem = ProductCatalog::findById((int) $productId);
                if ($catalogItem) {
                    $product = (object) $catalogItem;
                }
            }

            if (! $product) {
                return redirect()->route('home')->with('error', 'Produk tidak ditemukan.');
            }

            $items->push((object) [
                'id' => 'direct_'.($product->id ?? $productId),
                'product' => $product,
                'quantity' => max(1, (int) ($validated['quantity'] ?? 1)),
                'variation' => $validated['variation'] ?? (($product->finish ?? 'Natural Solid Wood').' • Ukuran: '.($product->dimensions ?? 'Standar')),
            ]);
        } else {
            $cartItems = CartService::getItems();
            $selected = $cartItems->where('is_selected', true);
            $items = $selected->isNotEmpty() ? $selected : $cartItems;

            if ($items->isEmpty()) {
                return redirect()->route('home')->with('error', 'Keranjang belanja Anda kosong.');
            }
        }

        // Calculate Totals
        $subtotalTotal = 0;
        foreach ($items as $item) {
            $unitPrice = (int) ($item->product->price ?? 0);
            $subtotalTotal += $unitPrice * $item->quantity;
        }

        $voucherCode = $validated['voucher_code'] ?? 'PANDEOKA2026';
        $discountTotal = ($voucherCode === 'PANDEOKA2026' && $subtotalTotal >= 500000) ? 250000 : 0;
        $grandTotal = max(0, $subtotalTotal - $discountTotal);

        $orderNumber = 'SPK-PO-'.date('Ymd').'-'.strtoupper(Str::random(5));
        $orderDate = date('d F Y, H:i').' WITA';

        $customerName = $validated['customer_name'];
        $customerPhone = $validated['customer_phone'];
        $customerEmail = $validated['customer_email'] ?: (Auth::user()?->email ?? 'workshop@pandeoka.id');

        // Render Excel template
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

        // If checkout came from shopping cart, clear those purchased cart items
        if (! $isDirect) {
            $purchasedIds = $items->pluck('id')->filter(fn ($id) => is_numeric($id))->all();
            if (! empty($purchasedIds)) {
                CartItem::whereIn('id', $purchasedIds)->delete();
            }
        }

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
