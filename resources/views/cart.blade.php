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
                <div class="w-10 h-10 bg-orange-600 flex items-center justify-center rounded-lg text-white">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                    </svg>
                </div>
                <div>
                    <h1 class="text-xl sm:text-2xl font-black text-stone-900 tracking-tight flex items-center gap-2">
                        Keranjang Belanja
                    </h1>
                    <span class="text-xs text-stone-500 font-medium">
                        Pande Oka Official Store • Garansi 100% Produk Original Kayu Solid
                    </span>
                </div>
            </div>

            <a href="{{ url('/') }}" class="hidden sm:inline-flex items-center gap-1.5 text-xs font-bold text-orange-600 hover:text-orange-700 uppercase tracking-wider">
                <span>&larr; Lanjut Belanja Furniture</span>
            </a>
        </div>

        {{-- Shopee Free Shipping Notification Bar --}}
        <div class="bg-orange-50 border border-orange-200 rounded-xl p-3.5 sm:p-4 mb-4 flex flex-col sm:flex-row sm:items-center justify-between gap-3 text-xs text-stone-800">
            <div class="flex items-center gap-2.5">
                <span class="px-2 py-0.5 bg-orange-600 text-white font-black text-[10px] rounded uppercase tracking-wider">
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

        {{-- Shopee Table Header (Desktop Only) --}}
        <div class="hidden lg:grid grid-cols-12 gap-4 bg-white p-4 rounded-xl border border-stone-200 text-xs font-bold text-stone-600 uppercase tracking-wider shadow-xs mb-3">
            <div class="col-span-5 flex items-center gap-3">
                <input type="checkbox" 
                       id="check-all-top" 
                       checked 
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
                           checked 
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

            {{-- Cart Item 1: Sofa Minimalis Kayu Jati --}}
            <div class="p-4 border-b border-stone-100 shopee-cart-row" data-id="item-1" data-unit-price="4250000">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-4 items-center">
                    
                    {{-- Checkbox + Image + Title + Variation --}}
                    <div class="lg:col-span-5 flex items-start gap-3">
                        <input type="checkbox" 
                               checked 
                               onchange="recalculateShopeeCart()" 
                               class="item-checkbox w-4 h-4 rounded text-orange-600 focus:ring-orange-500 border-stone-300 accent-orange-600 mt-1 cursor-pointer">
                        
                        <div class="w-20 h-20 sm:w-24 sm:h-24 bg-stone-100 rounded-lg overflow-hidden border border-stone-200 shrink-0">
                            <img src="https://images.unsplash.com/photo-1555041469-a586c61ea9bc?auto=format&fit=crop&w=300&q=80" 
                                 alt="Sofa 3-Seater Minimalis Jati" 
                                 class="w-full h-full object-cover">
                        </div>

                        <div class="flex-1 min-w-0">
                            <span class="px-1.5 py-0.5 bg-orange-100 text-orange-700 text-[10px] font-bold rounded uppercase">
                                Best Seller
                            </span>
                            <h3 class="text-xs sm:text-sm font-bold text-stone-900 mt-1 leading-snug line-clamp-2">
                                Sofa 3-Seater Minimalis Kayu Jati Solid Royal Foam HR
                            </h3>

                            {{-- Shopee Style Variation Badge Dropdown --}}
                            <div class="mt-2 inline-flex items-center gap-1.5 px-2 py-1 bg-stone-100 hover:bg-stone-200 text-stone-600 rounded text-[11px] cursor-pointer transition-colors">
                                <span>Variasi: Salak Brown, Kain Linen Grey</span>
                                <svg class="w-3 h-3 text-stone-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </div>
                        </div>
                    </div>

                    {{-- Harga Satuan --}}
                    <div class="lg:col-span-2 flex lg:flex-col lg:items-center justify-between text-xs">
                        <span class="lg:hidden text-stone-500 font-medium">Harga Satuan:</span>
                        <div class="text-right lg:text-center">
                            <span class="text-stone-400 line-through text-[11px] block">Rp 5.200.000</span>
                            <span class="font-bold text-stone-900 text-sm">Rp 4.250.000</span>
                        </div>
                    </div>

                    {{-- Kuantitas Selector (Shopee Style: - [ 1 ] +) --}}
                    <div class="lg:col-span-2 flex lg:justify-center justify-between items-center text-xs">
                        <span class="lg:hidden text-stone-500 font-medium">Kuantitas:</span>
                        <div class="flex items-center border border-stone-300 rounded overflow-hidden">
                            <button type="button" 
                                    onclick="updateShopeeQty(this, -1)" 
                                    class="w-7 h-7 bg-white hover:bg-stone-100 text-stone-600 font-bold flex items-center justify-center border-r border-stone-300">
                                -
                            </button>
                            <span class="w-10 h-7 bg-white text-stone-900 font-bold flex items-center justify-center text-xs item-qty-value">
                                1
                            </span>
                            <button type="button" 
                                    onclick="updateShopeeQty(this, 1)" 
                                    class="w-7 h-7 bg-white hover:bg-stone-100 text-stone-600 font-bold flex items-center justify-center border-l border-stone-300">
                                +
                            </button>
                        </div>
                    </div>

                    {{-- Total Harga (Solid Orange) --}}
                    <div class="lg:col-span-2 flex lg:justify-center justify-between items-center">
                        <span class="lg:hidden text-stone-500 text-xs font-medium">Total:</span>
                        <span class="text-sm font-black text-orange-600 row-total-price">
                            Rp 4.250.000
                        </span>
                    </div>

                    {{-- Aksi: Hapus --}}
                    <div class="lg:col-span-1 flex lg:justify-center justify-end">
                        <button type="button" 
                                onclick="deleteShopeeRow(this)" 
                                class="text-xs text-stone-500 hover:text-red-600 transition-colors font-medium flex items-center gap-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                            <span class="lg:hidden">Hapus</span>
                        </button>
                    </div>

                </div>
            </div>

            {{-- Cart Item 2: Coffee Table Bundar Sungkai --}}
            <div class="p-4 border-b border-stone-100 shopee-cart-row" data-id="item-2" data-unit-price="2600000">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-4 items-center">
                    
                    {{-- Checkbox + Image + Title + Variation --}}
                    <div class="lg:col-span-5 flex items-start gap-3">
                        <input type="checkbox" 
                               checked 
                               onchange="recalculateShopeeCart()" 
                               class="item-checkbox w-4 h-4 rounded text-orange-600 focus:ring-orange-500 border-stone-300 accent-orange-600 mt-1 cursor-pointer">
                        
                        <div class="w-20 h-20 sm:w-24 sm:h-24 bg-stone-100 rounded-lg overflow-hidden border border-stone-200 shrink-0">
                            <img src="https://images.unsplash.com/photo-1533090481720-856c6e3c1fdc?auto=format&fit=crop&w=300&q=80" 
                                 alt="Coffee Table Bundar Kayu Sungkai" 
                                 class="w-full h-full object-cover">
                        </div>

                        <div class="flex-1 min-w-0">
                            <span class="px-1.5 py-0.5 bg-orange-100 text-orange-700 text-[10px] font-bold rounded uppercase">
                                Best Seller
                            </span>
                            <h3 class="text-xs sm:text-sm font-bold text-stone-900 mt-1 leading-snug line-clamp-2">
                                Coffee Table Bundar Kayu Sungkai Solid Diameter 80cm
                            </h3>

                            <div class="mt-2 inline-flex items-center gap-1.5 px-2 py-1 bg-stone-100 hover:bg-stone-200 text-stone-600 rounded text-[11px] cursor-pointer transition-colors">
                                <span>Variasi: Natural Bleached Teak D80</span>
                                <svg class="w-3 h-3 text-stone-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </div>
                        </div>
                    </div>

                    {{-- Harga Satuan --}}
                    <div class="lg:col-span-2 flex lg:flex-col lg:items-center justify-between text-xs">
                        <span class="lg:hidden text-stone-500 font-medium">Harga Satuan:</span>
                        <div class="text-right lg:text-center">
                            <span class="text-stone-400 line-through text-[11px] block">Rp 3.100.000</span>
                            <span class="font-bold text-stone-900 text-sm">Rp 2.600.000</span>
                        </div>
                    </div>

                    {{-- Kuantitas Selector --}}
                    <div class="lg:col-span-2 flex lg:justify-center justify-between items-center text-xs">
                        <span class="lg:hidden text-stone-500 font-medium">Kuantitas:</span>
                        <div class="flex items-center border border-stone-300 rounded overflow-hidden">
                            <button type="button" 
                                    onclick="updateShopeeQty(this, -1)" 
                                    class="w-7 h-7 bg-white hover:bg-stone-100 text-stone-600 font-bold flex items-center justify-center border-r border-stone-300">
                                -
                            </button>
                            <span class="w-10 h-7 bg-white text-stone-900 font-bold flex items-center justify-center text-xs item-qty-value">
                                1
                            </span>
                            <button type="button" 
                                    onclick="updateShopeeQty(this, 1)" 
                                    class="w-7 h-7 bg-white hover:bg-stone-100 text-stone-600 font-bold flex items-center justify-center border-l border-stone-300">
                                +
                            </button>
                        </div>
                    </div>

                    {{-- Total Harga --}}
                    <div class="lg:col-span-2 flex lg:justify-center justify-between items-center">
                        <span class="lg:hidden text-stone-500 text-xs font-medium">Total:</span>
                        <span class="text-sm font-black text-orange-600 row-total-price">
                            Rp 2.600.000
                        </span>
                    </div>

                    {{-- Aksi: Hapus --}}
                    <div class="lg:col-span-1 flex lg:justify-center justify-end">
                        <button type="button" 
                                onclick="deleteShopeeRow(this)" 
                                class="text-xs text-stone-500 hover:text-red-600 transition-colors font-medium flex items-center gap-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                            <span class="lg:hidden">Hapus</span>
                        </button>
                    </div>

                </div>
            </div>

            {{-- Cart Item 3: Armchair Rotan --}}
            <div class="p-4 shopee-cart-row" data-id="item-3" data-unit-price="1950000">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-4 items-center">
                    
                    {{-- Checkbox + Image + Title + Variation --}}
                    <div class="lg:col-span-5 flex items-start gap-3">
                        <input type="checkbox" 
                               checked 
                               onchange="recalculateShopeeCart()" 
                               class="item-checkbox w-4 h-4 rounded text-orange-600 focus:ring-orange-500 border-stone-300 accent-orange-600 mt-1 cursor-pointer">
                        
                        <div class="w-20 h-20 sm:w-24 sm:h-24 bg-stone-100 rounded-lg overflow-hidden border border-stone-200 shrink-0">
                            <img src="https://images.unsplash.com/photo-1594026112284-02bb6f3352fe?auto=format&fit=crop&w=300&q=80" 
                                 alt="Kursi Santai Armchair Anyaman Rotan" 
                                 class="w-full h-full object-cover">
                        </div>

                        <div class="flex-1 min-w-0">
                            <span class="px-1.5 py-0.5 bg-orange-100 text-orange-700 text-[10px] font-bold rounded uppercase">
                                Best Seller
                            </span>
                            <h3 class="text-xs sm:text-sm font-bold text-stone-900 mt-1 leading-snug line-clamp-2">
                                Kursi Santai Armchair Kayu Jati Anyaman Rotan Alami
                            </h3>

                            <div class="mt-2 inline-flex items-center gap-1.5 px-2 py-1 bg-stone-100 hover:bg-stone-200 text-stone-600 rounded text-[11px] cursor-pointer transition-colors">
                                <span>Variasi: Jati Solid Finishing Doff</span>
                                <svg class="w-3 h-3 text-stone-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </div>
                        </div>
                    </div>

                    {{-- Harga Satuan --}}
                    <div class="lg:col-span-2 flex lg:flex-col lg:items-center justify-between text-xs">
                        <span class="lg:hidden text-stone-500 font-medium">Harga Satuan:</span>
                        <div class="text-right lg:text-center">
                            <span class="text-stone-400 line-through text-[11px] block">Rp 2.400.000</span>
                            <span class="font-bold text-stone-900 text-sm">Rp 1.950.000</span>
                        </div>
                    </div>

                    {{-- Kuantitas Selector --}}
                    <div class="lg:col-span-2 flex lg:justify-center justify-between items-center text-xs">
                        <span class="lg:hidden text-stone-500 font-medium">Kuantitas:</span>
                        <div class="flex items-center border border-stone-300 rounded overflow-hidden">
                            <button type="button" 
                                    onclick="updateShopeeQty(this, -1)" 
                                    class="w-7 h-7 bg-white hover:bg-stone-100 text-stone-600 font-bold flex items-center justify-center border-r border-stone-300">
                                -
                            </button>
                            <span class="w-10 h-7 bg-white text-stone-900 font-bold flex items-center justify-center text-xs item-qty-value">
                                1
                            </span>
                            <button type="button" 
                                    onclick="updateShopeeQty(this, 1)" 
                                    class="w-7 h-7 bg-white hover:bg-stone-100 text-stone-600 font-bold flex items-center justify-center border-l border-stone-300">
                                +
                            </button>
                        </div>
                    </div>

                    {{-- Total Harga --}}
                    <div class="lg:col-span-2 flex lg:justify-center justify-between items-center">
                        <span class="lg:hidden text-stone-500 text-xs font-medium">Total:</span>
                        <span class="text-sm font-black text-orange-600 row-total-price">
                            Rp 1.950.000
                        </span>
                    </div>

                    {{-- Aksi: Hapus --}}
                    <div class="lg:col-span-1 flex lg:justify-center justify-end">
                        <button type="button" 
                                onclick="deleteShopeeRow(this)" 
                                class="text-xs text-stone-500 hover:text-red-600 transition-colors font-medium flex items-center gap-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                            <span class="lg:hidden">Hapus</span>
                        </button>
                    </div>

                </div>
            </div>

            {{-- Shopee Store Voucher Strip --}}
            <div class="p-4 bg-orange-50/50 border-t border-stone-200 flex flex-col sm:flex-row sm:items-center justify-between gap-3 text-xs">
                <div class="flex items-center gap-2">
                    <svg class="w-4 h-4 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"/>
                    </svg>
                    <span class="font-bold text-stone-900">Voucher Toko:</span>
                    <span class="text-orange-700 font-semibold">Kupon Potongan Rp 250.000 Aktif</span>
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

        {{-- Shopee Style "Kamu Mungkin Juga Suka" Recommendation --}}
        <div class="mt-10">
            <h2 class="text-sm font-black text-stone-900 uppercase tracking-wider mb-4 flex items-center gap-2">
                <span class="w-2 h-2 rounded-full bg-orange-600"></span>
                <span>Kamu Mungkin Juga Suka (Pelengkap Ruangan)</span>
            </h2>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                {{-- Rec 1 --}}
                <div class="bg-white border border-stone-200 rounded-xl overflow-hidden shadow-xs hover:border-orange-500 transition-colors p-3 flex flex-col justify-between">
                    <div class="aspect-square bg-stone-100 rounded-lg overflow-hidden mb-2">
                        <img src="https://images.unsplash.com/photo-1584589167171-541ce45f1eea?auto=format&fit=crop&w=300&q=80" alt="Cushion Bantal Sofa" class="w-full h-full object-cover">
                    </div>
                    <div>
                        <span class="text-[10px] text-stone-500 uppercase">Dekorasi</span>
                        <h4 class="text-xs font-bold text-stone-900 line-clamp-1">Set 2 Cushion Bantal Sofa Premium</h4>
                        <span class="text-xs font-black text-orange-600 block mt-1">Rp 280.000</span>
                    </div>
                    <button type="button" 
                            onclick="addToCart('Set 2 Cushion Bantal Sofa', 280000, 'https://images.unsplash.com/photo-1584589167171-541ce45f1eea?auto=format&fit=crop&w=300&q=80')"
                            class="mt-2.5 w-full py-1.5 bg-stone-100 hover:bg-orange-600 hover:text-white text-stone-800 text-[11px] font-bold rounded transition-colors">
                        + Tambah
                    </button>
                </div>

                {{-- Rec 2 --}}
                <div class="bg-white border border-stone-200 rounded-xl overflow-hidden shadow-xs hover:border-orange-500 transition-colors p-3 flex flex-col justify-between">
                    <div class="aspect-square bg-stone-100 rounded-lg overflow-hidden mb-2">
                        <img src="https://images.unsplash.com/photo-1507473885765-e6ed057f782c?auto=format&fit=crop&w=300&q=80" alt="Lampu Meja Kayu" class="w-full h-full object-cover">
                    </div>
                    <div>
                        <span class="text-[10px] text-stone-500 uppercase">Penerangan</span>
                        <h4 class="text-xs font-bold text-stone-900 line-clamp-1">Lampu Meja Kayu Jati Scandinavian</h4>
                        <span class="text-xs font-black text-orange-600 block mt-1">Rp 450.000</span>
                    </div>
                    <button type="button" 
                            onclick="addToCart('Lampu Meja Kayu Jati', 450000, 'https://images.unsplash.com/photo-1507473885765-e6ed057f782c?auto=format&fit=crop&w=300&q=80')"
                            class="mt-2.5 w-full py-1.5 bg-stone-100 hover:bg-orange-600 hover:text-white text-stone-800 text-[11px] font-bold rounded transition-colors">
                        + Tambah
                    </button>
                </div>

                {{-- Rec 3 --}}
                <div class="bg-white border border-stone-200 rounded-xl overflow-hidden shadow-xs hover:border-orange-500 transition-colors p-3 flex flex-col justify-between">
                    <div class="aspect-square bg-stone-100 rounded-lg overflow-hidden mb-2">
                        <img src="https://images.unsplash.com/photo-1586023492125-27b2c045efd7?auto=format&fit=crop&w=300&q=80" alt="Puff Ottoman" class="w-full h-full object-cover">
                    </div>
                    <div>
                        <span class="text-[10px] text-stone-500 uppercase">Living Room</span>
                        <h4 class="text-xs font-bold text-stone-900 line-clamp-1">Ottoman Stool Bundar Kayu Jati</h4>
                        <span class="text-xs font-black text-orange-600 block mt-1">Rp 650.000</span>
                    </div>
                    <button type="button" 
                            onclick="addToCart('Ottoman Stool Bundar Jati', 650000, 'https://images.unsplash.com/photo-1586023492125-27b2c045efd7?auto=format&fit=crop&w=300&q=80')"
                            class="mt-2.5 w-full py-1.5 bg-stone-100 hover:bg-orange-600 hover:text-white text-stone-800 text-[11px] font-bold rounded transition-colors">
                        + Tambah
                    </button>
                </div>

                {{-- Rec 4 --}}
                <div class="bg-white border border-stone-200 rounded-xl overflow-hidden shadow-xs hover:border-orange-500 transition-colors p-3 flex flex-col justify-between">
                    <div class="aspect-square bg-stone-100 rounded-lg overflow-hidden mb-2">
                        <img src="https://images.unsplash.com/photo-1616046229478-9901c5536a45?auto=format&fit=crop&w=300&q=80" alt="Cermin Kayu Jati" class="w-full h-full object-cover">
                    </div>
                    <div>
                        <span class="text-[10px] text-stone-500 uppercase">Dekorasi</span>
                        <h4 class="text-xs font-bold text-stone-900 line-clamp-1">Standing Mirror Cermin Kayu Jati Dinding</h4>
                        <span class="text-xs font-black text-orange-600 block mt-1">Rp 890.000</span>
                    </div>
                    <button type="button" 
                            onclick="addToCart('Standing Mirror Kayu Jati', 890000, 'https://images.unsplash.com/photo-1616046229478-9901c5536a45?auto=format&fit=crop&w=300&q=80')"
                            class="mt-2.5 w-full py-1.5 bg-stone-100 hover:bg-orange-600 hover:text-white text-stone-800 text-[11px] font-bold rounded transition-colors">
                        + Tambah
                    </button>
                </div>
            </div>
        </div>

    </div>
