@extends('layouts.app')

@section('title', 'Best Seller Furniture - Pande Oka Furniture & Living')
@section('meta_description', 'Katalog furniture kayu jati & sungkai solid terlaris. Desain minimalis modern dengan garansi 5 tahun langsung dari pengrajin Jepara & Bali.')

@section('content')

{{-- Breadcrumbs & Header Section --}}
<section class="bg-stone-50 border-b border-stone-200 py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        {{-- Breadcrumb --}}
        <nav class="flex items-center space-x-2 text-xs text-stone-500 uppercase tracking-wider mb-4">
            <a href="{{ url('/') }}" class="hover:text-orange-600 transition-colors">Beranda</a>
            <span>/</span>
            <a href="#katalog" class="hover:text-orange-600 transition-colors">Katalog</a>
            <span>/</span>
            <span class="text-orange-600 font-bold">Best Seller</span>
        </nav>

        <div class="flex flex-col md:flex-row md:items-end justify-between gap-4">
            <div>
                <span class="inline-block px-3 py-1 bg-orange-100 text-orange-700 text-xs font-black uppercase tracking-wider rounded-md mb-2">
                    Koleksi Terlaris
                </span>
                <h1 class="text-2xl sm:text-4xl font-black text-stone-900 tracking-tight">
                    BEST SELLER FURNITURE
                </h1>
                <p class="text-stone-600 text-sm sm:text-base max-w-2xl mt-2 leading-relaxed">
                    Koleksi furniture kayu jati dan sungkai solid paling banyak diminati. Dibuat dengan presisi tinggi oleh pengrajin profesional untuk ketahanan puluhan tahun.
                </p>
            </div>

            {{-- Quick Stats Badges --}}
            <div class="flex items-center gap-3">
                <div class="bg-white border border-stone-200 px-4 py-2 rounded-lg text-center shadow-xs">
                    <span class="block text-xs text-stone-500 font-semibold">Total Koleksi</span>
                    <span class="text-base font-black text-stone-900">24+ Model</span>
                </div>
                <div class="bg-white border border-stone-200 px-4 py-2 rounded-lg text-center shadow-xs">
                    <span class="block text-xs text-stone-500 font-semibold">Garansi</span>
                    <span class="text-base font-black text-orange-600">5 Tahun</span>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Filter & Product Grid Section --}}
