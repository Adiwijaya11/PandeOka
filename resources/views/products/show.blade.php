@extends('layouts.app')

@section('title', $product['name'] . ' - Pande Oka Furniture & Living')
@section('meta_description', 'Beli ' . $product['name'] . ' dari bahan ' . $product['wood_type'] . '. Garansi 5 tahun, gratis ongkir dan rakit area Jawa - Bali.')

@section('content')

{{-- Product Detail Page Container --}}
<div class="bg-stone-50 min-h-screen py-4 sm:py-8 font-sans">
    <div class="max-w-7xl mx-auto px-3 sm:px-6 lg:px-8">

        {{-- Breadcrumb --}}
        <nav class="flex items-center space-x-2 text-xs text-stone-500 uppercase tracking-wider mb-4 sm:mb-6 overflow-x-auto whitespace-nowrap pb-1">
            <a href="{{ url('/') }}" class="hover:text-orange-600 transition-colors">Beranda</a>
            <span>/</span>
            <a href="{{ route('new-arrivals') }}" class="hover:text-orange-600 transition-colors">Katalog</a>
            <span>/</span>
            <span class="text-stone-700">{{ $product['category'] }}</span>
            <span>/</span>
            <span class="text-orange-600 font-bold truncate max-w-[200px] sm:max-w-none">{{ $product['name'] }}</span>
        </nav>

        {{-- Main Product Showcase (Split 2 Columns) --}}
        <div class="bg-white rounded-2xl border border-stone-200 p-4 sm:p-6 lg:p-8 shadow-xs mb-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12">

                {{-- Left Column: Image Gallery --}}
                <div class="lg:col-span-6 flex flex-col gap-4">
                    
                    {{-- Main Active Photo --}}
                    <div class="relative aspect-square rounded-2xl overflow-hidden bg-stone-100 border border-stone-200 group">
                        <img id="main-product-img" 
                             src="{{ $product['image'] }}" 
                             alt="{{ $product['name'] }}" 
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">

                        {{-- Floating Badges --}}
                        <div class="absolute top-3 left-3 flex flex-col gap-1.5">
                            <span class="px-2.5 py-1 bg-orange-600 text-white font-black text-xs uppercase tracking-wider rounded-md shadow-xs">
                                DISKON {{ $product['discount'] }}%
                            </span>
                            <span class="px-2.5 py-1 bg-stone-900 text-white font-bold text-[11px] uppercase tracking-wider rounded-md shadow-xs">
                                100% KAYU SOLID
                            </span>
                        </div>

                        <div class="absolute top-3 right-3 bg-white/95 backdrop-blur-xs text-stone-800 px-2.5 py-1 rounded-md text-[11px] font-bold border border-stone-200 shadow-xs flex items-center gap-1.5">
                            <svg class="w-3.5 h-3.5 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                            </svg>
                            <span>Garansi 5 Th</span>
                        </div>
                    </div>

                    {{-- Thumbnail Carousel / Selector --}}
                    @if(!empty($product['gallery']) && count($product['gallery']) > 1)
                        <div class="grid grid-cols-4 gap-3">
                            @foreach($product['gallery'] as $index => $thumb)
                                <button type="button" 
                                        onclick="changeMainImage('{{ $thumb }}', this)" 
                                        class="thumb-btn aspect-square rounded-xl overflow-hidden border-2 {{ $index === 0 ? 'border-orange-600 ring-2 ring-orange-200' : 'border-stone-200 hover:border-orange-300' }} transition-all bg-stone-100">
                                    <img src="{{ $thumb }}" alt="Thumbnail {{ $index + 1 }}" class="w-full h-full object-cover">
                                </button>
                            @endforeach
                        </div>
                    @endif

                    {{-- Trust Badges Strip Under Gallery (Clean SVG Icons, No Emojis) --}}
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-2 pt-4 border-t border-stone-100 text-center text-xs">
                        <div class="p-2.5 bg-stone-50 rounded-xl border border-stone-100 flex flex-col items-center justify-center text-center">
                            <div class="w-7 h-7 rounded-lg bg-orange-50 text-orange-600 flex items-center justify-center mb-1.5 shrink-0">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"/>
                                </svg>
                            </div>
                            <strong class="text-stone-900 text-[11px] leading-tight">Gratis Ongkir</strong>
                            <span class="text-[10px] text-stone-500">Jawa &amp; Bali</span>
                        </div>
                        <div class="p-2.5 bg-stone-50 rounded-xl border border-stone-100 flex flex-col items-center justify-center text-center">
                            <div class="w-7 h-7 rounded-lg bg-orange-50 text-orange-600 flex items-center justify-center mb-1.5 shrink-0">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M14.7 6.3a1 1 0 000 1.4l1.6 1.6a1 1 0 001.4 0l3.77-3.77a6 6 0 01-7.94 7.94l-6.91 6.91a2.12 2.12 0 01-3-3l6.91-6.91a6 6 0 017.94-7.94l-3.76 3.76z"/>
                                </svg>
                            </div>
                            <strong class="text-stone-900 text-[11px] leading-tight">Gratis Rakit</strong>
                            <span class="text-[10px] text-stone-500">Oleh Tim Ahli</span>
                        </div>
                        <div class="p-2.5 bg-stone-50 rounded-xl border border-stone-100 flex flex-col items-center justify-center text-center">
                            <div class="w-7 h-7 rounded-lg bg-orange-50 text-orange-600 flex items-center justify-center mb-1.5 shrink-0">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                </svg>
                            </div>
                            <strong class="text-stone-900 text-[11px] leading-tight">Kayu Legal</strong>
                            <span class="text-[10px] text-stone-500">Sertifikasi SVLK</span>
                        </div>
                        <div class="p-2.5 bg-stone-50 rounded-xl border border-stone-100 flex flex-col items-center justify-center text-center">
                            <div class="w-7 h-7 rounded-lg bg-orange-50 text-orange-600 flex items-center justify-center mb-1.5 shrink-0">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                                </svg>
                            </div>
                            <strong class="text-stone-900 text-[11px] leading-tight">Star+ Seller</strong>
                            <span class="text-[10px] text-stone-500">Official Store</span>
                        </div>
                    </div>
                </div>

                {{-- Right Column: Product Info & Purchase Controls --}}
                <div class="lg:col-span-6 flex flex-col justify-between">
                    <div>
                        {{-- Brand & Category Pill --}}
                        <div class="flex items-center gap-2 mb-2">
                            <span class="px-2 py-0.5 bg-orange-100 text-orange-700 text-[10px] font-black uppercase tracking-wider rounded">
                                {{ $product['category'] }}
                            </span>
                            <span class="text-xs text-stone-400">•</span>
                            <span class="text-xs text-stone-500 font-semibold">Pande Oka Official Bali</span>
                        </div>

                        {{-- Product Title --}}
                        <h1 class="text-xl sm:text-2xl lg:text-3xl font-black text-stone-900 tracking-tight leading-snug">
                            {{ $product['name'] }}
                        </h1>

                        {{-- Rating, Reviews, and Sales Counts --}}
                        <div class="flex flex-wrap items-center gap-3 sm:gap-4 mt-3 text-xs">
                            <div class="flex items-center text-amber-500 font-bold gap-1 bg-amber-50 px-2.5 py-1 rounded-md border border-amber-200">
                                <span>★</span>
                                <span class="text-stone-900">{{ $product['rating'] }}</span>
                                <span class="text-stone-500 font-normal">({{ $product['reviews_count'] }} Penilaian)</span>
                            </div>
                            <span class="text-stone-300">|</span>
                            <div class="text-stone-600 font-semibold">
                                <span class="text-stone-900 font-bold">{{ $product['sales_count'] }}</span> Terjual
                            </div>
                            <span class="text-stone-300">|</span>
                            <div class="text-green-700 font-bold flex items-center gap-1">
                                <span class="w-2 h-2 rounded-full bg-green-600"></span>
                                <span>Stok Tersedia ({{ $product['stock'] }} unit)</span>
                            </div>
                        </div>

                        {{-- Price Container (Shopee Style) --}}
                        <div class="bg-stone-50 rounded-xl p-4 sm:p-5 mt-5 border border-stone-200">
                            <div class="flex flex-wrap items-baseline gap-3">
                                <span class="text-2xl sm:text-4xl font-black text-orange-600 tracking-tight">
                                    Rp {{ number_format($product['price'], 0, ',', '.') }}
                                </span>
                                <span class="text-sm sm:text-base text-stone-400 line-through">
                                    Rp {{ number_format($product['original_price'], 0, ',', '.') }}
                                </span>
                                <span class="px-2 py-0.5 bg-orange-600 text-white font-bold text-xs rounded uppercase">
                                    Hemat {{ $product['discount'] }}%
                                </span>
                            </div>
                            <p class="text-xs text-stone-500 mt-2">
                                Termasuk PPN 11% &bull; Subsidi ongkir hingga Rp 1.000.000 otomatis aktif saat checkout.
                            </p>
                        </div>

                        {{-- Specification Highlights Table --}}
                        <div class="mt-6 border-t border-b border-stone-200 py-4 space-y-2.5 text-xs">
                            <div class="grid grid-cols-3 gap-2">
                                <span class="text-stone-500 font-semibold">Material Kayu</span>
                                <span class="col-span-2 text-stone-900 font-bold">{{ $product['wood_type'] }}</span>
                            </div>
                            <div class="grid grid-cols-3 gap-2">
                                <span class="text-stone-500 font-semibold">Finishing</span>
                                <span class="col-span-2 text-stone-900 font-medium">{{ $product['finish'] }}</span>
                            </div>
                            <div class="grid grid-cols-3 gap-2">
                                <span class="text-stone-500 font-semibold">Dimensi Ukuran</span>
                                <span class="col-span-2 text-stone-900 font-medium">{{ $product['dimensions'] }}</span>
                            </div>
                            <div class="grid grid-cols-3 gap-2">
                                <span class="text-stone-500 font-semibold">Garansi</span>
                                <span class="col-span-2 text-orange-700 font-bold">{{ $product['warranty'] }}</span>
                            </div>
                        </div>

                        {{-- Interactive Finishing Option Selector --}}
                        <div class="mt-5">
                            <label class="block text-xs font-bold text-stone-700 uppercase tracking-wider mb-2">
                                Pilihan Finishing Kayu:
                            </label>
                            <div class="flex flex-wrap gap-2 text-xs">
                                <button type="button" 
                                        onclick="selectVariant(this)" 
                                        class="variant-btn px-3 py-1.5 rounded-lg border-2 border-orange-600 bg-orange-50 text-orange-700 font-bold">
                                    Natural Teak Wood
                                </button>
                                <button type="button" 
                                        onclick="selectVariant(this)" 
                                        class="variant-btn px-3 py-1.5 rounded-lg border border-stone-300 hover:border-stone-400 bg-white text-stone-700 font-semibold">
                                    Salak Brown Doff
                                </button>
                                <button type="button" 
                                        onclick="selectVariant(this)" 
                                        class="variant-btn px-3 py-1.5 rounded-lg border border-stone-300 hover:border-stone-400 bg-white text-stone-700 font-semibold">
                                    Bleached Light Teak
                                </button>
                            </div>
                        </div>

                        {{-- Quantity Selector --}}
                        <div class="mt-5 flex items-center gap-4">
                            <span class="text-xs font-bold text-stone-700 uppercase tracking-wider">Jumlah:</span>
                            <div class="flex items-center border border-stone-300 rounded-lg overflow-hidden bg-white">
                                <button type="button" 
                                        onclick="changeQuantity(-1)" 
                                        class="w-8 h-8 flex items-center justify-center text-stone-600 hover:bg-stone-100 font-bold transition-colors">
                                    -
                                </button>
                                <input type="number" 
                                       id="product-quantity" 
                                       value="1" 
                                       min="1" 
                                       max="{{ $product['stock'] }}" 
                                       readonly
                                       class="w-12 h-8 text-center text-xs font-bold text-stone-900 border-x border-stone-300 focus:outline-none">
                                <button type="button" 
                                        onclick="changeQuantity(1)" 
                                        class="w-8 h-8 flex items-center justify-center text-stone-600 hover:bg-stone-100 font-bold transition-colors">
                                    +
                                </button>
                            </div>
                            <span class="text-xs text-stone-500">Tersisa {{ $product['stock'] }} unit</span>
                        </div>
                    </div>

                    {{-- Action Buttons --}}
                    <div class="mt-8 pt-6 border-t border-stone-200 flex flex-col sm:flex-row gap-3">
                        <button type="button" 
                                onclick="handleDetailAddToCart()" 
                                class="flex-1 py-3.5 px-6 bg-white hover:bg-orange-50 border-2 border-orange-600 text-orange-600 hover:text-orange-700 font-bold text-xs uppercase tracking-wider rounded-xl transition-colors flex items-center justify-center gap-2 shadow-xs active:scale-[0.98]">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                            </svg>
                            <span>+ Masukkan Keranjang</span>
                        </button>

                        <button type="button" 
                                onclick="handleDetailBuyNow()" 
                                class="flex-1 py-3.5 px-6 bg-orange-600 hover:bg-orange-700 text-white font-bold text-xs uppercase tracking-wider rounded-xl transition-colors flex items-center justify-center gap-2 shadow-xs active:scale-[0.98]">
                            <span>Beli Sekarang</span>
                        </button>

                        <a href="https://wa.me/6281234567890?text=Halo%20Pande%20Oka,%20saya%20tertarik%20dengan%20{{ urlencode($product['name']) }}%20(Rp%20{{ number_format($product['price'], 0, ',', '.') }})" 
                           target="_blank" 
                           class="py-3.5 px-4 bg-stone-900 hover:bg-stone-800 text-white font-bold text-xs uppercase tracking-wider rounded-xl transition-colors flex items-center justify-center gap-1.5 shadow-xs"
                           title="Konsultasi Custom atau Tanya Pengrajin via WhatsApp">
                            <svg class="w-4 h-4 text-green-400" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0 0 12.04 2zm.01 1.67c4.54 0 8.24 3.7 8.24 8.24 0 2.2-.86 4.28-2.42 5.84a8.18 8.18 0 0 1-5.83 2.41c-1.47 0-2.91-.39-4.18-1.15l-.3-.18-3.11.82.83-3.03-.2-.31a8.18 8.18 0 0 1-1.27-4.4c0-4.54 3.7-8.24 8.24-8.24zm4.52 11.64c-.25-.13-1.47-.72-1.7-.81-.23-.08-.39-.13-.56.13-.17.25-.64.81-.79.97-.14.17-.29.19-.54.06-.25-.13-1.07-.39-2.03-1.25-.75-.67-1.26-1.5-1.41-1.75-.15-.25-.02-.39.11-.51.11-.11.25-.29.38-.44.13-.15.17-.25.25-.42.08-.17.04-.32-.02-.45-.06-.13-.56-1.35-.77-1.85-.2-.49-.41-.42-.56-.43h-.48c-.17 0-.44.06-.67.31-.23.25-.88.86-.88 2.1 0 1.24.9 2.44 1.03 2.61.13.17 1.78 2.72 4.31 3.81.6.26 1.07.41 1.44.53.61.19 1.16.17 1.6.1.49-.07 1.47-.6 1.68-1.18.21-.58.21-1.08.15-1.18-.06-.11-.23-.17-.48-.29z"/>
                            </svg>
                            <span class="hidden sm:inline">Tanya CS</span>
                        </a>
                    </div>
                </div>

            </div>
        </div>

        {{-- Product Details, Features & Reviews Section --}}
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 mb-12">
            
            {{-- Left 8 cols: Detailed Description & Care Guide --}}
            <div class="lg:col-span-8 space-y-6">
                
                {{-- Description Box --}}
                <div class="bg-white rounded-2xl border border-stone-200 p-6 sm:p-8 shadow-xs">
                    <h2 class="text-base sm:text-lg font-black text-stone-900 uppercase tracking-wider mb-4 pb-3 border-b border-stone-100 flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-orange-600"></span>
                        <span>Deskripsi &amp; Spesifikasi Produk</span>
                    </h2>
                    <p class="text-stone-700 text-sm leading-relaxed mb-6">
                        {{ $product['description'] }}
                    </p>

                    <h3 class="text-xs font-bold text-stone-900 uppercase tracking-wider mb-3">
                        Keunggulan Material &amp; Pengerjaan:
                    </h3>
                    <ul class="space-y-2.5 text-xs text-stone-600 mb-6">
                        @foreach($product['features'] as $feature)
                            <li class="flex items-start gap-2.5">
                                <span class="text-orange-600 font-bold">✓</span>
                                <span>{{ $feature }}</span>
                            </li>
                        @endforeach
                    </ul>

                    {{-- Wood Care Tips --}}
                    <div class="bg-stone-50 rounded-xl p-4 sm:p-5 border border-stone-200 mt-6">
                        <h4 class="text-xs font-bold text-stone-900 uppercase tracking-wider mb-2 flex items-center gap-2">
                            <svg class="w-4 h-4 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/>
                            </svg>
                            <span>Panduan Perawatan Kayu Solid Alami:</span>
                        </h4>
                        <p class="text-xs text-stone-600 leading-relaxed">
                            Cukup bersihkan debu secara berkala menggunakan kain mikrofiber setengah lembab. Hindari paparan terik matahari langsung secara terus-menerus dan pembersih kimia keras. Oleskan teak oil atau beeswax setiap 1-2 tahun untuk menjaga kemilau serat kayu tetap hidup.
                        </p>
                    </div>
                </div>

                {{-- Verified Customer Reviews --}}
                <div class="bg-white rounded-2xl border border-stone-200 p-6 sm:p-8 shadow-xs">
                    <div class="flex items-center justify-between pb-4 border-b border-stone-100 mb-6">
                        <div>
                            <h2 class="text-base sm:text-lg font-black text-stone-900 uppercase tracking-wider">
                                Ulasan Pembeli Terverifikasi
                            </h2>
                            <p class="text-xs text-stone-500 mt-0.5">Rating keseluruhan {{ $product['rating'] }} dari 5 bintang</p>
                        </div>
                        <div class="flex items-center gap-1 text-amber-500 text-sm font-black bg-amber-50 px-3 py-1.5 rounded-lg border border-amber-200">
                            <span>★ 4.9</span>
                        </div>
                    </div>

                    {{-- Review Items --}}
                    <div class="space-y-5">
                        <div class="pb-5 border-b border-stone-100">
                            <div class="flex items-center justify-between mb-1.5">
                                <div class="flex items-center gap-2">
                                    <div class="w-7 h-7 rounded-full bg-stone-200 text-stone-700 flex items-center justify-center font-bold text-xs">
                                        ID
                                    </div>
                                    <div>
                                        <p class="text-xs font-bold text-stone-900">Ibu Dewa Ayu P.</p>
                                        <p class="text-[10px] text-stone-400">Denpasar, Bali • Pembeli Terverifikasi</p>
                                    </div>
                                </div>
                                <span class="text-amber-500 text-xs">★★★★★</span>
                            </div>
                            <p class="text-xs text-stone-600 leading-relaxed mt-2">
                                "Kayunya benar-benar padat dan kokoh sekali, serat jatinya cantik natural. Pengiriman ke Sanur cepat dan langsung dirakit rapi oleh tim teknisi Pande Oka. Sangat puas!"
                            </p>
                        </div>

                        <div>
                            <div class="flex items-center justify-between mb-1.5">
                                <div class="flex items-center gap-2">
                                    <div class="w-7 h-7 rounded-full bg-stone-200 text-stone-700 flex items-center justify-center font-bold text-xs">
                                        HS
                                    </div>
                                    <div>
                                        <p class="text-xs font-bold text-stone-900">Hendrawan S.</p>
                                        <p class="text-[10px] text-stone-400">Jakarta Selatan • Pembeli Terverifikasi</p>
                                    </div>
                                </div>
                                <span class="text-amber-500 text-xs">★★★★★</span>
                            </div>
                            <p class="text-xs text-stone-600 leading-relaxed mt-2">
                                "Finishing doff-nya halus tanpa bau cat menyengat. Packing kayunya tebal dan aman sampai Jakarta. Kualitas bintang lima sekelas furniture ekspor."
                            </p>
                        </div>
                    </div>
                </div>

            </div>

            {{-- Right 4 cols: Order Guarantee & Workshop Info --}}
            <div class="lg:col-span-4 space-y-6">
                
                {{-- Showroom Card --}}
                <div class="bg-white rounded-2xl border border-stone-200 p-6 shadow-xs">
                    <span class="text-[10px] font-bold text-orange-600 uppercase tracking-widest">Workshop &amp; Showroom</span>
                    <h3 class="text-sm font-bold text-stone-900 mt-1">Pande Oka Furniture Bali</h3>
                    <p class="text-xs text-stone-600 mt-2 leading-relaxed">
                        Jl. Sunset Road No. 88, Kuta, Badung, Bali 80361. Buka setiap hari pukul 09:00 - 20:00 WITA.
                    </p>
                    <div class="mt-4 pt-4 border-t border-stone-100 flex items-center justify-between text-xs">
                        <span class="text-stone-500">Konsultasi Desain:</span>
                        <a href="https://wa.me/6281234567890" target="_blank" class="text-orange-600 font-bold hover:underline">
                            +62 812-3456-7890
                        </a>
                    </div>
                </div>

                {{-- Safe Delivery Guarantee Card --}}
                <div class="bg-orange-50/60 rounded-2xl border border-orange-200/80 p-6 shadow-xs text-xs">
                    <h3 class="font-bold text-stone-900 text-sm mb-2 flex items-center gap-2">
                        <span class="w-6 h-6 rounded-md bg-orange-600 text-white flex items-center justify-center shrink-0">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                            </svg>
                        </span>
                        <span>Garansi 100% Bebas Risiko</span>
                    </h3>
                    <p class="text-stone-600 leading-relaxed mb-3">
                        Apabila barang diterima dalam kondisi cacat pengiriman, kami ganti baru tanpa biaya tambahan apapun.
                    </p>
                    <div class="space-y-1.5 text-stone-700 font-medium">
                        <p>✓ Asuransi Ekspedisi Truk Penuh</p>
                        <p>✓ Quality Control 3 Tahap</p>
                        <p>✓ Garansi Rangka 5 Tahun Resmi</p>
                    </div>
                </div>

            </div>
        </div>

        {{-- Related Products Grid --}}
        @if(!empty($relatedProducts) && count($relatedProducts) > 0)
            <div class="mt-12 pt-8 border-t border-stone-200">
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <span class="text-xs font-bold text-orange-600 uppercase tracking-widest">Rekomendasi Terkait</span>
                        <h2 class="text-xl sm:text-2xl font-black text-stone-900 tracking-tight">Koleksi Pilihan Lainnya</h2>
                    </div>
                    <a href="{{ route('new-arrivals') }}" class="text-xs font-bold text-orange-600 hover:text-orange-700 uppercase tracking-wider flex items-center gap-1">
                        <span>Lihat Semua</span>
                        <span>&rarr;</span>
                    </a>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-4 gap-2.5 sm:gap-4 lg:gap-5">
                    @foreach($relatedProducts as $rel)
                        <div class="group bg-white border border-stone-200 hover:border-orange-500 rounded-xl overflow-hidden transition-all duration-200 flex flex-col justify-between shadow-2xs hover:shadow-md">
                            
                            {{-- Image Link --}}
                            <a href="{{ route('products.show', $rel['slug']) }}" class="relative overflow-hidden aspect-square bg-stone-100 block">
                                <img src="{{ $rel['image'] }}" 
                                     alt="{{ $rel['name'] }}" 
                                     loading="lazy"
                                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                
                                <div class="absolute top-1.5 left-1.5 flex flex-col gap-1">
                                    <span class="px-1.5 py-0.5 bg-orange-600 text-white font-black text-[9px] uppercase tracking-wider rounded-xs">
                                        NEW
                                    </span>
                                </div>
                                <div class="absolute top-0 right-0 bg-orange-500 text-white px-1.5 py-0.5 rounded-bl-lg font-black text-[10px]">
                                    -{{ $rel['discount'] }}%
                                </div>
                            </a>

                            {{-- Info --}}
                            <div class="p-2.5 sm:p-3.5 flex-1 flex flex-col justify-between">
                                <div>
                                    <div class="flex items-center justify-between text-[10px] text-stone-500 mb-1">
                                        <span class="uppercase font-semibold text-orange-600">{{ $rel['category'] }}</span>
                                        <span class="flex items-center text-amber-500 font-bold">★ {{ $rel['rating'] }}</span>
                                    </div>
                                    <a href="{{ route('products.show', $rel['slug']) }}" class="block">
                                        <h3 class="text-xs sm:text-sm font-bold text-stone-900 group-hover:text-orange-600 transition-colors line-clamp-2 leading-snug min-h-[2rem]">
                                            {{ $rel['name'] }}
                                        </h3>
                                    </a>
                                </div>

                                <div class="pt-2 border-t border-stone-100 mt-2">
                                    <div class="flex flex-col mb-2">
                                        <span class="text-xs sm:text-base font-black text-orange-600 leading-tight">
                                            Rp {{ number_format($rel['price'], 0, ',', '.') }}
                                        </span>
                                        <span class="text-[10px] text-stone-400 line-through">
                                            Rp {{ number_format($rel['original_price'], 0, ',', '.') }}
                                        </span>
                                    </div>
                                    <div class="grid grid-cols-2 gap-1.5">
                                        <a href="{{ route('products.show', $rel['slug']) }}" 
                                           class="py-1.5 px-2 bg-stone-100 hover:bg-stone-200 text-stone-800 rounded font-bold text-[10px] text-center uppercase tracking-wider transition-colors">
                                            Detail
                                        </a>
                                        <button type="button" 
                                                onclick="addToCart('{{ addslashes($rel['name']) }}', {{ $rel['price'] }}, '{{ $rel['image'] }}')"
                                                class="py-1.5 px-2 bg-stone-900 hover:bg-orange-600 text-white rounded font-bold text-[10px] uppercase tracking-wider transition-colors flex items-center justify-center gap-1 active:scale-[0.98]">
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                                            <span class="truncate">+ Troli</span>
                                        </button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    @endforeach
                </div>
            </div>
        @endif

    </div>
