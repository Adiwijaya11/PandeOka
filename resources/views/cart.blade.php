@extends('layouts.app')

@section('title', 'Keranjang Belanja - Pande Oka Furniture Official Store')
@section('meta_description', 'Keranjang belanja furniture kayu jati & sungkai solid resmi Pande Oka. Nikmati gratis ongkir dan promo cicilan 0%.')

@section('content')

{{-- Shopee Style Cart Page Container --}}
<div class="bg-stone-100 min-h-screen py-6 sm:py-8 font-sans pb-28">
    <div class="max-w-7xl mx-auto px-3 sm:px-6 lg:px-8">

        {{-- Shopee Top Header --}}
        <div class="flex items-center justify-between pb-5 border-b border-stone-200 mb-4 bg-white p-4 sm:p-5 rounded-xl shadow-xs">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-orange-600 flex items-center justify-center rounded-lg text-white shrink-0">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                    </svg>
                </div>
                <div>
                    <h1 class="text-xl sm:text-2xl font-black text-stone-900 tracking-tight flex items-center gap-2">
                        Keranjang Belanja
                    </h1>
                    <span class="text-xs text-stone-500 font-medium">
                        Pande Oka Official Store • Garansi 100% Produk Original Kayu Solid Jepara &amp; Bali
                    </span>
                </div>
            </div>

            <a href="{{ url('/') }}" class="hidden sm:inline-flex items-center gap-1.5 text-xs font-bold text-orange-600 hover:text-orange-700 uppercase tracking-wider transition-colors">
                <span>&larr; Lanjut Belanja Furniture</span>
            </a>
        </div>

        {{-- Shopee Free Shipping Notification Bar --}}
        <div class="bg-orange-50 border border-orange-200 rounded-xl p-3.5 sm:p-4 mb-4 flex flex-col sm:flex-row sm:items-center justify-between gap-3 text-xs text-stone-800">
            <div class="flex items-center gap-2.5">
                <span class="px-2 py-0.5 bg-orange-600 text-white font-black text-[10px] rounded uppercase tracking-wider shrink-0">
                    Gratis Ongkir
                </span>
                <span class="text-stone-700">
                    Selamat! Pesanan Anda memenuhi syarat <strong>Bebas Ongkir &amp; Instalasi Area Jawa - Bali</strong>.
                </span>
            </div>
            <a href="{{ url('/') }}" class="text-orange-600 font-bold hover:underline shrink-0 flex items-center gap-1">
                <span>Lanjut Belanja</span>
                <span>&rarr;</span>
            </a>
        </div>

        @if($cartItems->isEmpty())
            {{-- Empty Cart State --}}
            <div class="bg-white rounded-xl border border-stone-200 shadow-xs p-10 sm:p-16 text-center my-6">
                <div class="w-20 h-20 bg-orange-50 text-orange-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                    </svg>
                </div>
                <h2 class="text-lg sm:text-xl font-black text-stone-900 mb-2">Keranjang Belanja Anda Masih Kosong</h2>
                <p class="text-xs sm:text-sm text-stone-500 max-w-md mx-auto mb-6">
                    Yuk isi keranjang dengan furniture kayu solid premium karya pengrajin Jepara &amp; Bali bergaransi 5 tahun.
                </p>
                <div class="flex flex-wrap items-center justify-center gap-3">
                    <a href="{{ url('/') }}" class="px-6 py-3 bg-orange-600 hover:bg-orange-700 text-white font-bold text-xs uppercase tracking-wider rounded-lg shadow-sm transition-colors">
                        Mulai Belanja Furniture &rarr;
                    </a>
                    <a href="{{ route('new-arrivals') }}" class="px-6 py-3 bg-white hover:bg-stone-100 text-stone-800 border border-stone-300 font-bold text-xs uppercase tracking-wider rounded-lg transition-colors">
                        Lihat Koleksi Terbaru
                    </a>
                </div>
            </div>
        @else
            {{-- Shopee Table Header (Desktop Only) --}}
            <div class="hidden lg:grid grid-cols-12 gap-4 bg-white p-4 rounded-xl border border-stone-200 text-xs font-bold text-stone-600 uppercase tracking-wider shadow-xs mb-3">
                <div class="col-span-5 flex items-center gap-3">
                    <input type="checkbox" 
                           id="check-all-top" 
                           {{ $cartItems->every(fn($i) => $i->is_selected) ? 'checked' : '' }} 
                           onchange="toggleSelectAll(this)" 
                           class="w-4 h-4 rounded text-orange-600 focus:ring-orange-500 border-stone-300 accent-orange-600 cursor-pointer">
                    <label for="check-all-top" class="cursor-pointer text-stone-900">Produk</label>
                </div>
                <div class="col-span-2 text-center">Harga Satuan</div>
                <div class="col-span-2 text-center">Kuantitas</div>
                <div class="col-span-2 text-center">Total Harga</div>
                <div class="col-span-1 text-center">Aksi</div>
            </div>

            {{-- Shopee Store Cart Card --}}
            <div class="bg-white rounded-xl border border-stone-200 shadow-xs overflow-hidden mb-4">
                
                {{-- Store Name Header --}}
                <div class="p-4 border-b border-stone-200 flex items-center justify-between bg-stone-50">
                    <div class="flex items-center gap-3">
                        <input type="checkbox" 
                               id="check-store" 
                               {{ $cartItems->every(fn($i) => $i->is_selected) ? 'checked' : '' }} 
                               onchange="toggleSelectAll(this)" 
                               class="w-4 h-4 rounded text-orange-600 focus:ring-orange-500 border-stone-300 accent-orange-600 cursor-pointer">
                        <span class="px-2 py-0.5 bg-orange-600 text-white font-black text-[10px] tracking-wider uppercase rounded">
                            MALL
                        </span>
                        <span class="text-xs sm:text-sm font-black text-stone-900">
                            Pande Oka Furniture Official Store
                        </span>
                        <span class="w-2 h-2 rounded-full bg-green-500 ml-1" title="Online"></span>
                    </div>
                    
                    <a href="https://wa.me/6281234567890" target="_blank" class="text-xs text-orange-600 hover:text-orange-700 font-bold flex items-center gap-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                        </svg>
                        <span class="hidden sm:inline">Chat Penjual</span>
                    </a>
                </div>

                {{-- Dynamic Cart Items List --}}
                <div id="shopee-items-wrapper">
                    @foreach($cartItems as $item)
                        @php
                            $product = $item->product;
                            $unitPrice = $product->price ?? 0;
                            $originalPrice = $product->original_price ?? $unitPrice;
                            $image = $product->image ?? 'https://images.unsplash.com/photo-1555041469-a586c61ea9bc?auto=format&fit=crop&w=300&q=80';
                        @endphp
                        <div class="p-4 border-b border-stone-100 shopee-cart-row transition-opacity" 
                             id="cart-row-{{ $item->id }}" 
                             data-id="{{ $item->id }}" 
                             data-unit-price="{{ $unitPrice }}">
                            <div class="grid grid-cols-1 lg:grid-cols-12 gap-4 items-center">
                                
                                {{-- Checkbox + Image + Title + Variation --}}
                                <div class="lg:col-span-5 flex items-start gap-3">
                                    <input type="checkbox" 
                                           {{ $item->is_selected ? 'checked' : '' }} 
                                           onchange="handleItemCheckboxChange({{ $item->id }}, this.checked)" 
                                           class="item-checkbox w-4 h-4 rounded text-orange-600 focus:ring-orange-500 border-stone-300 accent-orange-600 mt-1 cursor-pointer">
                                    
                                    <a href="{{ $product ? route('products.show', $product->slug) : '#' }}" class="w-20 h-20 sm:w-24 sm:h-24 bg-stone-100 rounded-lg overflow-hidden border border-stone-200 shrink-0 block hover:opacity-90 transition-opacity">
                                        <img src="{{ $image }}" 
                                             alt="{{ $product->name ?? 'Produk' }}" 
                                             class="w-full h-full object-cover">
                                    </a>

                                    <div class="flex-1 min-w-0">
                                        @if($product && !empty($product->badges) && is_array($product->badges))
                                            <span class="px-1.5 py-0.5 bg-orange-100 text-orange-700 text-[10px] font-bold rounded uppercase">
                                                {{ $product->badges[0] }}
                                            </span>
                                        @elseif($product)
                                            <span class="px-1.5 py-0.5 bg-stone-100 text-stone-700 text-[10px] font-bold rounded uppercase">
                                                {{ $product->category }}
                                            </span>
                                        @endif

                                        <a href="{{ $product ? route('products.show', $product->slug) : '#' }}" class="text-xs sm:text-sm font-bold text-stone-900 mt-1 leading-snug line-clamp-2 hover:text-orange-600 transition-colors block">
                                            {{ $product->name ?? 'Produk Furniture Solid' }}
                                        </a>

                                        @if($item->variation || ($product && $product->wood_type))
                                            <div class="mt-2 inline-flex items-center gap-1.5 px-2 py-1 bg-stone-100 text-stone-600 rounded text-[11px]">
                                                <span>Variasi: {{ $item->variation ?? ($product->wood_type ?? 'Kayu Solid') }}</span>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                {{-- Harga Satuan --}}
                                <div class="lg:col-span-2 flex lg:flex-col lg:items-center justify-between text-xs">
                                    <span class="lg:hidden text-stone-500 font-medium">Harga Satuan:</span>
                                    <div class="text-right lg:text-center">
                                        @if($originalPrice > $unitPrice)
                                            <span class="text-stone-400 line-through text-[11px] block">{{ 'Rp ' . number_format($originalPrice, 0, ',', '.') }}</span>
                                        @endif
                                        <span class="font-bold text-stone-900 text-sm">{{ 'Rp ' . number_format($unitPrice, 0, ',', '.') }}</span>
                                    </div>
                                </div>

                                {{-- Kuantitas Selector (Shopee Style: - [ 1 ] +) --}}
                                <div class="lg:col-span-2 flex lg:justify-center justify-between items-center text-xs">
                                    <span class="lg:hidden text-stone-500 font-medium">Kuantitas:</span>
                                    <div class="flex items-center border border-stone-300 rounded overflow-hidden">
                                        <button type="button" 
                                                onclick="updateShopeeItemQty({{ $item->id }}, -1)" 
                                                class="w-7 h-7 bg-white hover:bg-stone-100 text-stone-600 font-bold flex items-center justify-center border-r border-stone-300 transition-colors">
                                            -
                                        </button>
                                        <input type="number" 
                                               value="{{ $item->quantity }}" 
                                               min="1" 
                                               max="{{ $product->stock ?? 99 }}" 
                                               id="item-qty-input-{{ $item->id }}"
                                               onchange="handleShopeeQtyInput({{ $item->id }}, this.value)"
                                               class="w-12 h-7 bg-white text-stone-900 font-bold text-center text-xs item-qty-value focus:outline-none [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none">
                                        <button type="button" 
                                                onclick="updateShopeeItemQty({{ $item->id }}, 1)" 
                                                class="w-7 h-7 bg-white hover:bg-stone-100 text-stone-600 font-bold flex items-center justify-center border-l border-stone-300 transition-colors">
                                            +
                                        </button>
                                    </div>
                                </div>

                                {{-- Total Harga (Solid Orange) --}}
                                <div class="lg:col-span-2 flex lg:justify-center justify-between items-center">
                                    <span class="lg:hidden text-stone-500 text-xs font-medium">Total:</span>
                                    <span class="text-sm font-black text-orange-600 row-total-price" id="row-total-{{ $item->id }}">
                                        {{ $item->formatted_subtotal }}
                                    </span>
                                </div>

                                {{-- Aksi: Hapus --}}
                                <div class="lg:col-span-1 flex lg:justify-center justify-end">
                                    <button type="button" 
                                            onclick="deleteShopeeItem({{ $item->id }})" 
                                            class="text-xs text-stone-500 hover:text-red-600 transition-colors font-medium flex items-center gap-1 focus:outline-none p-1"
                                            title="Hapus Produk">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                        <span class="lg:hidden">Hapus</span>
                                    </button>
                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- Shopee Store Voucher Strip --}}
                <div class="p-4 bg-orange-50/50 border-t border-stone-200 flex flex-col sm:flex-row sm:items-center justify-between gap-3 text-xs">
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"/>
                        </svg>
                        <span class="font-bold text-stone-900">Voucher Toko:</span>
                        <span class="text-orange-700 font-semibold" id="voucher-status-text">Kupon Potongan Rp 250.000 Aktif</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <input type="text" 
                               id="voucher-input"
                               placeholder="Kode voucher: PANDEOKA2026" 
                               value="PANDEOKA2026"
                               class="bg-white border border-stone-300 rounded px-2.5 py-1 text-xs outline-none focus:border-orange-600">
                        <button type="button" 
                                onclick="applyVoucher()"
                                class="px-3 py-1 bg-stone-900 hover:bg-orange-600 text-white font-bold rounded text-xs transition-colors">
                            Gunakan
                        </button>
                    </div>
                </div>

            </div>
        @endif

        {{-- Shopee Style "Kamu Mungkin Juga Suka" Recommendation (Real Products from Database) --}}
        @if(isset($recommendations) && $recommendations->isNotEmpty())
            <div class="mt-10">
                <h2 class="text-sm font-black text-stone-900 uppercase tracking-wider mb-4 flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-orange-600"></span>
                    <span>Kamu Mungkin Juga Suka (Pelengkap Ruangan)</span>
                </h2>

                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    @foreach($recommendations as $rec)
                        <div class="bg-white border border-stone-200 rounded-xl overflow-hidden shadow-xs hover:border-orange-500 transition-colors p-3 flex flex-col justify-between">
                            <a href="{{ route('products.show', $rec->slug) }}" class="block">
                                <div class="aspect-square bg-stone-100 rounded-lg overflow-hidden mb-2">
                                    <img src="{{ $rec->image }}" alt="{{ $rec->name }}" class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                                </div>
                                <div>
                                    <span class="text-[10px] text-stone-500 uppercase">{{ $rec->category }}</span>
                                    <h4 class="text-xs font-bold text-stone-900 line-clamp-1 hover:text-orange-600 transition-colors">{{ $rec->name }}</h4>
                                    <span class="text-xs font-black text-orange-600 block mt-1">{{ $rec->formatted_price }}</span>
                                </div>
                            </a>
                            <button type="button" 
                                    data-id="{{ $rec->id }}"
                                    data-name="{{ $rec->name }}"
                                    data-price="{{ $rec->price }}"
                                    data-formatted-price="{{ 'Rp ' . number_format($rec->price, 0, ',', '.') }}"
                                    data-original-price="{{ $rec->original_price ?? '' }}"
                                    data-formatted-original-price="{{ $rec->original_price ? 'Rp ' . number_format($rec->original_price, 0, ',', '.') : '' }}"
                                    data-image="{{ $rec->image }}"
                                    data-stock="{{ $rec->stock ?? 10 }}"
                                    data-finish="{{ $rec->finish ?? 'Natural Satin Doff' }}"
                                    data-dimensions="{{ $rec->dimensions ?? 'Standard' }}"
                                    onclick="triggerShopeeQuickAdd(this)"
                                    class="mt-2.5 w-full py-1.5 bg-stone-100 hover:bg-orange-600 hover:text-white text-stone-800 text-[11px] font-bold rounded transition-colors flex items-center justify-center gap-1 active:scale-[0.98]">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                </svg>
                                <span>+ Tambah</span>
                            </button>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

    </div>