<section class="py-10 px-4 sm:px-6 lg:px-8 bg-white" id="katalog">
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

        {{-- Product Grid --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 sm:gap-8 pt-8">

            {{-- Product Card 1 --}}
            <div class="group bg-white border border-stone-200 hover:border-orange-500 rounded-xl overflow-hidden transition-all duration-200 flex flex-col justify-between shadow-xs hover:shadow-md">
                <div class="relative overflow-hidden aspect-square bg-stone-100">
                    <img src="https://images.unsplash.com/photo-1555041469-a586c61ea9bc?auto=format&fit=crop&w=600&q=80" 
                         alt="Sofa 3-Seater Minimalis Jati" 
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                    
                    {{-- Badges --}}
                    <div class="absolute top-3 left-3 flex flex-col gap-1.5">
                        <span class="px-2.5 py-1 bg-orange-600 text-white font-black text-[10px] tracking-wider uppercase rounded">
                            BEST SELLER
                        </span>
                        <span class="px-2 py-0.5 bg-stone-900 text-white font-bold text-[10px] tracking-wider uppercase rounded">
                            HEMAT 18%
                        </span>
                    </div>

                    {{-- Wishlist Button --}}
                    <button type="button" 
                            onclick="this.classList.toggle('text-red-600'); this.classList.toggle('fill-red-600');"
                            class="absolute top-3 right-3 w-8 h-8 rounded-full bg-white/90 hover:bg-white text-stone-600 hover:text-orange-600 flex items-center justify-center transition-colors shadow-xs">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                        </svg>
                    </button>
                </div>

                <div class="p-4 flex-1 flex flex-col justify-between">
                    <div>
                        <div class="flex items-center justify-between text-[11px] text-stone-500 mb-1">
                            <span class="uppercase font-semibold tracking-wider">Ruang Tamu</span>
                            <span class="flex items-center text-orange-500 font-bold">
                                ★ 4.9 <span class="text-stone-400 font-normal ml-0.5">(128)</span>
                            </span>
                        </div>
                        <h3 class="text-sm font-bold text-stone-900 group-hover:text-orange-600 transition-colors line-clamp-2 leading-snug">
                            Sofa 3-Seater Minimalis Kayu Jati Salak Brown
                        </h3>
                        <p class="text-[11px] text-stone-500 mt-1">Kayu Jati Solid • Busa Royal Foam HR</p>
                    </div>

                    <div class="pt-4 border-t border-stone-100 mt-3">
                        <div class="flex items-baseline gap-2 mb-3">
                            <span class="text-base font-black text-orange-600">Rp 4.250.000</span>
                            <span class="text-xs text-stone-400 line-through">Rp 5.200.000</span>
                        </div>

                        <button type="button" 
                                onclick="addToCart('Sofa 3-Seater Minimalis Kayu Jati', 4250000, 'https://images.unsplash.com/photo-1555041469-a586c61ea9bc?auto=format&fit=crop&w=300&q=80')"
                                class="w-full py-2.5 px-3 bg-stone-900 hover:bg-orange-600 text-white rounded-lg font-bold text-xs uppercase tracking-wider transition-colors flex items-center justify-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                            </svg>
                            <span>+ Keranjang</span>
                        </button>
                    </div>
                </div>
            </div>

            {{-- Product Card 2 --}}
            <div class="group bg-white border border-stone-200 hover:border-orange-500 rounded-xl overflow-hidden transition-all duration-200 flex flex-col justify-between shadow-xs hover:shadow-md">
                <div class="relative overflow-hidden aspect-square bg-stone-100">
                    <img src="https://images.unsplash.com/photo-1617806118233-18e1de247200?auto=format&fit=crop&w=600&q=80" 
                         alt="Meja Makan Kayu Trembesi" 
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                    
                    <div class="absolute top-3 left-3 flex flex-col gap-1.5">
                        <span class="px-2.5 py-1 bg-orange-600 text-white font-black text-[10px] tracking-wider uppercase rounded">
                            BEST SELLER
                        </span>
                    </div>

                    <button type="button" 
                            class="absolute top-3 right-3 w-8 h-8 rounded-full bg-white/90 hover:bg-white text-stone-600 hover:text-orange-600 flex items-center justify-center transition-colors shadow-xs">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                        </svg>
                    </button>
                </div>

                <div class="p-4 flex-1 flex flex-col justify-between">
                    <div>
                        <div class="flex items-center justify-between text-[11px] text-stone-500 mb-1">
                            <span class="uppercase font-semibold tracking-wider">Ruang Makan</span>
                            <span class="flex items-center text-orange-500 font-bold">
                                ★ 5.0 <span class="text-stone-400 font-normal ml-0.5">(94)</span>
                            </span>
                        </div>
                        <h3 class="text-sm font-bold text-stone-900 group-hover:text-orange-600 transition-colors line-clamp-2 leading-snug">
                            Set Meja Makan Solid Wood Trembesi 6 Kursi
                        </h3>
                        <p class="text-[11px] text-stone-500 mt-1">Dimensi 200 x 90 cm • Tebal 7 cm</p>
                    </div>

                    <div class="pt-4 border-t border-stone-100 mt-3">
                        <div class="flex items-baseline gap-2 mb-3">
                            <span class="text-base font-black text-orange-600">Rp 7.800.000</span>
                            <span class="text-xs text-stone-400 line-through">Rp 8.900.000</span>
                        </div>

                        <button type="button" 
                                onclick="addToCart('Set Meja Makan Solid Wood Trembesi 6 Kursi', 7800000, 'https://images.unsplash.com/photo-1617806118233-18e1de247200?auto=format&fit=crop&w=300&q=80')"
                                class="w-full py-2.5 px-3 bg-stone-900 hover:bg-orange-600 text-white rounded-lg font-bold text-xs uppercase tracking-wider transition-colors flex items-center justify-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                            </svg>
                            <span>+ Keranjang</span>
                        </button>
                    </div>
                </div>
            </div>

            {{-- Product Card 3 --}}
            <div class="group bg-white border border-stone-200 hover:border-orange-500 rounded-xl overflow-hidden transition-all duration-200 flex flex-col justify-between shadow-xs hover:shadow-md">
                <div class="relative overflow-hidden aspect-square bg-stone-100">
                    <img src="https://images.unsplash.com/photo-1533090481720-856c6e3c1fdc?auto=format&fit=crop&w=600&q=80" 
                         alt="Coffee Table Bundar Kayu Sungkai" 
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                    
                    <div class="absolute top-3 left-3 flex flex-col gap-1.5">
                        <span class="px-2.5 py-1 bg-orange-600 text-white font-black text-[10px] tracking-wider uppercase rounded">
                            BEST SELLER
                        </span>
                    </div>

                    <button type="button" 
                            class="absolute top-3 right-3 w-8 h-8 rounded-full bg-white/90 hover:bg-white text-stone-600 hover:text-orange-600 flex items-center justify-center transition-colors shadow-xs">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                        </svg>
                    </button>
                </div>

                <div class="p-4 flex-1 flex flex-col justify-between">
                    <div>
                        <div class="flex items-center justify-between text-[11px] text-stone-500 mb-1">
                            <span class="uppercase font-semibold tracking-wider">Ruang Tamu</span>
                            <span class="flex items-center text-orange-500 font-bold">
                                ★ 4.8 <span class="text-stone-400 font-normal ml-0.5">(67)</span>
                            </span>
                        </div>
                        <h3 class="text-sm font-bold text-stone-900 group-hover:text-orange-600 transition-colors line-clamp-2 leading-snug">
                            Coffee Table Bundar Kayu Sungkai D80
                        </h3>
                        <p class="text-[11px] text-stone-500 mt-1">Kayu Sungkai Bleached • Water-repellent</p>
                    </div>

                    <div class="pt-4 border-t border-stone-100 mt-3">
                        <div class="flex items-baseline gap-2 mb-3">
                            <span class="text-base font-black text-orange-600">Rp 2.600.000</span>
                            <span class="text-xs text-stone-400 line-through">Rp 3.100.000</span>
                        </div>

                        <button type="button" 
                                onclick="addToCart('Coffee Table Bundar Kayu Sungkai D80', 2600000, 'https://images.unsplash.com/photo-1533090481720-856c6e3c1fdc?auto=format&fit=crop&w=300&q=80')"
                                class="w-full py-2.5 px-3 bg-stone-900 hover:bg-orange-600 text-white rounded-lg font-bold text-xs uppercase tracking-wider transition-colors flex items-center justify-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                            </svg>
                            <span>+ Keranjang</span>
                        </button>
                    </div>
                </div>
            </div>

            {{-- Product Card 4 --}}
            <div class="group bg-white border border-stone-200 hover:border-orange-500 rounded-xl overflow-hidden transition-all duration-200 flex flex-col justify-between shadow-xs hover:shadow-md">
                <div class="relative overflow-hidden aspect-square bg-stone-100">
                    <img src="https://images.unsplash.com/photo-1505693416388-ac5ce068fe85?auto=format&fit=crop&w=600&q=80" 
                         alt="Dipan Tempat Tidur Jati King Size" 
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                    
                    <div class="absolute top-3 left-3 flex flex-col gap-1.5">
                        <span class="px-2.5 py-1 bg-orange-600 text-white font-black text-[10px] tracking-wider uppercase rounded">
                            BEST SELLER
                        </span>
                    </div>

                    <button type="button" 
                            class="absolute top-3 right-3 w-8 h-8 rounded-full bg-white/90 hover:bg-white text-stone-600 hover:text-orange-600 flex items-center justify-center transition-colors shadow-xs">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                        </svg>
                    </button>
                </div>

                <div class="p-4 flex-1 flex flex-col justify-between">
                    <div>
                        <div class="flex items-center justify-between text-[11px] text-stone-500 mb-1">
                            <span class="uppercase font-semibold tracking-wider">Kamar Tidur</span>
                            <span class="flex items-center text-orange-500 font-bold">
                                ★ 4.9 <span class="text-stone-400 font-normal ml-0.5">(82)</span>
                            </span>
                        </div>
                        <h3 class="text-sm font-bold text-stone-900 group-hover:text-orange-600 transition-colors line-clamp-2 leading-snug">
                            Tempat Tidur Minimalis Jati King (180x200)
                        </h3>
                        <p class="text-[11px] text-stone-500 mt-1">Konstruksi Mortise & Tenon Kuat</p>
                    </div>

                    <div class="pt-4 border-t border-stone-100 mt-3">
                        <div class="flex items-baseline gap-2 mb-3">
                            <span class="text-base font-black text-orange-600">Rp 6.450.000</span>
                            <span class="text-xs text-stone-400 line-through">Rp 7.500.000</span>
                        </div>

                        <button type="button" 
                                onclick="addToCart('Tempat Tidur Minimalis Jati King', 6450000, 'https://images.unsplash.com/photo-1505693416388-ac5ce068fe85?auto=format&fit=crop&w=300&q=80')"
                                class="w-full py-2.5 px-3 bg-stone-900 hover:bg-orange-600 text-white rounded-lg font-bold text-xs uppercase tracking-wider transition-colors flex items-center justify-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                            </svg>
                            <span>+ Keranjang</span>
                        </button>
                    </div>
                </div>
            </div>

            {{-- Product Card 5 --}}
            <div class="group bg-white border border-stone-200 hover:border-orange-500 rounded-xl overflow-hidden transition-all duration-200 flex flex-col justify-between shadow-xs hover:shadow-md">
                <div class="relative overflow-hidden aspect-square bg-stone-100">
                    <img src="https://images.unsplash.com/photo-1518455027359-f3f8164ba6bd?auto=format&fit=crop&w=600&q=80" 
                         alt="Meja Kerja Minimalis Ergonomis" 
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                    
                    <div class="absolute top-3 left-3 flex flex-col gap-1.5">
                        <span class="px-2.5 py-1 bg-orange-600 text-white font-black text-[10px] tracking-wider uppercase rounded">
                            BEST SELLER
                        </span>
                    </div>

                    <button type="button" 
                            class="absolute top-3 right-3 w-8 h-8 rounded-full bg-white/90 hover:bg-white text-stone-600 hover:text-orange-600 flex items-center justify-center transition-colors shadow-xs">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                        </svg>
                    </button>
                </div>

                <div class="p-4 flex-1 flex flex-col justify-between">
                    <div>
                        <div class="flex items-center justify-between text-[11px] text-stone-500 mb-1">
                            <span class="uppercase font-semibold tracking-wider">Ruang Kerja</span>
                            <span class="flex items-center text-orange-500 font-bold">
                                ★ 4.9 <span class="text-stone-400 font-normal ml-0.5">(55)</span>
                            </span>
                        </div>
                        <h3 class="text-sm font-bold text-stone-900 group-hover:text-orange-600 transition-colors line-clamp-2 leading-snug">
                            Meja Kerja Kayu Jati Minimalis Cable-Management
                        </h3>
                        <p class="text-[11px] text-stone-500 mt-1">Panjang 140 cm • 2 Laci Soft Close</p>
                    </div>

                    <div class="pt-4 border-t border-stone-100 mt-3">
                        <div class="flex items-baseline gap-2 mb-3">
                            <span class="text-base font-black text-orange-600">Rp 3.150.000</span>
                            <span class="text-xs text-stone-400 line-through">Rp 3.800.000</span>
                        </div>

                        <button type="button" 
                                onclick="addToCart('Meja Kerja Kayu Jati Minimalis', 3150000, 'https://images.unsplash.com/photo-1518455027359-f3f8164ba6bd?auto=format&fit=crop&w=300&q=80')"
                                class="w-full py-2.5 px-3 bg-stone-900 hover:bg-orange-600 text-white rounded-lg font-bold text-xs uppercase tracking-wider transition-colors flex items-center justify-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                            </svg>
                            <span>+ Keranjang</span>
                        </button>
                    </div>
                </div>
            </div>

            {{-- Product Card 6 --}}
            <div class="group bg-white border border-stone-200 hover:border-orange-500 rounded-xl overflow-hidden transition-all duration-200 flex flex-col justify-between shadow-xs hover:shadow-md">
                <div class="relative overflow-hidden aspect-square bg-stone-100">
                    <img src="https://images.unsplash.com/photo-1594026112284-02bb6f3352fe?auto=format&fit=crop&w=600&q=80" 
                         alt="Armchair Kayu Jati Rotan Asli" 
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                    
                    <div class="absolute top-3 left-3 flex flex-col gap-1.5">
                        <span class="px-2.5 py-1 bg-orange-600 text-white font-black text-[10px] tracking-wider uppercase rounded">
                            BEST SELLER
                        </span>
                    </div>

                    <button type="button" 
                            class="absolute top-3 right-3 w-8 h-8 rounded-full bg-white/90 hover:bg-white text-stone-600 hover:text-orange-600 flex items-center justify-center transition-colors shadow-xs">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                        </svg>
                    </button>
                </div>

                <div class="p-4 flex-1 flex flex-col justify-between">
                    <div>
                        <div class="flex items-center justify-between text-[11px] text-stone-500 mb-1">
                            <span class="uppercase font-semibold tracking-wider">Ruang Tamu / Santai</span>
                            <span class="flex items-center text-orange-500 font-bold">
                                ★ 4.9 <span class="text-stone-400 font-normal ml-0.5">(112)</span>
                            </span>
                        </div>
                        <h3 class="text-sm font-bold text-stone-900 group-hover:text-orange-600 transition-colors line-clamp-2 leading-snug">
                            Kursi Santai Armchair Kayu Jati Anyaman Rotan Alami
                        </h3>
                        <p class="text-[11px] text-stone-500 mt-1">Anyaman Rotan Handmade • Finishing Doff</p>
                    </div>

                    <div class="pt-4 border-t border-stone-100 mt-3">
                        <div class="flex items-baseline gap-2 mb-3">
                            <span class="text-base font-black text-orange-600">Rp 1.950.000</span>
                            <span class="text-xs text-stone-400 line-through">Rp 2.400.000</span>
                        </div>

                        <button type="button" 
                                onclick="addToCart('Armchair Jati Rotan Alami', 1950000, 'https://images.unsplash.com/photo-1594026112284-02bb6f3352fe?auto=format&fit=crop&w=300&q=80')"
                                class="w-full py-2.5 px-3 bg-stone-900 hover:bg-orange-600 text-white rounded-lg font-bold text-xs uppercase tracking-wider transition-colors flex items-center justify-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                            </svg>
                            <span>+ Keranjang</span>
                        </button>
                    </div>
                </div>
            </div>

            {{-- Product Card 7 --}}
            <div class="group bg-white border border-stone-200 hover:border-orange-500 rounded-xl overflow-hidden transition-all duration-200 flex flex-col justify-between shadow-xs hover:shadow-md">
                <div class="relative overflow-hidden aspect-square bg-stone-100">
                    <img src="https://images.unsplash.com/photo-1595428774223-ef52624120d2?auto=format&fit=crop&w=600&q=80" 
                         alt="Credenza Rak TV Kayu Jati" 
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                    
                    <div class="absolute top-3 left-3 flex flex-col gap-1.5">
                        <span class="px-2.5 py-1 bg-orange-600 text-white font-black text-[10px] tracking-wider uppercase rounded">
                            BEST SELLER
                        </span>
                    </div>

                    <button type="button" 
                            class="absolute top-3 right-3 w-8 h-8 rounded-full bg-white/90 hover:bg-white text-stone-600 hover:text-orange-600 flex items-center justify-center transition-colors shadow-xs">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                        </svg>
                    </button>
                </div>

                <div class="p-4 flex-1 flex flex-col justify-between">
                    <div>
                        <div class="flex items-center justify-between text-[11px] text-stone-500 mb-1">
                            <span class="uppercase font-semibold tracking-wider">Ruang Tamu</span>
                            <span class="flex items-center text-orange-500 font-bold">
                                ★ 4.8 <span class="text-stone-400 font-normal ml-0.5">(41)</span>
                            </span>
                        </div>
                        <h3 class="text-sm font-bold text-stone-900 group-hover:text-orange-600 transition-colors line-clamp-2 leading-snug">
                            Credenza TV Minimalis Scandinavian 160cm
                        </h3>
                        <p class="text-[11px] text-stone-500 mt-1">Kayu Jati Solid • 3 Pintu Geser Rotan</p>
                    </div>

                    <div class="pt-4 border-t border-stone-100 mt-3">
                        <div class="flex items-baseline gap-2 mb-3">
                            <span class="text-base font-black text-orange-600">Rp 3.750.000</span>
                            <span class="text-xs text-stone-400 line-through">Rp 4.500.000</span>
                        </div>

                        <button type="button" 
                                onclick="addToCart('Credenza TV Minimalis Scandinavian', 3750000, 'https://images.unsplash.com/photo-1595428774223-ef52624120d2?auto=format&fit=crop&w=300&q=80')"
                                class="w-full py-2.5 px-3 bg-stone-900 hover:bg-orange-600 text-white rounded-lg font-bold text-xs uppercase tracking-wider transition-colors flex items-center justify-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                            </svg>
                            <span>+ Keranjang</span>
                        </button>
                    </div>
                </div>
            </div>

            {{-- Product Card 8 --}}
            <div class="group bg-white border border-stone-200 hover:border-orange-500 rounded-xl overflow-hidden transition-all duration-200 flex flex-col justify-between shadow-xs hover:shadow-md">
                <div class="relative overflow-hidden aspect-square bg-stone-100">
                    <img src="https://images.unsplash.com/photo-1538688525198-9b88f6f53126?auto=format&fit=crop&w=600&q=80" 
                         alt="Lemari Pakaian 3 Pintu Kayu Jati" 
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                    
                    <div class="absolute top-3 left-3 flex flex-col gap-1.5">
                        <span class="px-2.5 py-1 bg-orange-600 text-white font-black text-[10px] tracking-wider uppercase rounded">
                            BEST SELLER
                        </span>
                    </div>

                    <button type="button" 
                            class="absolute top-3 right-3 w-8 h-8 rounded-full bg-white/90 hover:bg-white text-stone-600 hover:text-orange-600 flex items-center justify-center transition-colors shadow-xs">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                        </svg>
                    </button>
                </div>

                <div class="p-4 flex-1 flex flex-col justify-between">
                    <div>
                        <div class="flex items-center justify-between text-[11px] text-stone-500 mb-1">
                            <span class="uppercase font-semibold tracking-wider">Kamar Tidur</span>
                            <span class="flex items-center text-orange-500 font-bold">
                                ★ 5.0 <span class="text-stone-400 font-normal ml-0.5">(39)</span>
                            </span>
                        </div>
                        <h3 class="text-sm font-bold text-stone-900 group-hover:text-orange-600 transition-colors line-clamp-2 leading-snug">
                            Lemari Pakaian 3 Pintu Sliding Kayu Jati Perhutani
                        </h3>
                        <p class="text-[11px] text-stone-500 mt-1">Ukuran 180 x 60 x 210 cm • Full Solid</p>
                    </div>

                    <div class="pt-4 border-t border-stone-100 mt-3">
                        <div class="flex items-baseline gap-2 mb-3">
                            <span class="text-base font-black text-orange-600">Rp 8.900.000</span>
                            <span class="text-xs text-stone-400 line-through">Rp 10.200.000</span>
                        </div>

                        <button type="button" 
                                onclick="addToCart('Lemari Pakaian 3 Pintu Sliding Kayu Jati', 8900000, 'https://images.unsplash.com/photo-1538688525198-9b88f6f53126?auto=format&fit=crop&w=300&q=80')"
                                class="w-full py-2.5 px-3 bg-stone-900 hover:bg-orange-600 text-white rounded-lg font-bold text-xs uppercase tracking-wider transition-colors flex items-center justify-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                            </svg>
                            <span>+ Keranjang</span>
                        </button>
                    </div>
                </div>
            </div>

        </div>

        {{-- Load More / Pagination Button --}}
        <div class="mt-12 text-center">
            <button type="button" 
                    onclick="alert('Memuat lebih banyak katalog furniture...');"
                    class="inline-flex items-center gap-2 px-8 py-3.5 bg-white border-2 border-stone-900 hover:border-orange-600 hover:bg-orange-600 hover:text-white text-stone-900 rounded-lg font-bold text-xs uppercase tracking-widest transition-all">
                <span>Muat Koleksi Lainnya</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                </svg>
            </button>
        </div>

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

{{-- Tracking Pengiriman (Lacak Pesanan Furniture) --}}
<section class="py-16 px-4 sm:px-6 lg:px-8 bg-white border-t border-stone-200" id="tracking">
    <div class="max-w-4xl mx-auto">
        <div class="text-center max-w-xl mx-auto mb-8">
            <span class="inline-block px-3 py-1 bg-orange-100 text-orange-700 text-xs font-bold uppercase tracking-wider rounded-md mb-2">
                Live Tracking Status
            </span>
            <h2 class="text-2xl sm:text-3xl font-black text-stone-900">
                Lacak Status Pengiriman Pesanan
            </h2>
            <p class="text-stone-600 text-xs sm:text-sm mt-2">
                Masukkan nomor invoice atau resi ekspedisi truk mebel Anda untuk memantau proses perakitan dan perjalanan pengiriman langsung ke alamat Anda.
            </p>
        </div>

        <div class="bg-stone-50 border border-stone-200 rounded-2xl p-6 sm:p-8 shadow-xs">
            <form onsubmit="event.preventDefault(); document.getElementById('tracking-result').classList.remove('hidden');" class="flex flex-col sm:flex-row gap-3">
                <div class="relative flex-1">
                    <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-stone-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1"/>
                        </svg>
                    </span>
                    <input type="text" 
                           value="PO-88421"
                           placeholder="Contoh: PO-88421 atau No. HP pemesan..." 
                           class="w-full bg-white text-stone-900 placeholder-stone-400 text-xs sm:text-sm pl-10 pr-4 py-3 rounded-xl border border-stone-300 focus:outline-none focus:border-orange-600 focus:ring-1 focus:ring-orange-600">
                </div>
                <button type="submit" class="py-3 px-6 bg-orange-600 hover:bg-orange-700 text-white font-bold text-xs uppercase tracking-wider rounded-xl transition-colors shadow-xs whitespace-nowrap">
                    Cek Status Sekarang
                </button>
            </form>

            {{-- Demo Tracking Result --}}
            <div id="tracking-result" class="mt-8 pt-6 border-t border-stone-200">
                <div class="flex items-center justify-between text-xs mb-4">
                    <div>
                        <span class="text-stone-500">Nomor Invoice:</span>
                        <strong class="text-stone-900 ml-1">PO-88421</strong>
                    </div>
                    <div>
                        <span class="text-stone-500">Estimasi Tiba:</span>
                        <strong class="text-green-700 ml-1">Besok Sore (15:00 - 18:00)</strong>
                    </div>
                </div>

                {{-- Timeline Step --}}
                <div class="space-y-4 text-xs">
                    <div class="flex items-start gap-3">
                        <span class="w-3 h-3 rounded-full bg-green-600 mt-0.5 shrink-0"></span>
                        <div>
                            <p class="font-bold text-stone-900">Selesai QC &amp; Packing Kayu Aman</p>
                            <p class="text-stone-500 text-[11px]">Workshop Jepara • 10 Okt 2026, 14:30 WIB</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <span class="w-3 h-3 rounded-full bg-orange-600 mt-0.5 shrink-0 ring-4 ring-orange-100"></span>
                        <div>
                            <p class="font-bold text-orange-600">Dalam Perjalanan Truk Ekspedisi Mebel Khusus</p>
                            <p class="text-stone-500 text-[11px]">Melewati Tol Semarang - Cikampek • Pengemudi: Pak Bambang (0813-9021-xxxx)</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <span class="w-3 h-3 rounded-full bg-stone-300 mt-0.5 shrink-0"></span>
                        <div>
                            <p class="font-bold text-stone-400">Pengantaran &amp; Perakitan di Lokasi Pelanggan</p>
                            <p class="text-stone-400 text-[11px]">Menunggu armada tiba di kota tujuan</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Custom Order Banner (Solid White & Orange) --}}
