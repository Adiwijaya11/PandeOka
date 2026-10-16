@extends('layouts.app')

@section('title', 'New Arrivals 2026 - Koleksi Furniture Kayu Solid Terbaru | Pande Oka')
@section('meta_description', 'Katalog New Arrivals furniture kayu jati & sungkai solid 2026. Desain modern ala Shopee dengan promo diskon hingga 25%, voucher toko, dan gratis ongkir Jawa - Bali.')

@section('content')

{{-- Shopee Style New Arrivals Page Container --}}
<div class="bg-stone-100 min-h-screen py-4 sm:py-6 font-sans">
    <div class="max-w-7xl mx-auto px-2.5 sm:px-6 lg:px-8">

        {{-- Breadcrumb --}}
        <nav class="flex items-center space-x-2 text-xs text-stone-500 uppercase tracking-wider mb-3 sm:mb-4 px-1">
            <a href="{{ url('/') }}" class="hover:text-orange-600 transition-colors">Beranda</a>
            <span>/</span>
            <span class="text-orange-600 font-bold">New Arrivals</span>
        </nav>

        {{-- Clean Page Header --}}
        <div class="flex flex-col sm:flex-row sm:items-center justify-between mb-4 sm:mb-5 px-1 gap-2">
            <div>
                <h1 class="text-xl sm:text-2xl font-black text-stone-900 tracking-tight uppercase">NEW ARRIVALS</h1>
                <p class="text-xs text-stone-500 mt-0.5">Koleksi furniture kayu solid terbaru dari pengrajin Bali &amp; Jepara</p>
            </div>
            <div class="text-xs text-stone-500 font-medium">
                Menampilkan <strong id="total-visible-count" class="text-orange-600">{{ count($products) }}</strong> Produk
            </div>
        </div>

        {{-- Shopee Filter Bar (Category Pills Horizontal Scroll) --}}
        <div class="bg-white rounded-xl border border-stone-200 p-3 sm:p-4 mb-4 shadow-2xs">
            <div class="flex items-center justify-between pb-3 border-b border-stone-100 gap-3">
                <div class="flex items-center gap-2">
                    <svg class="w-4 h-4 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"/>
                    </svg>
                    <span class="text-xs font-bold uppercase tracking-wider text-stone-800">Kategori Pilihan</span>
                </div>
                <span class="text-xs text-stone-400">Pilih kategori untuk memfilter</span>
            </div>

            {{-- Categories Scrollable Pills --}}
            <div class="flex items-center gap-2 overflow-x-auto pt-3 pb-1 no-scrollbar text-xs font-semibold whitespace-nowrap">
                <button type="button" 
                        onclick="filterCategory('all', this)" 
                        class="cat-filter-btn px-3.5 py-1.5 rounded-lg bg-orange-600 text-white transition-all shadow-2xs">
                    Semua Produk ({{ count($products) }})
                </button>
                <button type="button" 
                        onclick="filterCategory('ruang-tamu', this)" 
                        class="cat-filter-btn px-3.5 py-1.5 rounded-lg bg-stone-100 text-stone-700 hover:bg-stone-200 hover:text-orange-600 transition-all">
                    Ruang Tamu &amp; Sofa
                </button>
                <button type="button" 
                        onclick="filterCategory('ruang-makan', this)" 
                        class="cat-filter-btn px-3.5 py-1.5 rounded-lg bg-stone-100 text-stone-700 hover:bg-stone-200 hover:text-orange-600 transition-all">
                    Meja Makan &amp; Kursi
                </button>
                <button type="button" 
                        onclick="filterCategory('kamar-tidur', this)" 
                        class="cat-filter-btn px-3.5 py-1.5 rounded-lg bg-stone-100 text-stone-700 hover:bg-stone-200 hover:text-orange-600 transition-all">
                    Kamar Tidur &amp; Dipan
                </button>
                <button type="button" 
                        onclick="filterCategory('ruang-kerja', this)" 
                        class="cat-filter-btn px-3.5 py-1.5 rounded-lg bg-stone-100 text-stone-700 hover:bg-stone-200 hover:text-orange-600 transition-all">
                    Meja Kerja &amp; Kantor
                </button>
                <button type="button" 
                        onclick="filterCategory('lemari-rak', this)" 
                        class="cat-filter-btn px-3.5 py-1.5 rounded-lg bg-stone-100 text-stone-700 hover:bg-stone-200 hover:text-orange-600 transition-all">
                    Lemari &amp; Rak Buku
                </button>
                <button type="button" 
                        onclick="filterCategory('outdoor', this)" 
                        class="cat-filter-btn px-3.5 py-1.5 rounded-lg bg-stone-100 text-stone-700 hover:bg-stone-200 hover:text-orange-600 transition-all">
                    Outdoor &amp; Kafe
                </button>
            </div>
        </div>

        {{-- Shopee Sorter & Search Strip --}}
        <div class="bg-white rounded-xl border border-stone-200 p-3 sm:p-4 mb-4 shadow-2xs flex flex-col md:flex-row md:items-center justify-between gap-3">
            <div class="flex flex-wrap items-center gap-2 text-xs">
                <span class="text-stone-500 font-semibold mr-1">Urutkan:</span>
                <button type="button" 
                        onclick="sortProducts('terkait', this)" 
                        class="sort-btn px-3 py-1.5 rounded bg-orange-600 text-white font-bold transition-colors">
                    Terkait
                </button>
                <button type="button" 
                        onclick="sortProducts('terbaru', this)" 
                        class="sort-btn px-3 py-1.5 rounded bg-stone-100 text-stone-700 hover:bg-stone-200 font-semibold transition-colors">
                    Terbaru
                </button>
                <button type="button" 
                        onclick="sortProducts('terlaris', this)" 
                        class="sort-btn px-3 py-1.5 rounded bg-stone-100 text-stone-700 hover:bg-stone-200 font-semibold transition-colors">
                    Terpopuler
                </button>
                <select id="sort-select" 
                        onchange="sortProducts(this.value, null)" 
                        class="px-2.5 py-1.5 bg-stone-100 text-stone-800 rounded border border-stone-300 font-semibold focus:outline-none focus:border-orange-600 text-xs">
                    <option value="">Harga...</option>
                    <option value="harga-asc">Harga: Rendah ke Tinggi</option>
                    <option value="harga-desc">Harga: Tinggi ke Rendah</option>
                    <option value="diskon-desc">Diskon Terbesar</option>
                </select>
            </div>

            {{-- Instant Search in New Arrivals --}}
            <div class="relative w-full md:w-64">
                <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-stone-400">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </span>
                <input type="text" 
                       id="search-filter-input" 
                       oninput="filterByKeyword(this.value)" 
                       placeholder="Cari nama atau jenis kayu..." 
                       class="w-full bg-stone-100 text-stone-900 placeholder-stone-400 text-xs pl-9 pr-3 py-1.5 rounded-lg border border-stone-300 focus:outline-none focus:border-orange-600 focus:bg-white transition-colors">
            </div>
        </div>

        {{-- Shopee Style Product Grid (2 Kolom Mobile, 3 Tablet, 4 Desktop) --}}
        <div id="products-grid" class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-2.5 sm:gap-4 lg:gap-5">

            @foreach($products as $product)
                <div class="product-item group bg-white border border-stone-200 hover:border-orange-500 rounded-lg sm:rounded-xl overflow-hidden transition-all duration-200 flex flex-col justify-between shadow-2xs hover:shadow-md"
                     data-category="{{ $product['category_slug'] }}" 
                     data-price="{{ $product['price'] }}" 
                     data-discount="{{ $product['discount'] }}" 
                     data-sales="{{ $product['sales_count'] }}" 
                     data-date="{{ $product['id'] }}" 
                     data-title="{{ strtolower($product['name'] . ' ' . $product['wood_type']) }}">
                    
                    {{-- Clickable Image to Product Detail --}}
                    <a href="{{ route('products.show', $product['slug']) }}" class="relative overflow-hidden aspect-square bg-stone-100 block">
                        <img src="{{ $product['image'] }}" 
                             alt="{{ $product['name'] }}" 
                             loading="lazy"
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        
                        {{-- Badges Left --}}
                        <div class="absolute top-1.5 left-1.5 sm:top-2 sm:left-2 flex flex-col gap-1">
                            @foreach($product['badges'] ?? ['NEW'] as $badge)
                                <span class="px-1.5 py-0.5 {{ $badge === 'NEW' ? 'bg-orange-600' : 'bg-stone-900' }} text-white font-black text-[9px] sm:text-[10px] tracking-wider uppercase rounded-xs">
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
                    <div class="p-2 sm:p-3.5 flex-1 flex flex-col justify-between">
                        <div>
                            <div class="flex items-center justify-between text-[10px] text-stone-500 mb-1">
                                <span class="uppercase font-semibold tracking-wider text-orange-600">{{ $product['category'] }}</span>
                                <span class="flex items-center text-amber-500 font-bold shrink-0">
                                    ★ {{ $product['rating'] }} <span class="text-stone-400 font-normal ml-0.5">({{ $product['reviews_count'] }})</span>
                                </span>
                            </div>
                            
                            {{-- Clickable Title to Detail --}}
                            <a href="{{ route('products.show', $product['slug']) }}" class="block">
                                <h3 class="text-xs sm:text-sm font-bold text-stone-900 group-hover:text-orange-600 transition-colors line-clamp-2 leading-snug min-h-[2rem] sm:min-h-[2.5rem]">
                                    {{ $product['name'] }}
                                </h3>
                            </a>
                            <p class="text-[10px] text-stone-500 mt-0.5 truncate">{{ $product['wood_type'] }}</p>
                        </div>

                        {{-- Price and Dual Actions --}}
                        <div class="pt-2 border-t border-stone-100 mt-2">
                            <div class="flex flex-col mb-2">
                                <span class="text-xs sm:text-base font-black text-orange-600 leading-tight">
                                    Rp {{ number_format($product['price'], 0, ',', '.') }}
                                </span>
                                <span class="text-[10px] sm:text-xs text-stone-400 line-through leading-tight">
                                    Rp {{ number_format($product['original_price'], 0, ',', '.') }}
                                </span>
                            </div>

                            {{-- Dual Actions: Detail Button & Quick Cart --}}
                            <div class="grid grid-cols-2 gap-1.5">
                                <a href="{{ route('products.show', $product['slug']) }}" 
                                   class="py-1.5 sm:py-2 px-2 bg-stone-100 hover:bg-stone-200 text-stone-800 rounded font-bold text-[10px] sm:text-xs text-center uppercase tracking-wider transition-colors flex items-center justify-center">
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
                                        class="py-1.5 sm:py-2 px-2 bg-stone-900 hover:bg-orange-600 text-white rounded font-bold text-[10px] sm:text-xs uppercase tracking-wider transition-colors flex items-center justify-center gap-1 active:scale-[0.98]">
                                    <svg class="w-3 h-3 sm:w-3.5 sm:h-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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

        {{-- No Results Found State --}}
        <div id="no-products-found" class="hidden bg-white rounded-xl border border-stone-200 p-12 text-center my-6">
            <div class="w-16 h-16 bg-orange-100 text-orange-600 rounded-full flex items-center justify-center mx-auto mb-3">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <h4 class="text-base font-bold text-stone-900">Produk Tidak Ditemukan</h4>
            <p class="text-xs text-stone-500 mt-1">Coba gunakan kata kunci lain atau pilih kategori "Semua Produk".</p>
            <button type="button" 
                    onclick="filterCategory('all', document.querySelector('.cat-filter-btn'))"
                    class="mt-4 px-4 py-2 bg-orange-600 hover:bg-orange-700 text-white text-xs font-bold uppercase tracking-wider rounded-lg transition-colors">
                Tampilkan Semua Produk
            </button>
        </div>

        {{-- Shopee Guarantee Bottom Banner --}}
        <div class="mt-8 bg-white border border-stone-200 rounded-xl p-4 sm:p-6 flex flex-col md:flex-row items-center justify-between gap-4 text-xs text-stone-700">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-orange-100 text-orange-600 rounded-full flex items-center justify-center font-bold text-sm shrink-0">
                    ✓
                </div>
                <div>
                    <h4 class="font-bold text-stone-900 text-sm">Jaminan Belanja Pande Oka Official</h4>
                    <p class="text-stone-500 text-xs">100% Kayu Solid Asli, Garansi Konstruksi 5 Tahun, &amp; Layanan Kirim Terproteksi.</p>
                </div>
            </div>
            <div class="flex items-center gap-2">
                <a href="https://wa.me/6281234567890?text=Halo%20Pande%20Oka,%20saya%20tertarik%20dengan%20koleksi%20New%20Arrivals" 
                   target="_blank" 
                   class="px-5 py-2.5 bg-orange-600 hover:bg-orange-700 text-white font-bold rounded-lg uppercase tracking-wider transition-colors shadow-2xs">
                    Hubungi CS Store (WhatsApp)
                </a>
            </div>
        </div>

    </div>
