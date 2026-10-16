<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Pande Oka Furniture - Jual Furniture Kayu Solid Jepara & Bali')</title>
    <meta name="description" content="@yield('meta_description', 'Toko furniture kayu solid minimalis dan modern berkualitas premium. Dibuat langsung oleh pengrajin Jepara & Bali dengan garansi 5 tahun.')">

    <!-- Fonts (Clean Sans-Serif Instrument Sans) -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700,800&display=swap" rel="stylesheet" />

    <!-- Scripts & Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* Strict No Gradient Enforcement & Smooth Rendering */
        html, body {
            overflow-x: clip;
            max-width: 100%;
        }
        body {
            font-family: 'Instrument Sans', sans-serif;
            background-color: #ffffff;
            color: #1c1917;
            -webkit-font-smoothing: antialiased;
        }

        /* Solid custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }
        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #ea580c;
        }

        /* Dynamic header height tokens for 100svh viewport calculations */
        :root {
            --header-height: 98px;
        }
        @media (min-width: 640px) {
            :root {
                --header-height: 116px;
            }
        }
    </style>
    @stack('styles')
</head>
<body class="bg-white text-stone-900 antialiased min-h-screen flex flex-col selection:bg-orange-600 selection:text-white font-sans">

    {{-- Sleek Top Progress Bar (Luxury Brand Style) --}}
    <div id="page-loader-progress" class="fixed top-0 left-0 right-0 z-[100] h-[2.5px] bg-transparent pointer-events-none">
        <div id="page-loader-bar" class="h-full bg-orange-600 w-0 transition-all duration-300 ease-out shadow-[0_0_10px_rgba(234,88,12,0.8)]"></div>
    </div>

    {{-- Elegant Minimalist Page Transition Backdrop --}}
    <div id="page-transition-curtain" 
         class="fixed inset-0 z-[99] bg-white/80 backdrop-blur-[2px] flex flex-col items-center justify-center opacity-0 pointer-events-none transition-opacity duration-200 ease-out">
        <div class="flex flex-col items-center select-none transform transition-transform duration-200">
            <span class="text-xs font-black tracking-[0.3em] text-stone-900 uppercase">
                PANDE OKA<span class="text-orange-600">.</span>
            </span>
            <div class="w-12 h-[2px] bg-stone-200 rounded-full mt-2.5 overflow-hidden">
                <div class="w-1/2 h-full bg-orange-600 rounded-full animate-progress-slide"></div>
            </div>
        </div>
    </div>

    {{-- Main Navbar (Hidden on Auth Pages) --}}
    @unless(request()->routeIs(['login', 'register']))
        @include('partials.navbar')
    @endunless

    {{-- Main Content --}}
    <main class="flex-grow flex flex-col">
        @yield('content')
    </main>

    {{-- Footer (Hidden on Auth Pages) --}}
    @unless(request()->routeIs(['login', 'register']))
        @include('partials.footer')
    @endunless

    {{-- Shopee-Style Variation & Quantity Selection Modal (Bottom Sheet on Mobile, Dialog on Desktop) --}}
    <div id="shopee-variation-modal" 
         class="fixed inset-0 z-50 overflow-y-auto hidden" 
         aria-labelledby="modal-title" 
         role="dialog" 
         aria-modal="true">
        {{-- Backdrop --}}
        <div id="shopee-modal-backdrop" 
             onclick="closeShopeeVariationModal()" 
             class="fixed inset-0 bg-stone-900/60 backdrop-blur-xs transition-opacity duration-300 opacity-0"></div>

        <div class="min-h-full flex items-end sm:items-center justify-center p-0 sm:p-4 text-center sm:text-left">
            <div id="shopee-modal-panel" 
                 class="relative bg-white w-full sm:max-w-md md:max-w-lg rounded-t-2xl sm:rounded-2xl text-left overflow-hidden shadow-2xl transform transition-all duration-300 translate-y-full sm:translate-y-4 opacity-0 sm:scale-95 flex flex-col max-h-[85vh] sm:max-h-[90vh]">
                
                {{-- Header / Product Summary (Shopee Style) --}}
                <div class="p-4 sm:p-5 border-b border-stone-200 flex items-start gap-3.5 bg-stone-50/60 relative">
                    <div class="w-20 h-20 sm:w-24 sm:h-24 bg-stone-100 rounded-xl overflow-hidden border border-stone-200 shrink-0 shadow-xs">
                        <img id="modal-product-image" 
                             src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100' height='100'%3E%3Crect width='100' height='100' fill='%23f5f5f4'/%3E%3C/svg%3E" 
                             alt="Produk" 
                             class="w-full h-full object-cover">
                    </div>
                    <div class="flex-1 min-w-0 pr-7">
                        <h3 id="modal-product-name" class="text-xs sm:text-sm font-bold text-stone-900 line-clamp-1 mb-1">Produk Furniture</h3>
                        <div class="flex items-baseline gap-2 flex-wrap">
                            <span id="modal-product-price" class="text-lg sm:text-2xl font-black text-orange-600 leading-tight">
                                Rp 0
                            </span>
                            <span id="modal-product-original-price" class="text-xs text-stone-400 line-through hidden">
                            </span>
                        </div>
                        <p class="text-xs text-stone-500 mt-1 font-medium">
                            Stok: <span id="modal-product-stock" class="font-bold text-stone-800">0</span> unit
                        </p>
                        <p class="text-xs text-stone-600 mt-1 truncate">
                            Pilihan: <span id="modal-selected-summary" class="font-bold text-orange-700">-</span>
                        </p>
                    </div>

                    {{-- Close Button --}}
                    <button type="button" 
                            onclick="closeShopeeVariationModal()" 
                            class="absolute top-3.5 right-3.5 p-1.5 text-stone-400 hover:text-stone-700 hover:bg-stone-200 rounded-full transition-colors focus:outline-none"
                            aria-label="Tutup Pilihan">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>

                {{-- Scrollable Content: Variations, Sizes, Quantity --}}
                <div class="p-4 sm:p-5 overflow-y-auto space-y-4 sm:space-y-5 flex-1 divide-y divide-stone-100">
                    
                    {{-- 1. Pilihan Warna / Finishing --}}
                    <div class="space-y-2.5">
                        <h4 class="text-xs font-bold text-stone-900 uppercase tracking-wider flex items-center justify-between">
                            <span>Warna &amp; Finishing Kayu</span>
                            <span id="modal-active-finish-label" class="text-orange-600 font-semibold normal-case text-xs"></span>
                        </h4>
                        <div class="flex flex-wrap gap-2" id="modal-finish-options">
                            {{-- Dynamic Finishing Pills --}}
                        </div>
                    </div>

                    {{-- 2. Pilihan Ukuran / Dimensi --}}
                    <div class="pt-4 space-y-2.5">
                        <h4 class="text-xs font-bold text-stone-900 uppercase tracking-wider flex items-center justify-between">
                            <span>Ukuran &amp; Dimensi</span>
                            <span id="modal-active-size-label" class="text-orange-600 font-semibold normal-case text-xs"></span>
                        </h4>
                        <div class="flex flex-wrap gap-2" id="modal-size-options">
                            {{-- Dynamic Size Pills --}}
                        </div>
                    </div>

                    {{-- 3. Jumlah / Kuantitas --}}
                    <div class="pt-4 flex items-center justify-between">
                        <div>
                            <h4 class="text-xs font-bold text-stone-900 uppercase tracking-wider">Jumlah</h4>
                            <p class="text-[11px] text-stone-500 mt-0.5">Sesuai batas ketersediaan stok</p>
                        </div>
                        <div class="flex items-center border border-stone-300 rounded-lg overflow-hidden bg-white shadow-xs">
                            <button type="button" 
                                    onclick="changeModalQty(-1)" 
                                    class="w-9 h-9 bg-white hover:bg-stone-100 text-stone-700 font-bold flex items-center justify-center transition-colors">
                                -
                            </button>
                            <input type="number" 
                                   id="modal-quantity-input" 
                                   value="1" 
                                   min="1" 
                                   max="99" 
                                   readonly
                                   class="w-12 h-9 text-center text-xs font-bold text-stone-900 border-x border-stone-300 focus:outline-none [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none">
                            <button type="button" 
                                    onclick="changeModalQty(1)" 
                                    class="w-9 h-9 bg-white hover:bg-stone-100 text-stone-700 font-bold flex items-center justify-center transition-colors">
                                +
                            </button>
                        </div>
                    </div>

                </div>

                {{-- Footer Action Button (Shopee Style Big Full Width Orange Button) --}}
                <div class="p-4 sm:p-5 border-t border-stone-200 bg-white">
                    <button type="button" 
                            id="modal-confirm-btn"
                            onclick="confirmShopeeVariationAdd()" 
                            class="w-full py-3.5 px-6 bg-orange-600 hover:bg-orange-700 active:scale-[0.99] text-white font-black text-xs sm:text-sm uppercase tracking-wider rounded-xl transition-all shadow-md flex items-center justify-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                        </svg>
                        <span>Masukkan Keranjang</span>
                    </button>
                </div>

            </div>
        </div>
    </div>

    {{-- Toast Notification (Non-intrusive, No Popups) --}}
    <div id="toast-notification" 
         class="fixed bottom-6 right-6 z-50 transform translate-y-28 opacity-0 transition-all duration-300 pointer-events-none max-w-md">
        <div class="bg-stone-900 text-white pl-4 pr-3 py-3 rounded-xl shadow-2xl flex items-center gap-3 border border-stone-800 border-l-4 border-l-orange-600 pointer-events-auto">
            <div class="w-8 h-8 bg-orange-600 text-white rounded-lg flex items-center justify-center shrink-0 shadow-xs">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                </svg>
            </div>
            <div class="min-w-0 flex-1">
                <p id="toast-title" class="text-xs font-black uppercase tracking-wider text-orange-400 leading-tight">Berhasil Ditambahkan</p>
                <p id="toast-message" class="text-xs text-stone-300 mt-0.5 line-clamp-1">Produk masuk ke keranjang belanja.</p>
            </div>
            <a href="{{ route('cart.index') }}" 
               class="shrink-0 px-3 py-1.5 bg-orange-600 hover:bg-orange-700 text-white text-xs font-bold uppercase tracking-wider rounded-md transition-colors flex items-center gap-1 shadow-xs">
                <span>Keranjang</span>
                <span>&rarr;</span>
            </a>
            <button type="button" 
                    onclick="hideToast()" 
                    class="p-1 text-stone-400 hover:text-white rounded transition-colors focus:outline-none"
                    aria-label="Tutup Notifikasi">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
    </div>

    {{-- Interactive Scripts (Mindtrip Inspired) --}}
    <script>
        // Dynamic Header Height calculation for 100svh Hero
        function syncHeaderHeight() {
            const header = document.getElementById('site-header-wrapper');
            if (header) {
                document.documentElement.style.setProperty('--header-height', header.offsetHeight + 'px');
            }
        }
        window.addEventListener('resize', syncHeaderHeight);
        window.addEventListener('load', syncHeaderHeight);
        document.addEventListener('DOMContentLoaded', syncHeaderHeight);
        syncHeaderHeight();

        // Mobile Menu Drawer Handlers (Mindtrip Style)
        function openMobileMenu() {
            const sidebar = document.getElementById('mobile-menu-sidebar');
            const overlay = document.getElementById('mobile-menu-overlay');
            if (!sidebar || !overlay) return;
            overlay.classList.remove('hidden');
            document.body.classList.add('overflow-hidden');
            setTimeout(() => {
                sidebar.classList.remove('-translate-x-full');
                sidebar.classList.add('translate-x-0');
            }, 10);
        }

        function closeMobileMenu() {
            const sidebar = document.getElementById('mobile-menu-sidebar');
            const overlay = document.getElementById('mobile-menu-overlay');
            if (!sidebar || !overlay) return;
            sidebar.classList.remove('translate-x-0');
            sidebar.classList.add('-translate-x-full');
            setTimeout(() => {
                overlay.classList.add('hidden');
                document.body.classList.remove('overflow-hidden');
            }, 250);
        }

        function toggleMobileMenu() {
            const sidebar = document.getElementById('mobile-menu-sidebar');
            if (sidebar && sidebar.classList.contains('translate-x-0')) {
                closeMobileMenu();
            } else {
                openMobileMenu();
            }
        }

        // Search Modal Toggle (Mindtrip Style)
        function toggleSearchModal() {
            const modal = document.getElementById('search-modal-container');
            const input = document.getElementById('search-input-modal');
            if (!modal) return;
            if (modal.classList.contains('hidden')) {
                modal.classList.remove('hidden');
                if (input) setTimeout(() => input.focus(), 60);
            } else {
                modal.classList.add('hidden');
            }
        }

        // User Profile Dropdown Toggle
        function toggleUserDropdown() {
            const dropdown = document.getElementById('user-dropdown-menu');
            if (!dropdown) return;
            dropdown.classList.toggle('hidden');
        }

        document.addEventListener('click', function(event) {
            const container = document.getElementById('user-menu-container');
            const dropdown = document.getElementById('user-dropdown-menu');
            if (container && dropdown && !container.contains(event.target)) {
                dropdown.classList.add('hidden');
            }
        });

        // Format Currency IDR
        function formatRupiah(number) {
            return new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                maximumFractionDigits: 0
            }).format(number);
        }

        // Get CSRF Token Helper
        function getCsrfToken() {
            return document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';
        }

        // Global Cart Badges Updater
        function updateCartBadges(count) {
            const numericCount = parseInt(count) || 0;
            const desktopBadge = document.getElementById('nav-cart-badge');
            const mobileBadge = document.getElementById('nav-cart-mobile-badge');

            if (desktopBadge) {
                desktopBadge.innerText = numericCount;
                if (numericCount > 0) {
                    desktopBadge.classList.remove('hidden');
                } else {
                    desktopBadge.classList.add('hidden');
                }
            }

            if (mobileBadge) {
                mobileBadge.innerText = `${numericCount} Item`;
                if (numericCount > 0) {
                    mobileBadge.classList.remove('hidden');
                } else {
                    mobileBadge.classList.add('hidden');
                }
            }

            const mobileBottomBadge = document.getElementById('mobile-bottom-cart-badge');
            if (mobileBottomBadge) {
                mobileBottomBadge.innerText = numericCount;
                if (numericCount > 0) {
                    mobileBottomBadge.classList.remove('hidden');
                } else {
                    mobileBottomBadge.classList.add('hidden');
                }
            }
        }

        // Add Product To Cart via Real Database CRUD (Notif Only, No Popups)
        async function addToCart(productId, quantity = 1, variation = null) {
            try {
                const response = await fetch('{{ route("cart.add") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': getCsrfToken()
                    },
                    body: JSON.stringify({
                        product_id: parseInt(productId),
                        quantity: parseInt(quantity) || 1,
                        variation: variation
                    })
                });

                const data = await response.json();
                if (data.success) {
                    updateCartBadges(data.count);
                    showToast('Berhasil Ditambahkan', data.message || 'Produk telah dimasukkan ke keranjang belanja.');
                } else {
                    alert(data.message || 'Gagal menambahkan produk ke keranjang.');
                }
            } catch (err) {
                console.error('Error adding to cart:', err);
                alert('Terjadi kesalahan saat menambahkan produk ke keranjang.');
            }
        }

        // Update Cart Quantity via AJAX (Used on /cart page)
        async function updateCartQtyAJAX(cartItemId, delta) {
            const qtyInput = document.getElementById(`item-qty-input-${cartItemId}`);
            let currentQty = qtyInput ? (parseInt(qtyInput.value) || 1) : 1;
            let newQty = currentQty + delta;

            if (newQty < 1) {
                if (confirm('Apakah Anda yakin ingin menghapus produk ini dari keranjang?')) {
                    await deleteCartItemAJAX(cartItemId);
                }
                return;
            }

            try {
                const response = await fetch(`/cart/${cartItemId}`, {
                    method: 'PATCH',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': getCsrfToken()
                    },
                    body: JSON.stringify({
                        quantity: newQty
                    })
                });

                const data = await response.json();
                if (data.success) {
                    updateCartBadges(data.count);
                    
                    if (qtyInput) {
                        qtyInput.value = newQty;
                    }

                    if (typeof recalculateShopeeCart === 'function') {
                        recalculateShopeeCart();
                    }
                }
            } catch (err) {
                console.error('Error updating cart quantity:', err);
            }
        }

        // Delete Cart Item via AJAX (Used on /cart page)
        async function deleteCartItemAJAX(cartItemId) {
            try {
                const response = await fetch(`/cart/${cartItemId}`, {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': getCsrfToken()
                    }
                });

                const data = await response.json();
                if (data.success) {
                    updateCartBadges(data.count);
                    showToast('Item Dihapus', data.message || 'Produk telah dikeluarkan dari keranjang belanja.');

                    const cartRow = document.getElementById(`cart-row-${cartItemId}`);
                    if (cartRow) {
                        cartRow.remove();
                    }

                    if (typeof recalculateShopeeCart === 'function') {
                        recalculateShopeeCart();
                    }
                }
            } catch (err) {
                console.error('Error deleting cart item:', err);
            }
        }

        // Show Toast Notification (Non-intrusive)
        let toastTimeout = null;
        function showToast(title, message) {
            const toast = document.getElementById('toast-notification');
            if (!toast) return;

            document.getElementById('toast-title').innerText = title;
            document.getElementById('toast-message').innerText = message;

            clearTimeout(toastTimeout);
            toast.classList.remove('translate-y-28', 'opacity-0');
            toast.classList.add('translate-y-0', 'opacity-100');

            toastTimeout = setTimeout(() => {
                hideToast();
            }, 3500);
        }

        function hideToast() {
            const toast = document.getElementById('toast-notification');
            if (!toast) return;
            toast.classList.remove('translate-y-0', 'opacity-100');
            toast.classList.add('translate-y-28', 'opacity-0');
        }

        // ==========================================
        // Shopee-Style Variation & Size Modal Logic
        // ==========================================
        let currentModalProduct = null;
        let selectedModalFinish = '';
        let selectedModalSize = '';
        let currentModalQty = 1;

        // Trigger Quick Add from button data attributes or object
        async function triggerShopeeQuickAdd(btnOrData) {
            if (btnOrData instanceof HTMLElement) {
                const ds = btnOrData.dataset;
                openShopeeVariationModal({
                    id: parseInt(ds.id),
                    name: ds.name || 'Produk Furniture Solid',
                    price: parseInt(ds.price) || 0,
                    formatted_price: ds.formattedPrice || formatRupiah(parseInt(ds.price) || 0),
                    original_price: ds.originalPrice ? parseInt(ds.originalPrice) : null,
                    formatted_original_price: ds.formattedOriginalPrice || '',
                    image: ds.image || '',
                    stock: parseInt(ds.stock) || 10,
                    finish: ds.finish || 'Natural Satin Doff',
                    dimensions: ds.dimensions || 'Standard (P x L x T)'
                });
            } else if (typeof btnOrData === 'object' && btnOrData !== null) {
                openShopeeVariationModal(btnOrData);
            } else if (typeof btnOrData === 'number' || typeof btnOrData === 'string') {
                try {
                    const res = await fetch(`/products/${btnOrData}/quick-view`);
                    const data = await res.json();
                    openShopeeVariationModal(data);
                } catch (e) {
                    console.error('Error fetching quick-view product:', e);
                }
            }
        }

        // Open Modal and populate options
        function openShopeeVariationModal(product) {
            currentModalProduct = product;
            currentModalQty = 1;

            // Product summary header
            const nameElem = document.getElementById('modal-product-name');
            if (nameElem) {
                nameElem.innerText = product.name || 'Produk Furniture Solid';
            }

            const imgElem = document.getElementById('modal-product-image');
            if (imgElem) {
                imgElem.src = product.image || '';
                imgElem.alt = product.name || 'Produk';
            }

            const priceElem = document.getElementById('modal-product-price');
            if (priceElem) {
                priceElem.innerText = product.formatted_price || formatRupiah(product.price);
            }

            const origPriceElem = document.getElementById('modal-product-original-price');
            if (origPriceElem) {
                if (product.original_price && product.original_price > product.price) {
                    origPriceElem.innerText = product.formatted_original_price || formatRupiah(product.original_price);
                    origPriceElem.classList.remove('hidden');
                } else {
                    origPriceElem.classList.add('hidden');
                }
            }

            const stock = parseInt(product.stock) || 10;
            const stockElem = document.getElementById('modal-product-stock');
            if (stockElem) stockElem.innerText = stock;

            const qtyInput = document.getElementById('modal-quantity-input');
            if (qtyInput) {
                qtyInput.max = stock;
                qtyInput.value = 1;
            }

            // 1. Build Finishing Choices
            const defaultFinishes = [
                product.finish || 'Natural Satin Doff',
                'Salak Brown Doff',
                'Bleached Light Teak',
                'Walnut Finish Doff'
            ];
            const uniqueFinishes = [...new Set(defaultFinishes)].filter(Boolean);
            selectedModalFinish = uniqueFinishes[0];

            const finishContainer = document.getElementById('modal-finish-options');
            if (finishContainer) {
                finishContainer.innerHTML = '';
                uniqueFinishes.forEach(finish => {
                    const btn = document.createElement('button');
                    btn.type = 'button';
                    btn.className = `variation-pill px-3 py-2 rounded-lg text-xs font-bold transition-all border ${
                        finish === selectedModalFinish 
                            ? 'border-orange-600 bg-orange-50 text-orange-700 shadow-xs ring-1 ring-orange-600' 
                            : 'border-stone-300 hover:border-stone-400 bg-white text-stone-700'
                    }`;
                    btn.innerText = finish;
                    btn.onclick = () => selectModalFinish(finish, btn);
                    finishContainer.appendChild(btn);
                });
            }

            // 2. Build Size / Dimension Choices
            const baseDim = product.dimensions && product.dimensions.trim() !== '' 
                ? product.dimensions 
                : 'Standard 200 x 85 cm';
            const sizeOptions = [
                baseDim,
                'Compact (-15% Ruang)',
                'Large (+20% Custom)'
            ];
            selectedModalSize = sizeOptions[0];

            const sizeContainer = document.getElementById('modal-size-options');
            if (sizeContainer) {
                sizeContainer.innerHTML = '';
                sizeOptions.forEach(size => {
                    const btn = document.createElement('button');
                    btn.type = 'button';
                    btn.className = `size-pill px-3 py-2 rounded-lg text-xs font-bold transition-all border ${
                        size === selectedModalSize 
                            ? 'border-orange-600 bg-orange-50 text-orange-700 shadow-xs ring-1 ring-orange-600' 
                            : 'border-stone-300 hover:border-stone-400 bg-white text-stone-700'
                    }`;
                    btn.innerText = size;
                    btn.onclick = () => selectModalSize(size, btn);
                    sizeContainer.appendChild(btn);
                });
            }

            updateModalSummary();

            // Animate In Modal
            const modal = document.getElementById('shopee-variation-modal');
            const backdrop = document.getElementById('shopee-modal-backdrop');
            const panel = document.getElementById('shopee-modal-panel');

            if (!modal || !backdrop || !panel) return;

            modal.classList.remove('hidden');
            document.body.classList.add('overflow-hidden');

            setTimeout(() => {
                backdrop.classList.remove('opacity-0');
                backdrop.classList.add('opacity-100');
                panel.classList.remove('translate-y-full', 'sm:translate-y-4', 'opacity-0', 'sm:scale-95');
                panel.classList.add('translate-y-0', 'opacity-100', 'sm:scale-100');
            }, 10);
        }

        // Close Modal
        function closeShopeeVariationModal() {
            const modal = document.getElementById('shopee-variation-modal');
            const backdrop = document.getElementById('shopee-modal-backdrop');
            const panel = document.getElementById('shopee-modal-panel');

            if (!modal || modal.classList.contains('hidden')) return;

            backdrop.classList.remove('opacity-100');
            backdrop.classList.add('opacity-0');
            panel.classList.remove('translate-y-0', 'opacity-100', 'sm:scale-100');
            panel.classList.add('translate-y-full', 'sm:translate-y-4', 'opacity-0', 'sm:scale-95');

            setTimeout(() => {
                modal.classList.add('hidden');
                document.body.classList.remove('overflow-hidden');
            }, 260);
        }

        // Select Finishing
        function selectModalFinish(finish, btn) {
            selectedModalFinish = finish;
            document.querySelectorAll('#modal-finish-options button').forEach(b => {
                b.className = 'variation-pill px-3 py-2 rounded-lg text-xs font-bold transition-all border border-stone-300 hover:border-stone-400 bg-white text-stone-700';
            });
            btn.className = 'variation-pill px-3 py-2 rounded-lg text-xs font-bold transition-all border border-orange-600 bg-orange-50 text-orange-700 shadow-xs ring-1 ring-orange-600';
            updateModalSummary();
        }

        // Select Size
        function selectModalSize(size, btn) {
            selectedModalSize = size;
            document.querySelectorAll('#modal-size-options button').forEach(b => {
                b.className = 'size-pill px-3 py-2 rounded-lg text-xs font-bold transition-all border border-stone-300 hover:border-stone-400 bg-white text-stone-700';
            });
            btn.className = 'size-pill px-3 py-2 rounded-lg text-xs font-bold transition-all border border-orange-600 bg-orange-50 text-orange-700 shadow-xs ring-1 ring-orange-600';
            updateModalSummary();
        }

        // Change Quantity in Modal
        function changeModalQty(delta) {
            const input = document.getElementById('modal-quantity-input');
            if (!input) return;
            let qty = parseInt(input.value) || 1;
            const max = parseInt(input.max) || 99;
            qty += delta;
            if (qty < 1) qty = 1;
            if (qty > max) qty = max;
            input.value = qty;
            currentModalQty = qty;
        }

        // Update Modal Summary Text
        function updateModalSummary() {
            const summaryElem = document.getElementById('modal-selected-summary');
            const finishLabel = document.getElementById('modal-active-finish-label');
            const sizeLabel = document.getElementById('modal-active-size-label');

            if (summaryElem) {
                summaryElem.innerText = `${selectedModalFinish}, ${selectedModalSize}`;
            }
            if (finishLabel) {
                finishLabel.innerText = selectedModalFinish;
            }
            if (sizeLabel) {
                sizeLabel.innerText = selectedModalSize;
            }
        }

        // Confirm Add To Cart with selected Variation & Quantity
        async function confirmShopeeVariationAdd() {
            if (!currentModalProduct) return;

            const variation = `${selectedModalFinish} • ${selectedModalSize}`;
            const qty = currentModalQty;
            const productId = currentModalProduct.id;

            closeShopeeVariationModal();

            await addToCart(productId, qty, variation);
        }

        // Close on ESC Key
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                const modal = document.getElementById('shopee-variation-modal');
                if (modal && !modal.classList.contains('hidden')) {
                    closeShopeeVariationModal();
                }
            }
        });

        // Elegant Page Transition Navigation Handler
        const pageLoaderBar = document.getElementById('page-loader-bar');
        const pageCurtain = document.getElementById('page-transition-curtain');
        let loaderTimer = null;
        let progressInterval = null;

        function startPageTransition() {
            if (!pageLoaderBar || !pageCurtain) return;

            clearTimeout(loaderTimer);
            clearInterval(progressInterval);

            // Animate top progress bar
            let progress = 25;
            pageLoaderBar.style.width = progress + '%';
            pageLoaderBar.style.transition = 'width 250ms ease-out';

            progressInterval = setInterval(() => {
                if (progress < 85) {
                    progress += Math.floor(Math.random() * 12) + 5;
                    pageLoaderBar.style.width = Math.min(progress, 85) + '%';
                }
            }, 120);

            // Show subtle curtain after 60ms (avoids flicker for instant loads)
            loaderTimer = setTimeout(() => {
                pageCurtain.classList.remove('opacity-0', 'pointer-events-none');
                pageCurtain.classList.add('opacity-100', 'pointer-events-auto');
            }, 60);

            // Fail-safe: automatically dismiss if navigation takes too long or is cancelled
            setTimeout(() => {
                endPageTransition();
            }, 6000);
        }

        function endPageTransition() {
            if (!pageLoaderBar || !pageCurtain) return;
            clearTimeout(loaderTimer);
            clearInterval(progressInterval);

            // Finish progress bar to 100%
            pageLoaderBar.style.width = '100%';
            
            setTimeout(() => {
                pageCurtain.classList.remove('opacity-100', 'pointer-events-auto');
                pageCurtain.classList.add('opacity-0', 'pointer-events-none');
                
                setTimeout(() => {
                    pageLoaderBar.style.transition = 'none';
                    pageLoaderBar.style.width = '0%';
                }, 200);
            }, 150);
        }

        // Hide transition on initial page show and back-forward cache restore
        window.addEventListener('pageshow', function(event) {
            endPageTransition();
        });

        // Intercept internal link clicks
        document.addEventListener('click', function(e) {
            const anchor = e.target.closest('a');
            if (!anchor) return;

            const href = anchor.getAttribute('href');
            if (!href) return;

            // Ignore external, target blank, new tab modifier keys, hash anchors, tel/mailto/js
            if (
                anchor.target === '_blank' ||
                e.ctrlKey || e.metaKey || e.shiftKey || e.altKey ||
                href.startsWith('#') ||
                href.startsWith('javascript:') ||
                href.startsWith('mailto:') ||
                href.startsWith('tel:') ||
                anchor.hasAttribute('download')
            ) {
                return;
            }

            try {
                const targetUrl = new URL(anchor.href, window.location.origin);
                // Same origin and different page
                if (targetUrl.origin === window.location.origin) {
                    const isSamePageHash = (targetUrl.pathname === window.location.pathname && targetUrl.search === window.location.search && targetUrl.hash);
                    if (!isSamePageHash) {
                        startPageTransition();
                    }
                }
            } catch (err) {
                // Ignore invalid URLs
            }
        });
    </script>
    @stack('scripts')
</body>
</html>