</div>

{{-- Sticky Floating Bottom Checkout Bar (Shopee Signature Bottom Bar) --}}
<div class="fixed bottom-0 inset-x-0 z-40 bg-white border-t border-stone-300 shadow-[0_-4px_16px_rgba(0,0,0,0.08)]">
    <div class="max-w-7xl mx-auto px-3 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between py-3 sm:py-4 gap-2 sm:gap-4">
            
            {{-- Left Side: Select All & Delete Selected --}}
            <div class="flex items-center gap-3 sm:gap-5 text-xs text-stone-700">
                <div class="flex items-center gap-2">
                    <input type="checkbox" 
                           id="check-all-bottom" 
                           checked 
                           onchange="toggleSelectAll(this)" 
                           class="w-4 h-4 rounded text-orange-600 focus:ring-orange-500 border-stone-300 accent-orange-600 cursor-pointer">
                    <label for="check-all-bottom" class="cursor-pointer font-bold text-stone-900 whitespace-nowrap">
                        Pilih Semua (<span id="total-items-badge">3</span>)
                    </label>
                </div>

                <button type="button" 
                        onclick="deleteSelectedShopeeItems()" 
                        class="hidden sm:inline text-stone-500 hover:text-red-600 transition-colors font-medium">
                    Hapus
                </button>

                <div class="hidden md:flex items-center gap-1.5 text-stone-500 text-[11px]">
                    <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span>
                    <span>Garansi Shopee Mall • 100% Asli</span>
                </div>
            </div>

            {{-- Right Side: Total Price & Big Orange Checkout Button --}}
            <div class="flex items-center gap-3 sm:gap-6">
                <div class="text-right">
                    <div class="flex items-baseline justify-end gap-1.5 leading-none">
                        <span class="text-xs text-stone-600 hidden sm:inline">Total (<span id="selected-qty-text">3</span> produk):</span>
                        <span id="shopee-grand-total" class="text-base sm:text-2xl font-black text-orange-600">
                            Rp 8.550.000
                        </span>
                    </div>
                    <span id="shopee-saving-text" class="text-[10px] sm:text-xs text-stone-500 block mt-1">
                        Hemat <strong class="text-orange-600">Rp 2.150.000</strong> (Diskon + Voucher)
                    </span>
                </div>

                {{-- Shopee Big Checkout Button --}}
                <button type="button" 
                        id="shopee-checkout-btn"
                        onclick="proceedToShopeeCheckout()"
                        class="py-3 sm:py-3.5 px-6 sm:px-10 bg-orange-600 hover:bg-orange-700 text-white font-black text-xs sm:text-sm uppercase tracking-wider rounded-lg transition-colors shadow-sm shrink-0">
                    Checkout (<span id="checkout-btn-count">3</span>)
                </button>
            </div>

        </div>
    </div>