</div>

{{-- Interactive Client-Side Filter & Sort Scripts --}}
<script>
    let activeCategory = 'all';
    let currentSort = 'terkait';
    let searchKeyword = '';

    function updateProductGrid() {
        const items = Array.from(document.querySelectorAll('.product-item'));
        const emptyState = document.getElementById('no-products-found');
        let visibleCount = 0;

        items.forEach(item => {
            const cat = item.getAttribute('data-category');
            const title = item.getAttribute('data-title');
            
            const matchCat = (activeCategory === 'all' || cat === activeCategory);
            const matchSearch = (!searchKeyword || title.includes(searchKeyword.toLowerCase().trim()));

            if (matchCat && matchSearch) {
                item.style.display = '';
                visibleCount++;
            } else {
                item.style.display = 'none';
            }
        });

        document.getElementById('total-visible-count').innerText = visibleCount;

        if (visibleCount === 0) {
            emptyState.classList.remove('hidden');
        } else {
            emptyState.classList.add('hidden');
        }
    }

    function filterCategory(cat, btn) {
        activeCategory = cat;
        document.querySelectorAll('.cat-filter-btn').forEach(b => {
            b.classList.remove('bg-orange-600', 'text-white', 'shadow-2xs');
            b.classList.add('bg-stone-100', 'text-stone-700');
        });
        if (btn) {
            btn.classList.remove('bg-stone-100', 'text-stone-700');
            btn.classList.add('bg-orange-600', 'text-white', 'shadow-2xs');
        }
        updateProductGrid();
    }

    function filterByKeyword(val) {
        searchKeyword = val;
        updateProductGrid();
    }

    function sortProducts(criteria, btn) {
        if (!criteria) return;
        currentSort = criteria;

        if (btn) {
            document.querySelectorAll('.sort-btn').forEach(b => {
                b.classList.remove('bg-orange-600', 'text-white', 'font-bold');
                b.classList.add('bg-stone-100', 'text-stone-700', 'font-semibold');
            });
            btn.classList.remove('bg-stone-100', 'text-stone-700', 'font-semibold');
            btn.classList.add('bg-orange-600', 'text-white', 'font-bold');
        }

        const container = document.getElementById('products-grid');
        const items = Array.from(container.querySelectorAll('.product-item'));

        items.sort((a, b) => {
            const priceA = parseInt(a.getAttribute('data-price')) || 0;
            const priceB = parseInt(b.getAttribute('data-price')) || 0;
            const discountA = parseInt(a.getAttribute('data-discount')) || 0;
            const discountB = parseInt(b.getAttribute('data-discount')) || 0;
            const salesA = parseInt(a.getAttribute('data-sales')) || 0;
            const salesB = parseInt(b.getAttribute('data-sales')) || 0;
            const dateA = parseInt(a.getAttribute('data-date')) || 0;
            const dateB = parseInt(b.getAttribute('data-date')) || 0;

            if (criteria === 'harga-asc') return priceA - priceB;
            if (criteria === 'harga-desc') return priceB - priceA;
            if (criteria === 'diskon-desc') return discountB - discountA;
            if (criteria === 'terlaris') return salesB - salesA;
            if (criteria === 'terbaru') return dateB - dateA;
            return 0; // terkait default
        });

        items.forEach(el => container.appendChild(el));
        updateProductGrid();
    }
</script>

@endsection
