@extends('layouts.app')

@section('title', 'Best Seller Furniture - Pande Oka Furniture & Living')
@section('meta_description', 'Katalog furniture kayu jati & sungkai solid terlaris. Desain minimalis modern dengan garansi 5 tahun langsung dari pengrajin Jepara & Bali.')

@section('content')

{{-- Hero Section (Full-Width Background Image, 100svh Total including Navbar, Responsive Typography) --}}
<section class="relative bg-stone-900 text-white overflow-hidden border-b border-stone-800 flex flex-col justify-center py-6 sm:py-8 lg:py-10 px-4 sm:px-6 lg:px-8"
         style="min-height: calc(100svh - var(--header-height, 98px));">
    {{-- Background Image with Solid Dark Overlay (No Gradients) --}}
    <div class="absolute inset-0 z-0">
        <img src="https://images.unsplash.com/photo-1616486338812-3dadae4b4ace?auto=format&fit=crop&w=2000&q=85" 
             alt="Interior Furniture Kayu Solid Minimalis" 
             class="w-full h-full object-cover object-center brightness-90">
        <div class="absolute inset-0 bg-stone-950/75"></div>
    </div>

    {{-- Hero Content (Vertically Centered across all screens) --}}
    <div class="relative z-10 max-w-7xl mx-auto w-full flex flex-col justify-center flex-1 my-auto">
        {{-- Breadcrumb --}}
        <nav class="flex items-center space-x-2 text-[11px] sm:text-xs text-stone-300 uppercase tracking-wider mb-3 sm:mb-4">
            <a href="{{ url('/') }}" class="hover:text-orange-400 transition-colors">Beranda</a>
            <span>/</span>
            <a href="#katalog" class="hover:text-orange-400 transition-colors">Katalog</a>
            <span>/</span>
            <span class="text-orange-400 font-bold">Best Seller</span>
        </nav>

        <div class="max-w-3xl">
            <div class="inline-flex items-center gap-2 px-2.5 sm:px-3 py-1 bg-orange-600 text-white text-[10px] sm:text-xs font-black uppercase tracking-wider rounded-md mb-2.5 sm:mb-3.5 shadow-sm">
                <span class="w-1.5 sm:w-2 h-1.5 sm:h-2 rounded-full bg-white"></span>
                <span>Koleksi Terlaris &bull; Kayu Solid Asli</span>
            </div>
            
            <h1 class="text-2xl sm:text-4xl md:text-5xl lg:text-5xl xl:text-6xl font-black text-white tracking-tight leading-[1.12]">
                FURNITURE KAYU SOLID <span class="text-orange-500">BERKUALITAS TINGGI</span>
            </h1>
            
            <p class="text-xs sm:text-sm md:text-base text-stone-200 max-w-2xl mt-2.5 sm:mt-4 leading-relaxed font-normal">
                Koleksi furniture kayu jati dan sungkai solid paling banyak diminati. Menghadirkan kehangatan serat kayu alami dengan desain modern minimalis yang tahan puluhan tahun.
            </p>

            {{-- Action Buttons --}}
            <div class="mt-5 sm:mt-6 flex flex-wrap items-center gap-2.5 sm:gap-4">
                <a href="#katalog" 
                   class="px-5 sm:px-7 py-2.5 sm:py-3 bg-orange-600 hover:bg-orange-700 text-white font-bold text-xs sm:text-sm uppercase tracking-wider rounded-xl transition-colors shadow-md flex items-center gap-2 active:scale-95">
                    <span>Lihat Semua Katalog</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </a>
                <a href="https://wa.me/6281234567890?text=Halo%20Pande%20Oka,%20saya%20tertarik%20dengan%20koleksi%20furniture%20kayu%20solid" 
                   target="_blank"
                   class="px-5 sm:px-7 py-2.5 sm:py-3 bg-white hover:bg-stone-100 text-stone-900 font-bold text-xs sm:text-sm uppercase tracking-wider rounded-xl transition-colors shadow-md flex items-center gap-2 active:scale-95">
                    <svg class="w-4 h-4 text-green-600" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0 0 12.04 2zm.01 1.67c4.54 0 8.24 3.7 8.24 8.24 0 2.2-.86 4.28-2.42 5.84a8.18 8.18 0 0 1-5.83 2.41c-1.47 0-2.91-.39-4.18-1.15l-.3-.18-3.11.82.83-3.03-.2-.31a8.18 8.18 0 0 1-1.27-4.4c0-4.54 3.7-8.24 8.24-8.24zm4.52 11.64c-.25-.13-1.47-.72-1.7-.81-.23-.08-.39-.13-.56.13-.17.25-.64.81-.79.97-.14.17-.29.19-.54.06-.25-.13-1.07-.39-2.03-1.25-.75-.67-1.26-1.5-1.41-1.75-.15-.25-.02-.39.11-.51.11-.11.25-.29.38-.44.13-.15.17-.25.25-.42.08-.17.04-.32-.02-.45-.06-.13-.56-1.35-.77-1.85-.2-.49-.41-.42-.56-.43h-.48c-.17 0-.44.06-.67.31-.23.25-.88.86-.88 2.1 0 1.24.9 2.44 1.03 2.61.13.17 1.78 2.72 4.31 3.81.6.26 1.07.41 1.44.53.61.19 1.16.17 1.6.1.49-.07 1.47-.6 1.68-1.18.21-.58.21-1.08.15-1.18-.06-.11-.23-.17-.48-.29z"/>
                    </svg>
                    <span>Konsultasi Kayu</span>
                </a>
            </div>

            {{-- Trust Points Strip (Clean, Solid, No Gradients, No Emojis, Responsive) --}}
            <div class="mt-6 sm:mt-8 lg:mt-10 pt-4 sm:pt-5 border-t border-white/15 grid grid-cols-2 sm:grid-cols-4 gap-2.5 sm:gap-4 text-xs">
                <div>
                    <div class="text-orange-400 font-bold text-xs sm:text-sm md:text-base">100% Solid</div>
                    <div class="text-stone-300 text-[10px] sm:text-xs mt-0.5">Jati &amp; Sungkai Legal</div>
                </div>
                <div>
                    <div class="text-orange-400 font-bold text-xs sm:text-sm md:text-base">5 Tahun</div>
                    <div class="text-stone-300 text-[10px] sm:text-xs mt-0.5">Garansi Konstruksi</div>
                </div>
                <div>
                    <div class="text-orange-400 font-bold text-xs sm:text-sm md:text-base">Gratis Ongkir</div>
                    <div class="text-stone-300 text-[10px] sm:text-xs mt-0.5">Area Jawa &amp; Bali</div>
                </div>
                <div>
                    <div class="text-orange-400 font-bold text-xs sm:text-sm md:text-base">Custom Order</div>
                    <div class="text-stone-300 text-[10px] sm:text-xs mt-0.5">Sesuai Dimensi Ruang</div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Filter & Product Grid Section --}}