</div>

{{-- Sticky Floating Bottom Checkout Bar (Shopee Signature Bottom Bar) --}}
@if(!$cartItems->isEmpty())
<div class="fixed bottom-0 inset-x-0 z-40 bg-white border-t border-stone-300 shadow-[0_-4px_16px_rgba(0,0,0,0.08)]">
    <div class="max-w-7xl mx-auto px-3 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between py-3 sm:py-4 gap-2 sm:gap-4">
            
            {{-- Left Side: Select All & Delete Selected & Clear --}}
            <div class="flex items-center gap-3 sm:gap-5 text-xs text-stone-700">
                <div class="flex items-center gap-2">
                    <input type="checkbox" 
                           id="check-all-bottom" 
                           {{ $cartItems->every(fn($i) => $i->is_selected) ? 'checked' : '' }} 
                           onchange="toggleSelectAll(this)" 
                           class="w-4 h-4 rounded text-orange-600 focus:ring-orange-500 border-stone-300 accent-orange-600 cursor-pointer">
                    <label for="check-all-bottom" class="cursor-pointer font-bold text-stone-900 whitespace-nowrap">
                        Pilih Semua (<span id="total-items-badge">{{ $summary['total_items'] ?? $cartItems->sum('quantity') }}</span>)
                    </label>
                </div>

                <button type="button" 
                        onclick="deleteSelectedShopeeItems()" 
                        class="hidden sm:inline text-stone-500 hover:text-red-600 transition-colors font-medium">
                    Hapus Terpilih
                </button>

                <button type="button" 
                        onclick="clearWholeCart()" 
                        class="hidden sm:inline text-stone-400 hover:text-red-600 transition-colors font-medium">
                    Kosongkan
                </button>

                <div class="hidden md:flex items-center gap-1.5 text-stone-500 text-[11px]">
                    <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span>
                    <span>Garansi Toko Resmi • 100% Kayu Solid</span>
                </div>
            </div>

            {{-- Right Side: Total Price & Big Orange Checkout Button --}}
            <div class="flex items-center gap-3 sm:gap-6">
                <div class="text-right">
                    <div class="flex items-baseline justify-end gap-1.5 leading-none">
                        <span class="text-xs text-stone-600 hidden sm:inline">Total (<span id="selected-qty-text">{{ $summary['selected_count'] ?? 0 }}</span> produk):</span>
                        <span id="shopee-grand-total" class="text-base sm:text-2xl font-black text-orange-600">
                            {{ $summary['formatted_subtotal'] ?? 'Rp 0' }}
                        </span>
                    </div>
                    <span id="shopee-saving-text" class="text-[10px] sm:text-xs text-stone-500 block mt-1">
                        Hemat <strong class="text-orange-600" id="shopee-saving-val">{{ $summary['formatted_savings'] ?? 'Rp 0' }}</strong> (Diskon + Voucher)
                    </span>
                </div>

                {{-- Shopee Big Checkout Button --}}
                <button type="button" 
                        id="shopee-checkout-btn"
                        onclick="proceedToShopeeCheckout()"
                        class="py-3 sm:py-3.5 px-6 sm:px-10 bg-orange-600 hover:bg-orange-700 text-white font-black text-xs sm:text-sm uppercase tracking-wider rounded-lg transition-colors shadow-sm shrink-0">
                    Checkout (<span id="checkout-btn-count">{{ $summary['selected_count'] ?? 0 }}</span>)
                </button>
            </div>

        </div>
    </div>
