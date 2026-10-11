{{-- Sticky Site Header Wrapper (Fully Responsive, Zero Horizontal Overflow) --}}
<div id="site-header-wrapper" class="sticky top-0 z-40 w-full max-w-full font-sans">
    
    {{-- Announcement Bar (Clean Solid Dark, Responsive Truncate) --}}
    <div class="bg-stone-900 border-b border-stone-800 text-stone-300 text-[11px] sm:text-xs py-2 px-3 sm:px-6 tracking-wider uppercase font-medium">
        <div class="max-w-7xl mx-auto flex items-center justify-between gap-3 overflow-hidden">
            <div class="flex items-center gap-2 min-w-0 truncate">
                <span class="w-1.5 h-1.5 rounded-full bg-orange-600 shrink-0"></span>
                <span class="truncate hidden md:inline">Gratis Ongkir &amp; Perakitan Area Jawa - Bali | Garansi Kayu Solid 5 Tahun</span>
                <span class="truncate md:hidden">Gratis Ongkir &amp; Perakitan Jawa-Bali</span>
            </div>
            <div class="hidden md:flex items-center space-x-3 text-[11px] text-stone-300 shrink-0">
                <a href="#tracking" class="hover:text-orange-500 transition-colors flex items-center gap-1">
                    <svg class="w-3.5 h-3.5 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                    <span>Lacak Pengiriman</span>
                </a>
                <span class="text-stone-700">|</span>
                <a href="https://wa.me/6281234567890" target="_blank" class="hover:text-orange-500 transition-colors flex items-center gap-1">
                    <span class="text-orange-500 font-bold">●</span> WhatsApp CS
                </a>
                <span class="text-stone-700">|</span>
                <a href="#showroom" class="hover:text-orange-500 transition-colors">Showroom</a>
            </div>
        </div>
    </div>

    {{-- Main Navbar Header --}}
    <header class="bg-white/95 backdrop-blur-md border-b border-stone-200 w-full max-w-full">
        <div class="max-w-7xl mx-auto px-3 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16 sm:h-20 gap-2 sm:gap-4 w-full">
                
                {{-- Left Side: Mobile/Tablet Hamburger Menu (Visible on screens < xl) --}}
                <div class="flex items-center xl:hidden shrink-0">
                    <button type="button" 
                            id="mobile-menu-toggle"
                            onclick="openMobileMenu()"
                            aria-label="Buka Menu Navigasi" 
                            class="p-2 -ml-1 text-stone-700 hover:text-stone-900 hover:bg-stone-100 rounded-md transition-colors focus:outline-none flex items-center gap-1.5">
                        <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <span class="text-[11px] font-bold tracking-widest uppercase hidden sm:inline text-stone-600">Menu</span>
                    </button>
                </div>

                {{-- Brand Logo: Left on XL+, Centered on Mobile/Tablet --}}
                <div class="flex items-center justify-center xl:justify-start shrink-0">
                    <a href="{{ url('/') }}" class="group flex items-center gap-1 py-1">
                        <span class="font-black text-lg sm:text-xl lg:text-2xl tracking-[0.15em] sm:tracking-[0.2em] text-stone-900 uppercase font-sans whitespace-nowrap group-hover:text-orange-600 transition-colors">
                            PANDE OKA<span class="text-orange-600">.</span>
                        </span>
                    </a>
                </div>

                {{-- Desktop Navigation Links (Compact & Perfectly Spaced, No Overflow) --}}
                <nav class="hidden xl:flex items-center space-x-1 2xl:space-x-1.5 text-[11px] 2xl:text-[12px] font-medium tracking-wider uppercase flex-1 justify-center whitespace-nowrap shrink min-w-0">
                    
                    {{-- Katalog --}}
                    <a href="{{ url('/') }}" 
                       class="px-2 py-1.5 2xl:px-2.5 2xl:py-1.5 {{ request()->is('/') ? 'text-white bg-orange-600 font-semibold' : 'text-stone-700 hover:text-orange-600 hover:bg-stone-100' }} rounded transition-colors duration-150">
                        Katalog
                    </a>

                    {{-- Dropdown Kategori --}}
                    <div class="relative group">
                        <button type="button" 
                                class="px-2 py-1.5 2xl:px-2.5 2xl:py-1.5 text-stone-700 hover:text-orange-600 hover:bg-stone-100 rounded transition-colors duration-150 flex items-center gap-1 focus:outline-none">
                            <span>Kategori</span>
                            <svg class="w-3 h-3 text-stone-400 group-hover:text-orange-600 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        {{-- Dropdown Menu --}}
                        <div class="absolute left-0 mt-1 w-52 bg-white border border-stone-200 rounded-lg shadow-xl py-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-150 z-50">
                            <a href="#ruang-tamu" class="block px-4 py-2 text-xs text-stone-700 hover:bg-orange-50 hover:text-orange-600 font-medium transition-colors">
                                🛋️ Ruang Tamu &amp; Sofa
                            </a>
                            <a href="#ruang-makan" class="block px-4 py-2 text-xs text-stone-700 hover:bg-orange-50 hover:text-orange-600 font-medium transition-colors">
                                🍽️ Meja Makan Solid
                            </a>
                            <a href="#kamar-tidur" class="block px-4 py-2 text-xs text-stone-700 hover:bg-orange-50 hover:text-orange-600 font-medium transition-colors">
                                🛏️ Kamar Tidur &amp; Dipan
                            </a>
                            <a href="#ruang-kerja" class="block px-4 py-2 text-xs text-stone-700 hover:bg-orange-50 hover:text-orange-600 font-medium transition-colors">
                                💼 Meja Kerja &amp; Kantor
                            </a>
                            <div class="border-t border-stone-100 my-1"></div>
                            <a href="#custom-order" class="block px-4 py-2 text-xs text-orange-600 hover:bg-orange-50 font-bold transition-colors">
                                📐 Custom Sesuai Ruangan
                            </a>
                        </div>
                    </div>

                    {{-- New Arrivals --}}
                    <a href="#new-arrivals" 
                       class="px-2 py-1.5 2xl:px-2.5 2xl:py-1.5 text-stone-700 hover:text-orange-600 hover:bg-stone-100 rounded transition-colors duration-150">
                        New Arrivals
                    </a>
                    
                    {{-- Best Seller --}}
                    <a href="#best-seller" 
                       class="px-2 py-1.5 2xl:px-2.5 2xl:py-1.5 text-stone-700 hover:text-orange-600 hover:bg-stone-100 rounded transition-colors duration-150 flex items-center gap-1">
                        <span>Best Seller</span>
                        <span class="text-[9px] font-black bg-orange-600 text-white px-1 rounded">HOT</span>
                    </a>

                    {{-- Portofolio --}}
                    <a href="#portofolio" 
                       class="px-2 py-1.5 2xl:px-2.5 2xl:py-1.5 text-stone-700 hover:text-orange-600 hover:bg-stone-100 rounded transition-colors duration-150">
                        Portofolio
                    </a>
                    
                    {{-- Lacak Pesanan --}}
                    <a href="#tracking" 
                       class="px-2 py-1.5 2xl:px-2.5 2xl:py-1.5 text-stone-700 hover:text-orange-600 hover:bg-stone-100 rounded transition-colors duration-150 flex items-center gap-1">
                        <svg class="w-3.5 h-3.5 text-stone-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1"/>
                        </svg>
                        <span>Lacak Pesanan</span>
                    </a>
                    
                    {{-- Custom Order --}}
                    <a href="#custom-order" 
                       class="px-2 py-1.5 2xl:px-2.5 2xl:py-1.5 text-stone-700 hover:text-orange-600 hover:bg-stone-100 rounded transition-colors duration-150">
                        Custom Order
                    </a>
                    
                    {{-- Promo --}}
                    <a href="#promo" 
                       class="px-2 py-1.5 2xl:px-2.5 2xl:py-1.5 text-orange-600 font-bold hover:bg-orange-50 rounded transition-colors duration-150">
                        Promo
                    </a>
                </nav>

                {{-- Right Actions: Search & Cart & Contact --}}
                <div class="flex items-center space-x-1 sm:space-x-2 shrink-0">
                    
                    {{-- Desktop Inline Search Bar (Visible on 2xl+ only to avoid crowding xl) --}}
                    <div class="relative hidden 2xl:block w-40">
                        <form action="#" method="GET" class="relative" onsubmit="event.preventDefault();">
                            <input type="text" 
                                   name="q" 
                                   placeholder="Cari furniture..." 
                                   class="w-full bg-stone-100 text-stone-900 placeholder-stone-400 text-xs rounded-md pl-7 pr-3 py-1.5 border border-stone-200 focus:outline-none focus:border-orange-600 transition-colors">
                            <div class="absolute inset-y-0 left-0 pl-2 flex items-center pointer-events-none text-stone-400">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </div>
                        </form>
                    </div>

                    {{-- Search Toggle Button (Visible on screens < 2xl) --}}
                    <button type="button" 
                            id="search-modal-open-btn"
                            onclick="toggleSearchModal()"
                            class="p-2 text-stone-700 hover:text-orange-600 hover:bg-stone-100 rounded-md transition-colors focus:outline-none 2xl:hidden"
                            aria-label="Cari Produk">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </button>

                    {{-- Shopping Cart Link with Badge (Goes to Shopee Style Cart Page) --}}
                    <a href="{{ route('cart.index') }}" 
                       id="cart-nav-link"
                       aria-label="Keranjang Belanja"
                       class="relative p-2 text-stone-700 hover:text-orange-600 hover:bg-stone-100 rounded-md transition-colors duration-150 flex items-center focus:outline-none">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                        </svg>
                        {{-- Cart Badge Counter --}}
                        <span id="nav-cart-badge" 
                              class="absolute -top-0.5 -right-0.5 bg-orange-600 text-white text-[10px] font-bold w-4 h-4 rounded-full flex items-center justify-center border-2 border-white shadow-sm font-sans">
                            3
                        </span>
                    </a>

                    {{-- WhatsApp Consultation Button --}}
                    <a href="https://wa.me/6281234567890" 
                       target="_blank"
                       class="hidden sm:inline-flex items-center gap-1.5 px-2.5 sm:px-3 py-1.5 rounded-md text-xs font-bold uppercase tracking-wider transition-colors duration-150 border bg-orange-600 hover:bg-orange-700 text-white border-orange-600 shadow-xs">
                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0 0 12.04 2zm.01 1.67c4.54 0 8.24 3.7 8.24 8.24 0 2.2-.86 4.28-2.42 5.84a8.18 8.18 0 0 1-5.83 2.41c-1.47 0-2.91-.39-4.18-1.15l-.3-.18-3.11.82.83-3.03-.2-.31a8.18 8.18 0 0 1-1.27-4.4c0-4.54 3.7-8.24 8.24-8.24zm4.52 11.64c-.25-.13-1.47-.72-1.7-.81-.23-.08-.39-.13-.56.13-.17.25-.64.81-.79.97-.14.17-.29.19-.54.06-.25-.13-1.07-.39-2.03-1.25-.75-.67-1.26-1.5-1.41-1.75-.15-.25-.02-.39.11-.51.11-.11.25-.29.38-.44.13-.15.17-.25.25-.42.08-.17.04-.32-.02-.45-.06-.13-.56-1.35-.77-1.85-.2-.49-.41-.42-.56-.43h-.48c-.17 0-.44.06-.67.31-.23.25-.88.86-.88 2.1 0 1.24.9 2.44 1.03 2.61.13.17 1.78 2.72 4.31 3.81.6.26 1.07.41 1.44.53.61.19 1.16.17 1.6.1.49-.07 1.47-.6 1.68-1.18.21-.58.21-1.08.15-1.18-.06-.11-.23-.17-.48-.29z"/>
                        </svg>
                        <span class="hidden md:inline">Konsultasi</span>
                    </a>

                </div>
            </div>
        </div>

        {{-- Responsive Horizontal Category Strip for Mobile & Tablet (< xl) --}}
        <div class="xl:hidden border-t border-stone-200 bg-stone-50 overflow-x-auto w-full max-w-full py-2 px-3 sm:px-6">
            <div class="flex items-center space-x-1.5 sm:space-x-2 text-[11px] font-medium tracking-wider uppercase whitespace-nowrap min-w-max">
                <a href="{{ url('/') }}" class="px-2.5 py-1 bg-orange-600 text-white font-bold rounded border border-orange-600 transition-colors">
                    Semua Katalog
                </a>
                <a href="#new-arrivals" class="px-2.5 py-1 bg-white text-stone-800 hover:text-orange-600 hover:bg-stone-100 rounded border border-stone-300 transition-colors">
                    New Arrivals
                </a>
                <a href="#best-seller" class="px-2.5 py-1 bg-white text-stone-800 hover:text-orange-600 hover:bg-stone-100 rounded border border-stone-300 transition-colors">
                    Best Seller
                </a>
                <a href="#tracking" class="px-2.5 py-1 bg-white text-stone-800 hover:text-orange-600 hover:bg-stone-100 rounded border border-stone-300 transition-colors">
                    Lacak Pesanan
                </a>
                <a href="#portofolio" class="px-2.5 py-1 bg-white text-stone-800 hover:text-orange-600 hover:bg-stone-100 rounded border border-stone-300 transition-colors">
                    Portofolio
                </a>
                <a href="#custom-order" class="px-2.5 py-1 bg-white text-stone-800 hover:text-orange-600 hover:bg-stone-100 rounded border border-stone-300 transition-colors">
                    Custom Order
                </a>
                <a href="#promo" class="px-2.5 py-1 bg-white text-orange-600 font-bold hover:bg-orange-50 rounded border border-orange-200 transition-colors">
                    Promo
                </a>
            </div>
        </div>

        {{-- Expandable Search Bar Dropdown / Modal --}}
        <div id="search-modal-container" class="hidden border-t border-stone-200 bg-stone-50 px-4 py-3 sm:px-6 w-full max-w-full transition-all duration-200">
            <div class="max-w-3xl mx-auto">
                <form action="#" method="GET" class="relative flex items-center" onsubmit="event.preventDefault();">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-stone-400">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <input type="text" 
                           id="search-input-modal" 
                           name="q" 
                           placeholder="Cari produk: Sofa Jati, Meja Makan Trembesi, Dipan King, Credenza..." 
                           class="w-full bg-white text-stone-900 placeholder-stone-400 text-xs sm:text-sm pl-10 pr-10 py-2.5 rounded-lg border border-stone-300 focus:outline-none focus:border-orange-600 focus:ring-1 focus:ring-orange-600">
                    <button type="button" 
                            id="search-modal-close-btn"
                            onclick="toggleSearchModal()"
                            class="absolute inset-y-0 right-0 pr-3 flex items-center text-stone-400 hover:text-stone-900">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </form>
                {{-- Quick Search Suggestions --}}
                <div class="mt-2.5 flex flex-wrap items-center gap-1.5 sm:gap-2 text-xs text-stone-500">
                    <span class="text-stone-700 uppercase text-[10px] sm:text-[11px] font-bold tracking-wider">Populer:</span>
                    <a href="#ruang-tamu" class="px-2 py-0.5 bg-white border border-stone-200 hover:border-orange-600 hover:text-orange-600 rounded text-[11px]">Sofa Jati Minimalis</a>
                    <a href="#ruang-makan" class="px-2 py-0.5 bg-white border border-stone-200 hover:border-orange-600 hover:text-orange-600 rounded text-[11px]">Meja Makan Trembesi</a>
                    <a href="#kamar-tidur" class="px-2 py-0.5 bg-white border border-stone-200 hover:border-orange-600 hover:text-orange-600 rounded text-[11px]">Dipan Kayu Solid</a>
                    <a href="#best-seller" class="px-2 py-0.5 bg-white border border-stone-200 hover:border-orange-600 hover:text-orange-600 rounded text-[11px]">Best Seller</a>
                </div>
            </div>
        </div>
    </header>
