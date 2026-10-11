<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth overflow-x-hidden">
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
            overflow-x: hidden;
            max-width: 100vw;
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
    </style>
    @stack('styles')
</head>
<body class="bg-white text-stone-900 antialiased min-h-screen flex flex-col selection:bg-orange-600 selection:text-white font-sans overflow-x-hidden">

    {{-- Main Navbar --}}
    @include('layouts.navbar')

    {{-- Main Content --}}
    <main class="flex-grow">
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('layouts.footer')

    {{-- Cart Drawer (Slide-Over) --}}
    @include('layouts.cart-drawer')

    {{-- Toast Notification --}}
    <div id="toast-notification" 
         class="fixed bottom-6 right-6 z-50 transform translate-y-24 opacity-0 transition-all duration-300 pointer-events-none">
        <div class="bg-stone-900 text-white px-5 py-3.5 rounded-xl shadow-2xl flex items-center gap-3 border-l-4 border-orange-600">
            <div class="w-6 h-6 bg-orange-600 rounded-full flex items-center justify-center flex-shrink-0 text-white">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                </svg>
            </div>
            <div>
                <p id="toast-title" class="text-xs font-bold uppercase tracking-wider text-orange-400">Keranjang Diperbarui</p>
                <p id="toast-message" class="text-xs text-stone-200 mt-0.5">Produk berhasil ditambahkan ke keranjang belanja.</p>
            </div>
        </div>
    </div>

    {{-- Interactive Scripts (Mindtrip Inspired) --}}
    <script>
        // Toggle Cart Drawer
        function toggleCartDrawer() {
            const container = document.getElementById('cart-drawer-container');
            const backdrop = document.getElementById('cart-backdrop');
            const panel = document.getElementById('cart-panel');

            if (container.style.display === 'none' || container.style.display === '') {
                container.style.display = 'block';
                document.body.classList.add('overflow-hidden');
                setTimeout(() => {
                    backdrop.classList.remove('opacity-0');
                    backdrop.classList.add('opacity-100');
                    panel.classList.remove('translate-x-full');
                    panel.classList.add('translate-x-0');
                }, 10);
            } else {
                backdrop.classList.remove('opacity-100');
                backdrop.classList.add('opacity-0');
                panel.classList.remove('translate-x-0');
                panel.classList.add('translate-x-full');
                document.body.classList.remove('overflow-hidden');
                setTimeout(() => {
                    container.style.display = 'none';
                }, 300);
            }
        }

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

        // Format Currency IDR
        function formatRupiah(number) {
            return new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                maximumFractionDigits: 0
            }).format(number);
        }

        // Recalculate Cart Total
        function recalculateCart() {
            const rows = document.querySelectorAll('.cart-item-row');
            let total = 0;
            let totalCount = 0;

            rows.forEach(row => {
                const price = parseInt(row.getAttribute('data-price')) || 0;
                const qty = parseInt(row.querySelector('.item-qty').innerText) || 0;
                total += price * qty;
                totalCount += qty;
            });

            // Update DOM Elements
            const badge = document.getElementById('nav-cart-badge');
            const totalText = document.getElementById('nav-cart-total');
            const drawerCount = document.getElementById('cart-drawer-count');
            const drawerSubtotal = document.getElementById('drawer-subtotal');
            const drawerGrandtotal = document.getElementById('drawer-grandtotal');

            if (badge) badge.innerText = totalCount;
            if (drawerCount) drawerCount.innerText = totalCount;
            if (totalText) totalText.innerText = formatRupiah(total);
            if (drawerSubtotal) drawerSubtotal.innerText = formatRupiah(total);
            if (drawerGrandtotal) drawerGrandtotal.innerText = formatRupiah(total);
        }

        // Update Item Quantity
        function updateQty(btn, change) {
            const row = btn.closest('.cart-item-row');
            const qtySpan = row.querySelector('.item-qty');
            let qty = parseInt(qtySpan.innerText) + change;
            if (qty < 1) {
                removeCartItem(btn);
                return;
            }
            qtySpan.innerText = qty;

            const price = parseInt(row.getAttribute('data-price')) || 0;
            row.querySelector('.item-total-price').innerText = formatRupiah(price * qty);

            recalculateCart();
        }

        // Remove Item from Cart
        function removeCartItem(btn) {
            const row = btn.closest('.cart-item-row');
            row.remove();
            recalculateCart();
            showToast('Item Dihapus', 'Produk telah dikeluarkan dari keranjang.');
        }

        // Add Product To Cart (Trigger from product cards)
        function addToCart(title, price, imageSrc) {
            const container = document.getElementById('cart-items-container');
            const numericPrice = parseInt(price) || 0;

            // Check if item already in container
            let existingRow = null;
            container.querySelectorAll('.cart-item-row').forEach(row => {
                if (row.querySelector('h4') && row.querySelector('h4').innerText.trim() === title.trim()) {
                    existingRow = row;
                }
            });

            if (existingRow) {
                const qtySpan = existingRow.querySelector('.item-qty');
                qtySpan.innerText = parseInt(qtySpan.innerText) + 1;
                const currentQty = parseInt(qtySpan.innerText);
                existingRow.querySelector('.item-total-price').innerText = formatRupiah(numericPrice * currentQty);
            } else {
                const newRow = document.createElement('div');
                newRow.className = 'py-4 flex gap-4 cart-item-row';
                newRow.setAttribute('data-price', numericPrice);
                newRow.innerHTML = `
                    <div class="w-20 h-20 bg-stone-100 rounded-lg flex-shrink-0 overflow-hidden border border-stone-200 flex items-center justify-center">
                        <img src="${imageSrc}" alt="${title}" class="w-full h-full object-cover">
                    </div>
                    <div class="flex-1 flex flex-col justify-between">
                        <div>
                            <div class="flex justify-between items-start">
                                <h4 class="text-xs font-bold text-stone-900 leading-snug">${title}</h4>
                                <button type="button" onclick="removeCartItem(this)" class="text-stone-400 hover:text-red-600 transition-colors ml-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                </button>
                            </div>
                            <span class="text-[11px] text-stone-500">Finishing: Kayu Solid Original</span>
                        </div>
                        <div class="flex items-center justify-between mt-2">
                            <div class="flex items-center border border-stone-200 rounded-md">
                                <button type="button" onclick="updateQty(this, -1)" class="px-2.5 py-0.5 text-stone-600 hover:bg-stone-100 text-xs font-bold">-</button>
                                <span class="px-3 py-0.5 text-xs font-bold text-stone-900 item-qty">1</span>
                                <button type="button" onclick="updateQty(this, 1)" class="px-2.5 py-0.5 text-stone-600 hover:bg-stone-100 text-xs font-bold">+</button>
                            </div>
                            <span class="text-xs font-bold text-orange-600 item-total-price">${formatRupiah(numericPrice)}</span>
                        </div>
                    </div>
                `;
                container.prepend(newRow);
            }

            recalculateCart();
            showToast('Berhasil Ditambahkan', `${title} telah dimasukkan ke keranjang.`);
            toggleCartDrawer();
        }

        // Show Toast Notification
        function showToast(title, message) {
            const toast = document.getElementById('toast-notification');
            document.getElementById('toast-title').innerText = title;
            document.getElementById('toast-message').innerText = message;

            toast.classList.remove('translate-y-24', 'opacity-0');
            toast.classList.add('translate-y-0', 'opacity-100');

            setTimeout(() => {
                toast.classList.remove('translate-y-0', 'opacity-100');
                toast.classList.add('translate-y-24', 'opacity-0');
            }, 3000);
        }

        // Close on ESC
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                const container = document.getElementById('cart-drawer-container');
                if (container && container.style.display === 'block') {
                    toggleCartDrawer();
                }
            }
        });
    </script>
    @stack('scripts')
</body>
</html>