</div>

{{-- Detail Page Interactive Scripts --}}
<script>
    function changeMainImage(src, btn) {
        document.getElementById('main-product-img').src = src;
        document.querySelectorAll('.thumb-btn').forEach(b => {
            b.classList.remove('border-orange-600', 'ring-2', 'ring-orange-200');
            b.classList.add('border-stone-200');
        });
        btn.classList.remove('border-stone-200');
        btn.classList.add('border-orange-600', 'ring-2', 'ring-orange-200');
    }

    function selectVariant(btn) {
        document.querySelectorAll('.variant-btn').forEach(b => {
            b.classList.remove('border-orange-600', 'bg-orange-50', 'text-orange-700', 'font-bold');
            b.classList.add('border-stone-300', 'bg-white', 'text-stone-700', 'font-semibold');
        });
        btn.classList.remove('border-stone-300', 'bg-white', 'text-stone-700', 'font-semibold');
        btn.classList.add('border-orange-600', 'bg-orange-50', 'text-orange-700', 'font-bold');
    }

    function changeQuantity(delta) {
        const input = document.getElementById('product-quantity');
        let current = parseInt(input.value) || 1;
        const max = parseInt(input.max) || 99;
        const min = parseInt(input.min) || 1;

        current += delta;
        if (current < min) current = min;
        if (current > max) current = max;

        input.value = current;
    }

    function handleDetailAddToCart() {
        const qty = parseInt(document.getElementById('product-quantity').value) || 1;
        const title = "{{ addslashes($product['name']) }}";
        const price = {{ $product['price'] }};
        const image = "{{ $product['image'] }}";

        for (let i = 0; i < qty; i++) {
            addToCart(title, price, image);
        }
        showToast('Ditambahkan ke Keranjang', `${qty}x ${title} berhasil ditambahkan.`);
    }

    function handleDetailBuyNow() {
        handleDetailAddToCart();
        toggleCartDrawer();
    }
</script>

@endsection