<section class="py-8 sm:py-12 px-2.5 sm:px-6 lg:px-8 bg-white relative" id="katalog">
    <div id="best-seller" class="absolute -top-20"></div>
    <div id="new-arrivals" class="absolute -top-20"></div>
    <div id="kategori" class="absolute -top-20"></div>
    <div class="max-w-7xl mx-auto">

        {{-- Filter & Sorter Toolbar --}}
        <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4 pb-6 border-b border-stone-200">
            
            {{-- Category Tabs --}}
            <div class="flex items-center gap-2 overflow-x-auto pb-2 lg:pb-0 scrollbar-none">
                <button type="button" class="px-4 py-2 text-xs font-bold rounded-full bg-orange-600 text-white whitespace-nowrap shadow-xs">
                    Semua Produk
                </button>
                <button type="button" class="px-4 py-2 text-xs font-semibold rounded-full bg-stone-100 hover:bg-orange-50 hover:text-orange-600 text-stone-700 whitespace-nowrap transition-colors">
                    Sofa & Kursi
                </button>
                <button type="button" class="px-4 py-2 text-xs font-semibold rounded-full bg-stone-100 hover:bg-orange-50 hover:text-orange-600 text-stone-700 whitespace-nowrap transition-colors">
                    Meja Makan
                </button>
                <button type="button" class="px-4 py-2 text-xs font-semibold rounded-full bg-stone-100 hover:bg-orange-50 hover:text-orange-600 text-stone-700 whitespace-nowrap transition-colors">
                    Kamar Tidur
                </button>
                <button type="button" class="px-4 py-2 text-xs font-semibold rounded-full bg-stone-100 hover:bg-orange-50 hover:text-orange-600 text-stone-700 whitespace-nowrap transition-colors">
                    Meja Kerja
                </button>
                <button type="button" class="px-4 py-2 text-xs font-semibold rounded-full bg-stone-100 hover:bg-orange-50 hover:text-orange-600 text-stone-700 whitespace-nowrap transition-colors">
                    Lemari & Rak
                </button>
            </div>

            {{-- Result Count & Sorting --}}
            <div class="flex items-center justify-between lg:justify-end gap-4 text-xs">
                <span class="text-stone-500">
                    Menampilkan <strong class="text-stone-900">8</strong> dari 24 produk
                </span>

                <div class="flex items-center gap-2">
                    <label for="sort" class="text-stone-500 font-medium">Urutkan:</label>
                    <select id="sort" class="bg-stone-50 border border-stone-300 rounded-md px-3 py-1.5 text-xs text-stone-800 focus:outline-none focus:border-orange-600">
                        <option>Terpopuler (Best Seller)</option>
                        <option>Harga: Rendah ke Tinggi</option>
                        <option>Harga: Tinggi ke Rendah</option>
                        <option>Rilisan Terbaru</option>
                    </select>
                </div>
            </div>

        </div>

        {{-- Product Grid (Shopee Style: 2 Kolom Mobile, 3 Kolom Tablet, 4 Kolom Desktop) --}}
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-2.5 sm:gap-4 lg:gap-6 pt-6 sm:pt-8">

            @php
                $displayProducts = $products ?? \App\Services\ProductCatalog::all();
                $displayProducts = $displayProducts instanceof \Illuminate\Support\Collection ? $displayProducts->take(8) : array_slice($displayProducts, 0, 8);
            @endphp
            @foreach($displayProducts as $product)
                <div class="group bg-white border border-stone-200 hover:border-orange-500 rounded-lg sm:rounded-xl overflow-hidden transition-all duration-200 flex flex-col justify-between shadow-2xs hover:shadow-md">
                    
                    {{-- Clickable Image to Product Detail --}}
                    <a href="{{ route('products.show', $product['slug']) }}" class="relative overflow-hidden aspect-square bg-stone-100 block">
                        <img src="{{ $product['image'] }}" 
                             alt="{{ $product['name'] }}" 
                             loading="lazy"
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        
                        {{-- Badges Left --}}
                        <div class="absolute top-1.5 left-1.5 sm:top-2.5 sm:left-2.5 flex flex-col gap-1">
                            @foreach($product['badges'] ?? ['BEST SELLER'] as $badge)
                                <span class="px-1.5 py-0.5 {{ $badge === 'BEST SELLER' || $badge === 'NEW' ? 'bg-orange-600' : 'bg-stone-900' }} text-white font-black text-[9px] sm:text-[10px] tracking-wider uppercase rounded-xs sm:rounded">
                                    {{ $badge }}
                                </span>
                            @endforeach
                        </div>

                        {{-- Discount Badge Right --}}
                        <div class="absolute top-0 right-0 bg-orange-500 text-white px-1.5 sm:px-2 py-0.5 sm:py-1 rounded-bl-lg font-black text-[10px] sm:text-xs">
                            -{{ $product['discount'] }}%
                        </div>
                    </a>

                    {{-- Product Information --}}
                    <div class="p-2.5 sm:p-4 flex-1 flex flex-col justify-between">
                        <div>
                            <div class="flex items-center justify-between text-[10px] sm:text-[11px] text-stone-500 mb-1">
                                <span class="uppercase font-semibold tracking-wider text-orange-600">{{ $product['category'] }}</span>
                                <span class="flex items-center text-amber-500 font-bold shrink-0 ml-1">
                                    â˜… {{ $product['rating'] }} <span class="text-stone-400 font-normal ml-0.5 hidden xs:inline sm:inline">({{ $product['reviews_count'] }})</span>
                                </span>
                            </div>

                            <a href="{{ route('products.show', $product['slug']) }}" class="block">
                                <h3 class="text-xs sm:text-sm font-bold text-stone-900 group-hover:text-orange-600 transition-colors line-clamp-2 leading-snug min-h-[2rem] sm:min-h-[2.5rem]">
                                    {{ $product['name'] }}
                                </h3>
                            </a>
                            <p class="text-[10px] sm:text-[11px] text-stone-500 mt-0.5 sm:mt-1 truncate">{{ $product['wood_type'] }}</p>
                        </div>

                        {{-- Price and Dual Actions --}}
                        <div class="pt-2 sm:pt-3 border-t border-stone-100 mt-2 sm:mt-3">
                            <div class="flex flex-col sm:flex-row sm:items-baseline sm:gap-2 mb-2 sm:mb-3">
                                <span class="text-xs sm:text-base font-black text-orange-600 leading-tight">
                                    Rp {{ number_format($product['price'], 0, ',', '.') }}
                                </span>
                                <span class="text-[10px] sm:text-xs text-stone-400 line-through leading-tight">
                                    Rp {{ number_format($product['original_price'], 0, ',', '.') }}
                                </span>
                            </div>

                            {{-- Dual Actions: Detail Button & Quick Cart --}}
                            <div class="grid grid-cols-2 gap-1.5 sm:gap-2">
                                <a href="{{ route('products.show', $product['slug']) }}" 
                                   class="py-1.5 sm:py-2.5 px-2 bg-stone-100 hover:bg-stone-200 text-stone-800 rounded-md sm:rounded-lg font-bold text-[10px] sm:text-xs text-center uppercase tracking-wider transition-colors flex items-center justify-center">
                                    Detail
                                </a>

                                <button type="button" 
                                        data-id="{{ $product['id'] }}"
                                        data-name="{{ $product['name'] }}"
                                        data-price="{{ $product['price'] }}"
                                        data-formatted-price="{{ 'Rp ' . number_format($product['price'], 0, ',', '.') }}"
                                        data-original-price="{{ $product['original_price'] ?? '' }}"
                                        data-formatted-original-price="{{ isset($product['original_price']) && $product['original_price'] ? 'Rp ' . number_format($product['original_price'], 0, ',', '.') : '' }}"
                                        data-image="{{ $product['image'] }}"
                                        data-stock="{{ $product['stock'] ?? 10 }}"
                                        data-finish="{{ $product['finish'] ?? 'Natural Satin Doff' }}"
                                        data-dimensions="{{ $product['dimensions'] ?? 'Standard' }}"
                                        onclick="triggerShopeeQuickAdd(this)"
                                        class="py-1.5 sm:py-2.5 px-2 bg-stone-900 hover:bg-orange-600 text-white rounded-md sm:rounded-lg font-bold text-[10px] sm:text-xs uppercase tracking-wider transition-colors flex items-center justify-center gap-1 active:scale-[0.98]">
                                    <svg class="w-3.5 h-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                                    </svg>
                                    <span class="truncate">+ Troli</span>
                                </button>
                            </div>
                        </div>

                    </div>
                </div>
            @endforeach

        </div>

        {{-- Load More / View All New Arrivals Button --}}
        <div class="mt-12 text-center">
            <a href="{{ route('new-arrivals') }}" 
               class="inline-flex items-center gap-2 px-8 py-3.5 bg-white border-2 border-stone-900 hover:border-orange-600 hover:bg-orange-600 hover:text-white text-stone-900 rounded-lg font-bold text-xs uppercase tracking-widest transition-all shadow-xs">
                <span>Lihat Seluruh 24 Koleksi (New Arrivals)</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                </svg>
            </a>
        </div>