</div>

{{-- Mobile Sidebar Drawer --}}
<div id="mobile-menu-overlay" 
     onclick="closeMobileMenu()" 
     class="fixed inset-0 z-50 bg-stone-900/70 backdrop-blur-none hidden transition-opacity duration-300"></div>

<aside id="mobile-menu-sidebar" 
       class="fixed inset-y-0 left-0 z-50 w-full max-w-[280px] sm:max-w-xs bg-white border-r border-stone-200 transform -translate-x-full transition-transform duration-300 ease-in-out flex flex-col justify-between overflow-y-auto">
    
    <div>
        {{-- Header of Drawer --}}
        <div class="p-4 sm:p-5 border-b border-stone-200 flex items-center justify-between bg-stone-50">
            <span class="font-black text-base sm:text-lg tracking-[0.2em] text-stone-900 uppercase">
                PANDE OKA<span class="text-orange-600">.</span>
            </span>
            <button type="button" 
                    id="mobile-menu-close"
                    onclick="closeMobileMenu()"
                    class="p-2 text-stone-500 hover:text-stone-900 hover:bg-stone-200 rounded-md transition-colors"
                    aria-label="Tutup Menu">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        {{-- Mobile Search in Drawer --}}
        <div class="p-3 sm:p-4 border-b border-stone-200 bg-white">
            <form action="#" method="GET" class="relative" onsubmit="event.preventDefault();">
                <input type="text" 
                       name="q" 
                       placeholder="Cari koleksi furniture..." 
                       class="w-full bg-stone-50 text-stone-900 placeholder-stone-400 text-xs rounded-md pl-9 pr-3 py-2 border border-stone-200 focus:outline-none focus:border-orange-600">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-stone-400">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
            </form>
        </div>

        {{-- Mobile Contact Section --}}
        <div class="p-3 sm:p-4 border-b border-stone-200 bg-stone-50">
            <a href="https://wa.me/6281234567890" 
               target="_blank"
               class="flex items-center justify-center gap-2 w-full py-2.5 px-4 bg-orange-600 hover:bg-orange-700 text-white text-xs font-bold uppercase tracking-wider rounded-md transition-colors shadow-xs">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0 0 12.04 2zm.01 1.67c4.54 0 8.24 3.7 8.24 8.24 0 2.2-.86 4.28-2.42 5.84a8.18 8.18 0 0 1-5.83 2.41c-1.47 0-2.91-.39-4.18-1.15l-.3-.18-3.11.82.83-3.03-.2-.31a8.18 8.18 0 0 1-1.27-4.4c0-4.54 3.7-8.24 8.24-8.24zm4.52 11.64c-.25-.13-1.47-.72-1.7-.81-.23-.08-.39-.13-.56.13-.17.25-.64.81-.79.97-.14.17-.29.19-.54.06-.25-.13-1.07-.39-2.03-1.25-.75-.67-1.26-1.5-1.41-1.75-.15-.25-.02-.39.11-.51.11-.11.25-.29.38-.44.13-.15.17-.25.25-.42.08-.17.04-.32-.02-.45-.06-.13-.56-1.35-.77-1.85-.2-.49-.41-.42-.56-.43h-.48c-.17 0-.44.06-.67.31-.23.25-.88.86-.88 2.1 0 1.24.9 2.44 1.03 2.61.13.17 1.78 2.72 4.31 3.81.6.26 1.07.41 1.44.53.61.19 1.16.17 1.6.1.49-.07 1.47-.6 1.68-1.18.21-.58.21-1.08.15-1.18-.06-.11-.23-.17-.48-.29z"/>
                </svg>
                <span>Chat WhatsApp Konsultan</span>
            </a>
        </div>

        {{-- Navigation Links List --}}
        <nav class="p-3 sm:p-4 space-y-1 text-xs sm:text-sm font-medium uppercase tracking-wider">
            <a href="{{ route('cart.index') }}" 
               onclick="closeMobileMenu()" 
               class="w-full flex items-center justify-between px-3 py-2.5 text-stone-800 hover:text-orange-600 hover:bg-stone-50 rounded-md transition-colors">
                <span class="flex items-center gap-2">
                    <svg class="w-4 h-4 text-stone-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                    </svg>
                    <span>Keranjang Belanja</span>
                </span>
                <span class="text-[10px] text-white bg-orange-600 font-bold px-2 py-0.5 rounded-full">3 Item</span>
            </a>
            
            <a href="{{ url('/') }}" 
               onclick="closeMobileMenu()" 
               class="flex items-center justify-between px-3 py-2.5 text-white bg-orange-600 font-bold rounded-md transition-colors">
                <span>Katalog Produk</span>
                <span class="text-[10px] text-white font-mono bg-orange-700 px-1.5 py-0.5 rounded">ALL</span>
            </a>
            
            <a href="#new-arrivals" 
               onclick="closeMobileMenu()" 
               class="block px-3 py-2.5 text-stone-800 hover:text-orange-600 hover:bg-stone-50 rounded-md transition-colors">
                New Arrivals
            </a>

            <a href="#best-seller" 
               onclick="closeMobileMenu()" 
               class="flex items-center justify-between px-3 py-2.5 text-stone-800 hover:text-orange-600 hover:bg-stone-50 rounded-md transition-colors">
                <span>Best Seller</span>
                <span class="text-[9px] font-bold px-1.5 py-0.5 bg-orange-600 text-white rounded">HOT</span>
            </a>

            <a href="#portofolio" 
               onclick="closeMobileMenu()" 
               class="block px-3 py-2.5 text-stone-700 hover:text-orange-600 hover:bg-stone-50 rounded-md transition-colors">
                Portofolio Proyek
            </a>

            <a href="#tracking" 
               onclick="closeMobileMenu()" 
               class="block px-3 py-2.5 text-stone-700 hover:text-orange-600 hover:bg-stone-50 rounded-md transition-colors">
                Lacak Pengiriman
            </a>
            
            <a href="#custom-order" 
               onclick="closeMobileMenu()" 
               class="block px-3 py-2.5 text-stone-700 hover:text-orange-600 hover:bg-stone-50 rounded-md transition-colors">
                Custom Desain
            </a>
            
            <a href="#promo" 
               onclick="closeMobileMenu()" 
               class="block px-3 py-2.5 text-orange-600 font-bold hover:bg-orange-50 rounded-md transition-colors">
                Promo Spesial
            </a>
        </nav>
    </div>

    {{-- Bottom info inside mobile menu --}}
    <div class="p-4 sm:p-5 border-t border-stone-200 bg-stone-50">
        <p class="text-[11px] text-stone-500 uppercase tracking-wider mb-1">Showroom &amp; Layanan</p>
        <p class="text-xs text-stone-800 font-medium">order@pandeoka-furniture.com</p>
        <p class="text-xs text-orange-600 font-bold mt-0.5">+62 812-3456-7890</p>
        <div class="mt-3 pt-3 border-t border-stone-200 flex items-center justify-between text-xs text-stone-500">
            <a href="#garansi" class="hover:text-stone-900">Garansi 5 Tahun</a>
            <span>•</span>
            <a href="#showroom" class="hover:text-stone-900">Jepara &amp; Bali</a>
        </div>
    </div>
</aside>