</div>

@push('scripts')
<script>
    let voucherDiscount = 250000;

    // Toggle Select All Checkbox (Shopee Style)
    function toggleSelectAll(masterCheckbox) {
        const isChecked = masterCheckbox.checked;
        document.querySelectorAll('.item-checkbox').forEach(cb => {
            cb.checked = isChecked;
        });

        // Sync other select all checkboxes
        const topAll = document.getElementById('check-all-top');
        const bottomAll = document.getElementById('check-all-bottom');
        const storeAll = document.getElementById('check-store');
        if (topAll) topAll.checked = isChecked;
        if (bottomAll) bottomAll.checked = isChecked;
        if (storeAll) storeAll.checked = isChecked;

        recalculateShopeeCart();
    }

    // Recalculate Shopee Cart
    function recalculateShopeeCart() {
        const rows = document.querySelectorAll('.shopee-cart-row');
        let selectedSubtotal = 0;
        let selectedCount = 0;
        let totalCount = 0;

        rows.forEach(row => {
            totalCount++;
            const checkbox = row.querySelector('.item-checkbox');
            const unitPrice = parseInt(row.getAttribute('data-unit-price')) || 0;
            const qty = parseInt(row.querySelector('.item-qty-value').innerText) || 1;
            const rowTotal = unitPrice * qty;

            row.querySelector('.row-total-price').innerText = formatRupiah(rowTotal);

            if (checkbox && checkbox.checked) {
                selectedSubtotal += rowTotal;
                selectedCount += qty;
            }
        });

        // Apply voucher discount if applicable
        const finalTotal = Math.max(0, selectedSubtotal - (selectedSubtotal > 0 ? voucherDiscount : 0));

        // Update DOM elements
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

    // Update Quantity in Shopee Cart
    function updateShopeeQty(btn, change) {
        const row = btn.closest('.shopee-cart-row');
        const qtySpan = row.querySelector('.item-qty-value');
        let qty = parseInt(qtySpan.innerText) + change;
        
        if (qty < 1) {
            if (confirm('Apakah Anda yakin ingin menghapus produk ini dari keranjang?')) {
                deleteShopeeRow(btn);
            }
            return;
        }

        qtySpan.innerText = qty;
        recalculateShopeeCart();
    }

    // Delete Row in Shopee Cart
    function deleteShopeeRow(btn) {
        const row = btn.closest('.shopee-cart-row');
        row.remove();
        recalculateShopeeCart();
        showToast('Produk Dihapus', 'Item telah dihapus dari keranjang belanja.');
    }

    // Delete Selected Items
    function deleteSelectedShopeeItems() {
        const checkedItems = document.querySelectorAll('.item-checkbox:checked');
        if (checkedItems.length === 0) {
            alert('Tidak ada produk yang dipilih.');
            return;
        }

        if (confirm(`Hapus ${checkedItems.length} produk terpilih dari keranjang belanja?`)) {
            checkedItems.forEach(cb => {
                const row = cb.closest('.shopee-cart-row');
                if (row) row.remove();
            });
            recalculateShopeeCart();
            showToast('Produk Dihapus', `${checkedItems.length} item telah dihapus dari keranjang.`);
        }
    }

    // Apply Voucher
    function applyVoucher() {
        const code = document.getElementById('voucher-input').value.trim();
        if (code === 'PANDEOKA2026') {
            voucherDiscount = 250000;
            recalculateShopeeCart();
            showToast('Voucher Berhasil', 'Kupon PANDEOKA2026 berhasil diterapkan! Diskon Rp 250.000.');
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

        const grandTotal = document.getElementById('shopee-grand-total').innerText;
        alert(`Mengarahkan ke Halaman Checkout Shopee Pay / Transfer Bank...\n\nTotal Pembayaran: ${grandTotal}\nGratis Ongkir: Aktif`);
    }

    // Initialize calculation on page load
    document.addEventListener('DOMContentLoaded', function() {
        recalculateShopeeCart();
    });
</script>
@endpush

@endsection