</section>

{{-- Portofolio & Proyek Realisasi (Solid White & Orange Theme) --}}
<section class="py-16 px-4 sm:px-6 lg:px-8 bg-stone-50 border-t border-stone-200" id="portofolio">
    <div class="max-w-7xl mx-auto">
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-10">
            <div>
                <span class="text-orange-600 font-bold text-xs uppercase tracking-widest">
                    Dokumentasi Pekerjaan
                </span>
                <h2 class="text-2xl sm:text-3xl font-black text-stone-900 mt-1">
                    Portofolio &amp; Hasil Jadi Furniture
                </h2>
                <p class="text-stone-600 text-xs sm:text-sm mt-1 max-w-xl">
                    Dokumentasi nyata instalasi furniture kayu solid Pande Oka di berbagai villa, residensial mewah, dan kafe di seluruh Indonesia.
                </p>
            </div>
            <div>
                <a href="https://wa.me/6281234567890?text=Halo%20Pande%20Oka,%20saya%20ingin%20melihat%20katalog%20portofolio%20lengkap" target="_blank" class="inline-flex items-center gap-1.5 text-xs font-bold text-orange-600 hover:text-orange-700 uppercase tracking-wider">
                    <span>Lihat Lebih Banyak di Instagram</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                    </svg>
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            {{-- Proyek 1 --}}
            <div class="bg-white border border-stone-200 rounded-xl overflow-hidden shadow-xs hover:border-orange-500 transition-colors">
                <div class="aspect-video bg-stone-100 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1600210492486-724fe5c67fb0?auto=format&fit=crop&w=700&q=80" alt="Villa Canggu Bali" class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                </div>
                <div class="p-5">
                    <span class="text-[10px] font-bold text-orange-600 uppercase tracking-wider">Villa Komersial • Bali</span>
                    <h3 class="text-sm font-bold text-stone-900 mt-1">Private Villa Suites, Canggu Bali</h3>
                    <p class="text-xs text-stone-500 mt-1 leading-relaxed">
                        Pengadaan set tempat tidur king size jati, meja makan trembesi utuh 3 meter, dan sofa outdoor tahan cuaca.
                    </p>
                </div>
            </div>

            {{-- Proyek 2 --}}
            <div class="bg-white border border-stone-200 rounded-xl overflow-hidden shadow-xs hover:border-orange-500 transition-colors">
                <div class="aspect-video bg-stone-100 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1618221195710-dd6b41faaea6?auto=format&fit=crop&w=700&q=80" alt="Rumah Tinggal Menteng" class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                </div>
                <div class="p-5">
                    <span class="text-[10px] font-bold text-orange-600 uppercase tracking-wider">Residensial • Jakarta</span>
                    <h3 class="text-sm font-bold text-stone-900 mt-1">Modern Living Residence, Menteng</h3>
                    <p class="text-xs text-stone-500 mt-1 leading-relaxed">
                        Full furnished living room set, credenza TV scandinavian dengan anyaman rotan asli Jepara, dan kabinet display.
                    </p>
                </div>
            </div>

            {{-- Proyek 3 --}}
            <div class="bg-white border border-stone-200 rounded-xl overflow-hidden shadow-xs hover:border-orange-500 transition-colors">
                <div class="aspect-video bg-stone-100 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1554995207-c18c203602cb?auto=format&fit=crop&w=700&q=80" alt="Cafe & Resto Ubud" class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                </div>
                <div class="p-5">
                    <span class="text-[10px] font-bold text-orange-600 uppercase tracking-wider">Hospitality • Ubud</span>
                    <h3 class="text-sm font-bold text-stone-900 mt-1">Artisan Coffee &amp; Eatery, Ubud</h3>
                    <p class="text-xs text-stone-500 mt-1 leading-relaxed">
                        Set 40 kursi kafe kayu sungkai bleached, meja barista kayu jati solid, dan rak gantung display minimalis.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection