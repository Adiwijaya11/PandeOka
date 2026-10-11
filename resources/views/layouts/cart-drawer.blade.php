{{-- Off-Canvas Cart Drawer (Slide Over) --}}
<div id="cart-drawer-container" class="fixed inset-0 z-50 overflow-hidden" style="display: none;" aria-labelledby="slide-over-title" role="dialog" aria-modal="true">
    {{-- Backdrop --}}
    <div id="cart-backdrop" 
         onclick="toggleCartDrawer()" 
         class="fixed inset-0 bg-stone-900/60 backdrop-blur-none transition-opacity duration-300 opacity-0"></div>

    <div class="fixed inset-y-0 right-0 max-w-full flex pl-10">
        <div id="cart-panel" 
             class="w-screen max-w-md bg-white shadow-2xl flex flex-col transform translate-x-full transition-transform duration-300 ease-in-out">
            
            {{-- Header --}}
            <div class="p-5 border-b border-stone-200 flex items-center justify-between bg-stone-50">
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                    </svg>
                    <h2 class="text-base font-bold text-stone-900 tracking-wide uppercase">
                        Keranjang Belanja (<span id="cart-drawer-count">2</span>)
                    </h2>
                </div>
                <button type="button" 
                        onclick="toggleCartDrawer()" 
                        class="p-2 text-stone-400 hover:text-stone-900 hover:bg-stone-200 rounded-full transition-colors focus:outline-none">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            {{-- Free Shipping Bar Indicator (Solid, No Gradient) --}}
            <div class="bg-orange-50 px-5 py-3 border-b border-orange-100">
                <div class="flex items-center justify-between text-xs mb-1.5 font-semibold text-stone-800">
                    <span class="flex items-center gap-1.5 text-orange-700">
                        <span>🚚</span> Gratis Ongkir Seluruh Jawa-Bali!
                    </span>
                    <span class="text-orange-700 font-bold">100% Tercapai</span>
                </div>
                <div class="w-full bg-orange-200 rounded-full h-2">
                    <div class="bg-orange-600 h-2 rounded-full w-full"></div>
                </div>
            </div>

            {{-- Cart Items List --}}
            <div id="cart-items-container" class="flex-1 overflow-y-auto p-5 divide-y divide-stone-100">
                
                {{-- Item 1 --}}
                <div class="py-4 flex gap-4 cart-item-row" data-id="1" data-price="4250000">
                    <div class="w-20 h-20 bg-stone-100 rounded-lg flex-shrink-0 overflow-hidden border border-stone-200 flex items-center justify-center">
                        <img src="https://images.unsplash.com/photo-1555041469-a586c61ea9bc?auto=format&fit=crop&w=300&q=80" 
                             alt="Sofa Minimalis Kayu Jati" 
                             class="w-full h-full object-cover">
                    </div>
                    <div class="flex-1 flex flex-col justify-between">
                        <div>
                            <div class="flex justify-between items-start">
                                <h4 class="text-xs font-bold text-stone-900 leading-snug">
                                    Sofa 3-Seater Minimalis Kayu Jati Salak Brown
                                </h4>
                                <button type="button" onclick="removeCartItem(this)" class="text-stone-400 hover:text-red-600 transition-colors ml-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                </button>
                            </div>
                            <span class="text-[11px] text-stone-500">Finishing: Natural Teak, Kain: Linen Grey</span>
                        </div>

                        <div class="flex items-center justify-between mt-2">
                            <div class="flex items-center border border-stone-200 rounded-md">
                                <button type="button" onclick="updateQty(this, -1)" class="px-2.5 py-0.5 text-stone-600 hover:bg-stone-100 text-xs font-bold">-</button>
                                <span class="px-3 py-0.5 text-xs font-bold text-stone-900 item-qty">1</span>
                                <button type="button" onclick="updateQty(this, 1)" class="px-2.5 py-0.5 text-stone-600 hover:bg-stone-100 text-xs font-bold">+</button>
                            </div>
                            <span class="text-xs font-bold text-orange-600 item-total-price">Rp 4.250.000</span>
                        </div>
                    </div>
                </div>

                {{-- Item 2 --}}
                <div class="py-4 flex gap-4 cart-item-row" data-id="2" data-price="2600000">
                    <div class="w-20 h-20 bg-stone-100 rounded-lg flex-shrink-0 overflow-hidden border border-stone-200 flex items-center justify-center">
                        <img src="https://images.unsplash.com/photo-1533090481720-856c6e3c1fdc?auto=format&fit=crop&w=300&q=80" 
                             alt="Meja Kopi Bundar Solid" 
                             class="w-full h-full object-cover">
                    </div>
                    <div class="flex-1 flex flex-col justify-between">
                        <div>
                            <div class="flex justify-between items-start">
                                <h4 class="text-xs font-bold text-stone-900 leading-snug">
                                    Coffee Table Bundar Kayu Sungkai Diameter 80cm
                                </h4>
                                <button type="button" onclick="removeCartItem(this)" class="text-stone-400 hover:text-red-600 transition-colors ml-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                </button>
                            </div>
                            <span class="text-[11px] text-stone-500">Warna: Bleached Teak Solid</span>
                        </div>

                        <div class="flex items-center justify-between mt-2">
                            <div class="flex items-center border border-stone-200 rounded-md">
                                <button type="button" onclick="updateQty(this, -1)" class="px-2.5 py-0.5 text-stone-600 hover:bg-stone-100 text-xs font-bold">-</button>
                                <span class="px-3 py-0.5 text-xs font-bold text-stone-900 item-qty">1</span>
                                <button type="button" onclick="updateQty(this, 1)" class="px-2.5 py-0.5 text-stone-600 hover:bg-stone-100 text-xs font-bold">+</button>
                            </div>
                            <span class="text-xs font-bold text-orange-600 item-total-price">Rp 2.600.000</span>
                        </div>
                    </div>
                </div>

            </div>

            {{-- Footer / Checkout Actions --}}
            <div class="p-5 border-t border-stone-200 bg-stone-50 space-y-4">
                <div class="space-y-1.5 text-xs">
                    <div class="flex justify-between text-stone-600">
                        <span>Subtotal Produk</span>
                        <span id="drawer-subtotal" class="font-bold text-stone-900">Rp 6.850.000</span>
                    </div>
                    <div class="flex justify-between text-stone-600">
                        <span>Ongkos Kirim & Instalasi</span>
                        <span class="font-bold text-green-700">GRATIS (Promo)</span>
                    </div>
                    <div class="border-t border-stone-200 pt-2 flex justify-between text-sm">
                        <span class="font-bold text-stone-900">Total Pembayaran</span>
                        <span id="drawer-grandtotal" class="font-black text-orange-600 text-base">Rp 6.850.000</span>
                    </div>
                </div>

                <div class="space-y-2">
                    <a href="{{ route('cart.index') }}" 
                       class="w-full flex items-center justify-center py-2.5 px-4 bg-orange-50 hover:bg-orange-100 text-orange-700 border border-orange-300 rounded-lg font-bold text-xs uppercase tracking-wider transition-colors text-center">
                        Buka Halaman Keranjang Lengkap (Shopee Style) &rarr;
                    </a>

                    <a href="#checkout" 
                       onclick="alert('Mengarahkan ke halaman Checkout & Pembayaran...');"
                       class="w-full flex items-center justify-center py-3 px-4 bg-orange-600 hover:bg-orange-700 text-white rounded-lg font-bold text-sm tracking-wider uppercase transition-colors shadow-sm text-center">
                        Lanjut ke Pembayaran
                    </a>

                    <button type="button" 
                            onclick="toggleCartDrawer()" 
                            class="w-full py-2.5 px-4 bg-white hover:bg-stone-100 text-stone-700 border border-stone-200 rounded-lg font-semibold text-xs transition-colors">
                        Lanjut Belanja Furniture Lainnya
                    </button>
                </div>

                <p class="text-[11px] text-center text-stone-400">
                    🔒 Transaksi Dijamin 100% Aman & Bergaransi Resmi
                </p>
            </div>

        </div>
    </div>
</div>