<section class="py-14 px-4 sm:px-6 lg:px-8 bg-stone-50 border-t border-stone-200" id="custom-order">
    <div class="max-w-7xl mx-auto bg-white border border-stone-200 rounded-2xl p-8 sm:p-12 shadow-xs flex flex-col lg:flex-row items-center justify-between gap-8">
        <div class="max-w-2xl">
            <span class="text-orange-600 font-black text-xs uppercase tracking-widest">
                Layanan Custom Desain
            </span>
            <h2 class="text-2xl sm:text-3xl font-black text-stone-900 mt-2">
                Punya Ukuran atau Desain Ruangan Khusus?
            </h2>
            <p class="text-stone-600 text-sm mt-3 leading-relaxed">
                Kami siap membuatkan furniture custom sesuai dengan ukuran presisi ruangan, pilihan jenis kayu solid (Jati, Sungkai, Mahoni), serta finishing warna yang Anda inginkan tanpa biaya konsultasi.
            </p>
            <div class="flex flex-wrap items-center gap-6 mt-6 text-xs text-stone-700 font-semibold">
                <span class="flex items-center gap-1.5"><strong class="text-orange-600">✓</strong> Free 3D Sketch Model</span>
                <span class="flex items-center gap-1.5"><strong class="text-orange-600">✓</strong> Garansi Konstruksi 5 Tahun</span>
                <span class="flex items-center gap-1.5"><strong class="text-orange-600">✓</strong> Pengerjaan Tepat Waktu</span>
            </div>
        </div>

        <div class="flex-shrink-0 flex flex-col sm:flex-row gap-3 w-full lg:w-auto">
            <a href="https://wa.me/6281234567890?text=Halo%20Pande%20Oka,%20saya%20ingin%20konsultasi%20custom%20furniture" 
               target="_blank"
               class="px-8 py-4 bg-orange-600 hover:bg-orange-700 text-white rounded-xl font-bold text-xs uppercase tracking-wider text-center transition-colors shadow-sm">
                Konsultasi WhatsApp Sekarang
            </a>
            <a href="#katalog" 
               class="px-8 py-4 bg-stone-100 hover:bg-stone-200 text-stone-800 rounded-xl font-bold text-xs uppercase tracking-wider text-center transition-colors">
                Lihat Katalog
            </a>
        </div>
    </div>