</div>
@endif

@push('scripts')
<script>
    let voucherDiscount = 250000;

    // Toggle Select All Checkbox via AJAX
    async function toggleSelectAll(masterCheckbox) {
        const isChecked = masterCheckbox.checked;

        // Synchronize UI checkboxes immediately (optimistic UI)
        document.querySelectorAll('.item-checkbox').forEach(cb => {
            cb.checked = isChecked;
        });

        const topAll = document.getElementById('check-all-top');
        const bottomAll = document.getElementById('check-all-bottom');
        const storeAll = document.getElementById('check-store');
        if (topAll) topAll.checked = isChecked;
        if (bottomAll) bottomAll.checked = isChecked;
        if (storeAll) storeAll.checked = isChecked;

        try {
            const response = await fetch('{{ route("cart.toggle-all") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': getCsrfToken()
                },
                body: JSON.stringify({
                    is_selected: isChecked
                })
            });

            const data = await response.json();
            if (data.success && data.summary) {
                applySummaryToUI(data.summary);
            }
        } catch (err) {
            console.error('Error toggling select all:', err);
        }

        recalculateShopeeCart();
    }

    // Handle Individual Item Checkbox Change via AJAX
    async function handleItemCheckboxChange(cartItemId, isChecked) {
        try {
            const response = await fetch(`/cart/${cartItemId}`, {
                method: 'PATCH',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': getCsrfToken()
                },
                body: JSON.stringify({
                    is_selected: isChecked
                })
            });

            const data = await response.json();
            if (data.success && data.summary) {
                applySummaryToUI(data.summary);
            }
        } catch (err) {
            console.error('Error updating selection:', err);
        }

        // Check master checkboxes state
        const allBoxes = document.querySelectorAll('.item-checkbox');
        const allChecked = Array.from(allBoxes).every(cb => cb.checked);
        const topAll = document.getElementById('check-all-top');
        const bottomAll = document.getElementById('check-all-bottom');
        const storeAll = document.getElementById('check-store');
        if (topAll) topAll.checked = allChecked;
        if (bottomAll) bottomAll.checked = allChecked;
        if (storeAll) storeAll.checked = allChecked;

        recalculateShopeeCart();
    }

    // Update Item Quantity in Shopee Cart
    async function updateShopeeItemQty(cartItemId, delta) {
        await updateCartQtyAJAX(cartItemId, delta);
    }

    // Handle Manual Input for Quantity
    async function handleShopeeQtyInput(cartItemId, value) {
        let qty = parseInt(value) || 1;
        if (qty < 1) qty = 1;

        try {
            const response = await fetch(`/cart/${cartItemId}`, {
                method: 'PATCH',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': getCsrfToken()
                },
                body: JSON.stringify({
                    quantity: qty
                })
            });

            const data = await response.json();
            if (data.success) {
                updateCartBadges(data.count);
                if (data.summary) {
                    applySummaryToUI(data.summary);
                }
                recalculateShopeeCart();
            }
        } catch (err) {
            console.error('Error updating quantity input:', err);
        }
    }

    // Delete Single Item in Shopee Cart
    async function deleteShopeeItem(cartItemId) {
        if (!confirm('Apakah Anda yakin ingin menghapus produk ini dari keranjang?')) {
            return;
        }

        await deleteCartItemAJAX(cartItemId);

        // Check if no items left on page
        const remainingRows = document.querySelectorAll('.shopee-cart-row');
        if (remainingRows.length === 0) {
            window.location.reload();
        }
    }

    // Delete Selected Items
    async function deleteSelectedShopeeItems() {
        const checkedItems = document.querySelectorAll('.shopee-cart-row .item-checkbox:checked');
        if (checkedItems.length === 0) {
            alert('Tidak ada produk yang dipilih.');
            return;
        }

        if (!confirm(`Hapus ${checkedItems.length} produk terpilih dari keranjang belanja?`)) {
            return;
        }

        for (const cb of checkedItems) {
            const row = cb.closest('.shopee-cart-row');
            if (row) {
                const id = row.getAttribute('data-id');
                await deleteCartItemAJAX(id);
            }
        }

        const remainingRows = document.querySelectorAll('.shopee-cart-row');
        if (remainingRows.length === 0) {
            window.location.reload();
        }
    }

    // Clear Whole Cart
    async function clearWholeCart() {
        if (!confirm('Kosongkan seluruh isi keranjang belanja Anda?')) {
            return;
        }

        try {
            const response = await fetch('{{ route("cart.clear") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': getCsrfToken()
                }
            });

            const data = await response.json();
            if (data.success) {
                updateCartBadges(0);
                window.location.reload();
            }
        } catch (err) {
            console.error('Error clearing cart:', err);
        }
    }

    // Apply Summary from server to bottom bar
    function applySummaryToUI(summary) {
        const totalItemsBadge = document.getElementById('total-items-badge');
        const selectedQtyText = document.getElementById('selected-qty-text');
        const checkoutBtnCount = document.getElementById('checkout-btn-count');
        const grandTotalElem = document.getElementById('shopee-grand-total');
        const savingElem = document.getElementById('shopee-saving-val');
        const checkoutBtn = document.getElementById('shopee-checkout-btn');

        if (totalItemsBadge && summary.total_items !== undefined) {
            totalItemsBadge.innerText = summary.total_items;
        }
        if (selectedQtyText && summary.selected_count !== undefined) {
            selectedQtyText.innerText = summary.selected_count;
        }
        if (checkoutBtnCount && summary.selected_count !== undefined) {
            checkoutBtnCount.innerText = summary.selected_count;
        }
        if (grandTotalElem && summary.formatted_subtotal) {
            const finalNum = Math.max(0, (summary.subtotal || 0) - voucherDiscount);
            grandTotalElem.innerText = formatRupiah(finalNum);
        }
        if (savingElem && summary.formatted_savings) {
            savingElem.innerText = summary.formatted_savings;
        }

        if (checkoutBtn && summary.selected_count !== undefined) {
            if (summary.selected_count === 0) {
                checkoutBtn.disabled = true;
                checkoutBtn.classList.add('opacity-50', 'cursor-not-allowed');
            } else {
                checkoutBtn.disabled = false;
                checkoutBtn.classList.remove('opacity-50', 'cursor-not-allowed');
            }
        }
    }

    // Recalculate Shopee Cart Client-side Helper
    function recalculateShopeeCart() {
        const rows = document.querySelectorAll('.shopee-cart-row');
        let selectedSubtotal = 0;
        let selectedCount = 0;
        let totalCount = 0;

        rows.forEach(row => {
            const checkbox = row.querySelector('.item-checkbox');
            const unitPrice = parseInt(row.getAttribute('data-unit-price')) || 0;
            const input = row.querySelector('.item-qty-value');
            const qty = input ? (parseInt(input.value) || 1) : 1;
            totalCount += qty;

            const rowTotal = unitPrice * qty;
            const rowTotalSpan = row.querySelector('.row-total-price');
            if (rowTotalSpan) {
                rowTotalSpan.innerText = formatRupiah(rowTotal);
            }

            if (checkbox && checkbox.checked) {
                selectedSubtotal += rowTotal;
                selectedCount += qty;
            }
        });

        const finalTotal = Math.max(0, selectedSubtotal - (selectedSubtotal > 0 ? voucherDiscount : 0));

        const totalItemsBadge = document.getElementById('total-items-badge');
        const selectedQtyText = document.getElementById('selected-qty-text');
        const checkoutBtnCount = document.getElementById('checkout-btn-count');
        const grandTotalElem = document.getElementById('shopee-grand-total');
        const checkoutBtn = document.getElementById('shopee-checkout-btn');

        if (totalItemsBadge) totalItemsBadge.innerText = totalCount;
        if (selectedQtyText) selectedQtyText.innerText = selectedCount;
        if (checkoutBtnCount) checkoutBtnCount.innerText = selectedCount;
        if (grandTotalElem) grandTotalElem.innerText = formatRupiah(finalTotal);

        if (checkoutBtn) {
            if (selectedCount === 0) {
                checkoutBtn.disabled = true;
                checkoutBtn.classList.add('opacity-50', 'cursor-not-allowed');
            } else {
                checkoutBtn.disabled = false;
                checkoutBtn.classList.remove('opacity-50', 'cursor-not-allowed');
            }
        }
    }

    // Apply Voucher
    function applyVoucher() {
        const code = document.getElementById('voucher-input').value.trim();
        if (code === 'PANDEOKA2026') {
            voucherDiscount = 250000;
            recalculateShopeeCart();
            showToast('Voucher Berhasil', 'Kupon PANDEOKA2026 aktif! Potongan Rp 250.000 diterapkan.');
        } else {
            alert('Kode voucher tidak valid atau sudah kedaluwarsa.');
        }
    }

    // Proceed to Checkout
    function proceedToShopeeCheckout() {
        const checked = document.querySelectorAll('.item-checkbox:checked');
        if (checked.length === 0) {
            alert('Silakan pilih minimal 1 produk untuk checkout.');
            return;
        }

        const grandTotal = document.getElementById('shopee-grand-total')?.innerText || 'Rp 0';
        alert(`Mengarahkan ke Halaman Checkout & Pembayaran Resmi Pande Oka...\n\nTotal Pembayaran: ${grandTotal}\nBebas Ongkir: Aktif (Seluruh Jawa-Bali)\nGaransi: 5 Tahun Kayu Solid`);
    }

    // Initial check on page load
    document.addEventListener('DOMContentLoaded', function() {
        recalculateShopeeCart();
    });
</script>
@endpush

@endsection
