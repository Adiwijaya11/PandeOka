{{-- Light & Clean Footer (No Dark Color, Solid Orange & White Theme) --}}
<footer class="bg-stone-50 text-stone-700 border-t-2 border-orange-600 font-sans">
    
    {{-- Main Footer Content --}}
    <div class="max-w-7xl mx-auto py-12 lg:py-16 px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-8 lg:gap-10">
            
            {{-- Column 1: Brand & Bio (2 Columns wide on LG) --}}
            <div class="lg:col-span-2 space-y-4">
                <div class="flex items-center gap-1.5">
                    <span class="font-black text-2xl tracking-[0.25em] text-stone-900 uppercase">
                        PANDE OKA<span class="text-orange-600">.</span>
                    </span>
                </div>
                <p class="text-[10px] tracking-[0.28em] font-bold text-stone-500 uppercase -mt-2">
                    Furniture &amp; Living
                </p>

                <p class="text-xs sm:text-sm text-stone-600 leading-relaxed max-w-md">
                    Spesialis furniture kayu solid berkualitas tinggi dengan desain modern minimalis. Dibuat langsung oleh pengrajin profesional dari Jepara &amp; Bali untuk menghadirkan kenyamanan dan ketahanan maksimal di rumah Anda.
                </p>

                <div class="pt-2 space-y-1 text-xs text-stone-600">
                    <p class="font-bold text-stone-900 uppercase tracking-wider text-[11px]">Showroom &amp; Workshop:</p>
                    <p>Jl. Raya Jepara - Kudus KM 8, Tahunan, Jepara, Jawa Tengah</p>
                    <p>Branch Bali: Jl. Sunset Road No. 88, Kuta, Badung, Bali</p>
                </div>

                <div class="flex items-center space-x-2 pt-2">
                    {{-- Clean Light Social Icons --}}
                    <a href="#" class="w-8 h-8 rounded-full bg-white border border-stone-200 hover:border-orange-600 hover:bg-orange-600 text-stone-700 hover:text-white flex items-center justify-center transition-colors shadow-xs font-bold text-xs" title="Instagram">
                        IG
                    </a>
                    <a href="#" class="w-8 h-8 rounded-full bg-white border border-stone-200 hover:border-orange-600 hover:bg-orange-600 text-stone-700 hover:text-white flex items-center justify-center transition-colors shadow-xs font-bold text-xs" title="TikTok">
                        TK
                    </a>
                    <a href="#" class="w-8 h-8 rounded-full bg-white border border-stone-200 hover:border-orange-600 hover:bg-orange-600 text-stone-700 hover:text-white flex items-center justify-center transition-colors shadow-xs font-bold text-xs" title="Facebook">
                        FB
                    </a>
                    <a href="#" class="w-8 h-8 rounded-full bg-white border border-stone-200 hover:border-orange-600 hover:bg-orange-600 text-stone-700 hover:text-white flex items-center justify-center transition-colors shadow-xs font-bold text-xs" title="YouTube">
                        YT
                    </a>
                </div>
            </div>

            {{-- Column 2: Kategori Pilihan --}}
            <div>
                <h3 class="text-xs font-black text-stone-900 uppercase tracking-wider mb-4 border-l-2 border-orange-600 pl-2.5">
                    Kategori Pilihan
                </h3>
                <ul class="space-y-2.5 text-xs">
                    <li><a href="#best-seller" class="text-stone-600 hover:text-orange-600 transition-colors font-medium">Best Seller</a></li>
                    <li><a href="#ruang-tamu" class="text-stone-600 hover:text-orange-600 transition-colors">Sofa &amp; Ruang Tamu</a></li>
                    <li><a href="#ruang-makan" class="text-stone-600 hover:text-orange-600 transition-colors">Set Meja Makan</a></li>
                    <li><a href="#kamar-tidur" class="text-stone-600 hover:text-orange-600 transition-colors">Dipan &amp; Kamar Tidur</a></li>
                    <li><a href="#ruang-kerja" class="text-stone-600 hover:text-orange-600 transition-colors">Meja Kerja Minimalis</a></li>
                    <li><a href="#custom-order" class="text-stone-600 hover:text-orange-600 transition-colors">Custom Desain Kayu</a></li>
                </ul>
            </div>

            {{-- Column 3: Bantuan & Layanan --}}
            <div>
                <h3 class="text-xs font-black text-stone-900 uppercase tracking-wider mb-4 border-l-2 border-orange-600 pl-2.5">
                    Bantuan &amp; Layanan
                </h3>
                <ul class="space-y-2.5 text-xs">
                    <li><a href="#cara-order" class="text-stone-600 hover:text-orange-600 transition-colors">Cara Pemesanan</a></li>
                    <li><a href="#custom-order" class="text-stone-600 hover:text-orange-600 transition-colors">Panduan Custom Furniture</a></li>
                    <li><a href="#tracking" class="text-stone-600 hover:text-orange-600 transition-colors">Cek Status Pengiriman</a></li>
                    <li><a href="#garansi" class="text-stone-600 hover:text-orange-600 transition-colors">Klaim Garansi 5 Tahun</a></li>
                    <li><a href="#perawatan" class="text-stone-600 hover:text-orange-600 transition-colors">Tips Perawatan Kayu</a></li>
                    <li><a href="#faq" class="text-stone-600 hover:text-orange-600 transition-colors">Tanya Jawab (FAQ)</a></li>
                </ul>
            </div>

            {{-- Column 4: Newsletter & Konsultasi --}}
            <div>
                <h3 class="text-xs font-black text-stone-900 uppercase tracking-wider mb-4 border-l-2 border-orange-600 pl-2.5">
                    Newsletter
                </h3>
                <p class="text-xs text-stone-600 mb-3 leading-relaxed">
                    Dapatkan katalog terbaru dan voucher potongan Rp 250.000 untuk pembelian pertama Anda.
                </p>
                <form onsubmit="event.preventDefault(); alert('Terima kasih! Voucher diskon telah dikirimkan ke email Anda.');" class="space-y-2">
                    <input type="email" 
                           placeholder="Alamat email Anda..." 
                           required
                           class="w-full px-3 py-2 text-xs bg-white border border-stone-300 text-stone-900 rounded-md focus:border-orange-600 focus:outline-none">
                    <button type="submit" 
                            class="w-full py-2 px-4 bg-orange-600 hover:bg-orange-700 text-white text-xs font-bold uppercase tracking-wider rounded-md transition-colors shadow-xs">
                        Langganan Sekarang
                    </button>
                </form>
                
                <div class="mt-4 pt-3 border-t border-stone-200 text-xs text-stone-600">
                    <p class="font-bold text-stone-900">Hubungi Konsultan Kami:</p>
                    <p class="mt-1">WhatsApp: <span class="text-orange-600 font-bold">+62 812-3456-7890</span></p>
                    <p>Email: order@pandeoka-furniture.com</p>
                </div>
            </div>

        </div>
    </div>

    {{-- Bottom Copyright & Payment Methods (Light Background, No Dark) --}}
    <div class="bg-white py-5 border-t border-stone-200 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-stone-600">
            <div>
                <p>&copy; {{ date('Y') }} <strong class="text-stone-900">Pande Oka Furniture</strong>. Hak Cipta Dilindungi Undang-Undang.</p>
            </div>
            
            {{-- Clean Light Payment Pills --}}
            <div class="flex flex-wrap items-center gap-1.5">
                <span class="px-2 py-0.5 bg-stone-100 border border-stone-200 text-stone-700 font-bold rounded text-[10px]">BCA</span>
                <span class="px-2 py-0.5 bg-stone-100 border border-stone-200 text-stone-700 font-bold rounded text-[10px]">MANDIRI</span>
                <span class="px-2 py-0.5 bg-stone-100 border border-stone-200 text-stone-700 font-bold rounded text-[10px]">BNI</span>
                <span class="px-2 py-0.5 bg-stone-100 border border-stone-200 text-stone-700 font-bold rounded text-[10px]">BRI</span>
                <span class="px-2 py-0.5 bg-orange-50 border border-orange-200 text-orange-600 font-bold rounded text-[10px]">QRIS</span>
                <span class="px-2 py-0.5 bg-stone-100 border border-stone-200 text-stone-700 font-bold rounded text-[10px]">VISA</span>
                <span class="px-2 py-0.5 bg-stone-100 border border-stone-200 text-stone-700 font-bold rounded text-[10px]">MASTERCARD</span>
            </div>
        </div>
    </div>
</footer>