</section>

{{-- Promo Spesial Section --}}
<section class="py-12 px-4 sm:px-6 lg:px-8 bg-orange-600 text-white" id="promo">
    <div class="max-w-7xl mx-auto flex flex-col md:flex-row items-center justify-between gap-6">
        <div>
            <span class="bg-white text-orange-600 text-[10px] font-black px-2 py-0.5 rounded uppercase tracking-wider">
                Promo Terbatas
            </span>
            <h3 class="text-xl sm:text-2xl font-black mt-2">
                Gratis Ongkos Kirim &amp; Instalasi Seluruh Jawa - Bali
            </h3>
            <p class="text-orange-100 text-xs sm:text-sm mt-1 max-w-xl">
                Gunakan kode voucher <strong class="text-white underline font-mono">PANDEOKA2026</strong> saat konfirmasi pemesanan untuk mendapatkan subsidi ongkir hingga Rp 1.000.000.
            </p>
        </div>
        <div>
            <a href="https://wa.me/6281234567890?text=Halo%20saya%20ingin%20klaim%20promo%20PANDEOKA2026" target="_blank" class="inline-block py-3 px-6 bg-white text-orange-600 hover:bg-stone-100 font-extrabold text-xs uppercase tracking-wider rounded-xl transition-colors shadow-sm whitespace-nowrap">
                Klaim Promo via WhatsApp
            </a>
        </div>
    </div>
</section>

@endsection
