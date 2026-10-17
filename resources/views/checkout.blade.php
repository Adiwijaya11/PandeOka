@extends('layouts.app')

@section('title', 'Beli Sekarang & Konfirmasi SPK Workshop - Pande Oka Furniture Bali')
@section('meta_description', 'Halaman konfirmasi pembelian furniture kayu solid Pande Oka. Tanpa pengiriman ekspedisi, langsung unduh file SPK Excel rekap produksi workshop.')

@section('content')
<div class="bg-stone-100 min-h-screen py-5 sm:py-8 font-sans">
    <div class="max-w-7xl mx-auto px-3 sm:px-6 lg:px-8">

        {{-- Breadcrumb & Back Link --}}
        <div class="flex items-center justify-between mb-4 sm:mb-6">
            <nav class="flex items-center space-x-1.5 sm:space-x-2 text-[11px] sm:text-xs text-stone-500 uppercase tracking-wider overflow-x-auto whitespace-nowrap">
                <a href="{{ url('/') }}" class="hover:text-orange-600 transition-colors">Beranda</a>
                <span>/</span>
                @if($isDirect && isset($items[0]->product->slug))
                    <a href="{{ route('products.show', $items[0]->product->slug) }}" class="hover:text-orange-600 transition-colors truncate max-w-[140px] sm:max-w-none">
                        {{ $items[0]->product->name }}
                    </a>
                    <span>/</span>
                @else
                    <a href="{{ route('cart.index') }}" class="hover:text-orange-600 transition-colors">Keranjang</a>
                    <span>/</span>
                @endif
                <span class="text-orange-600 font-bold">Beli Sekarang</span>
            </nav>

            <a href="{{ $isDirect && isset($items[0]->product->slug) ? route('products.show', $items[0]->product->slug) : url('/') }}" 
               class="text-xs font-bold text-stone-600 hover:text-orange-600 transition-colors flex items-center gap-1">
                <span>&larr;</span>
                <span class="hidden sm:inline">Kembali</span>
            </a>
        </div>

        {{-- Notice Banner: Tanpa Pengiriman & Output Excel --}}
        <div class="bg-orange-50 border border-orange-200 rounded-xl p-3.5 sm:p-4 mb-6 flex flex-col sm:flex-row sm:items-center justify-between gap-3 text-xs shadow-2xs">
            <div class="flex items-center gap-2.5">
                <span class="px-2.5 py-1 bg-orange-600 text-white font-black text-[10px] rounded uppercase tracking-wider shrink-0 flex items-center gap-1">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    <span>OUTPUT EXCEL (.XLS)</span>
                </span>
                <p class="text-stone-700 leading-relaxed">
                    <strong>Tanpa Pengiriman Ekspedisi:</strong> Seluruh produk diproduksi untuk <strong>Self-Pickup (Ambil Sendiri di Workshop)</strong>. Saat menekan tombol Beli, pesanan otomatis terbit sebagai <strong>File Excel (SPK Workshop)</strong> untuk Anda bawa ke lokasi serah terima.
                </p>
            </div>
            <span class="text-orange-700 font-bold whitespace-nowrap hidden lg:inline">
                Workshop Sunset Road, Bali
            </span>
        </div>

        {{-- Form Checkout Beli Sekarang --}}
        <form id="checkout-process-form" 
              method="POST" 
              action="{{ route('checkout.process') }}" 
              onsubmit="handleCheckoutSubmit(event)">
            @csrf

            @if($isDirect && isset($items[0]))
                <input type="hidden" name="product_id" value="{{ $items[0]->product->id ?? '' }}">
                <input type="hidden" name="quantity" value="{{ $items[0]->quantity ?? 1 }}">
                <input type="hidden" name="variation" value="{{ $items[0]->variation ?? '' }}">
            @endif

            <input type="hidden" name="voucher_code" id="hidden-voucher-input" value="{{ $voucherCode }}">

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-5 sm:gap-6 lg:gap-8">
                
                {{-- Left Column (8 cols): Data Pemesan, Rincian Produk & Pembayaran --}}
                <div class="lg:col-span-8 space-y-4 sm:space-y-6">

                    {{-- Section 1: Data Pemesan & Lokasi Pengambilan Workshop --}}
                    <div class="bg-white rounded-xl sm:rounded-2xl border border-stone-200 p-4 sm:p-6 shadow-xs">
                        <div class="flex items-center justify-between pb-3 sm:pb-4 border-b border-stone-100 mb-4">
                            <h2 class="text-sm sm:text-base font-black text-stone-900 uppercase tracking-wider flex items-center gap-2">
                                <span class="w-6 h-6 rounded-md bg-orange-600 text-white flex items-center justify-center text-xs">1</span>
                                <span>Data Pemesan &amp; Workshop Serah Terima</span>
                            </h2>
                            <span class="text-[10px] font-bold text-orange-600 uppercase tracking-widest bg-orange-50 px-2 py-0.5 rounded border border-orange-200">
                                Self-Pickup
                            </span>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4 mb-4">
                            {{-- Nama Pemesan --}}
                            <div>
                                <label class="block text-xs font-bold text-stone-700 uppercase tracking-wider mb-1.5">
                                    Nama Lengkap <span class="text-red-500">*</span>
                                </label>
                                <input type="text" 
                                       name="customer_name" 
                                       required 
                                       placeholder="Nama pemesan sesuai KTP/WhatsApp" 
                                       value="{{ old('customer_name', $customer->name ?? '') }}"
                                       class="w-full px-3 py-2.5 bg-stone-50 border border-stone-300 rounded-lg text-xs font-medium text-stone-900 focus:bg-white focus:border-orange-600 focus:ring-1 focus:ring-orange-600 outline-none transition-all">
                            </div>

                            {{-- No. WhatsApp / HP --}}
                            <div>
                                <label class="block text-xs font-bold text-stone-700 uppercase tracking-wider mb-1.5">
                                    Nomor WhatsApp / HP <span class="text-red-500">*</span>
                                </label>
                                <input type="tel" 
                                       name="customer_phone" 
                                       required 
                                       placeholder="Contoh: 081234567890" 
                                       value="{{ old('customer_phone', $customer->phone ?? '') }}"
                                       class="w-full px-3 py-2.5 bg-stone-50 border border-stone-300 rounded-lg text-xs font-medium text-stone-900 focus:bg-white focus:border-orange-600 focus:ring-1 focus:ring-orange-600 outline-none transition-all">
                            </div>

                            {{-- Email --}}
                            <div class="sm:col-span-2">
                                <label class="block text-xs font-bold text-stone-700 uppercase tracking-wider mb-1.5">
                                    Alamat Email (Opsional)
                                </label>
                                <input type="email" 
                                       name="customer_email" 
                                       placeholder="email@example.com (untuk arsip digital)" 
                                       value="{{ old('customer_email', $customer->email ?? '') }}"
                                       class="w-full px-3 py-2.5 bg-stone-50 border border-stone-300 rounded-lg text-xs font-medium text-stone-900 focus:bg-white focus:border-orange-600 focus:ring-1 focus:ring-orange-600 outline-none transition-all">
                            </div>

                            {{-- Catatan Khusus Kustomisasi --}}
                            <div class="sm:col-span-2">
                                <label class="block text-xs font-bold text-stone-700 uppercase tracking-wider mb-1.5">
                                    Catatan Khusus untuk Pengrajin Kayu Workshop (Opsional)
                                </label>
                                <textarea name="customer_notes" 
                                          rows="2" 
                                          placeholder="Contoh: Mohon sudut meja dibuat rounded / sedikit melengkung, serat kayu dipilih yang padat natural."
                                          class="w-full px-3 py-2 bg-stone-50 border border-stone-300 rounded-lg text-xs font-medium text-stone-900 focus:bg-white focus:border-orange-600 focus:ring-1 focus:ring-orange-600 outline-none transition-all resize-none"></textarea>
                            </div>
                        </div>

                        {{-- Lokasi Workshop Box --}}
                        <div class="p-3.5 bg-stone-50 rounded-xl border border-stone-200 text-xs text-stone-700 space-y-1.5">
                            <div class="flex items-center gap-1.5 font-bold text-stone-900">
                                <svg class="w-4 h-4 text-orange-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                <span>Titik Pengambilan Serah Terima:</span>
                            </div>
                            <p class="font-medium text-stone-800 pl-5">
                                Workshop &amp; Showroom Pande Oka, Jl. Sunset Road No. 88, Kuta, Badung, Bali 80361
                            </p>
                            <p class="text-[11px] text-stone-500 pl-5">
                                Buka Setiap Hari: 09:00 - 20:00 WITA &bull; Telp/WA: +62 812-3456-7890 &bull; Estimasi Pengerjaan: 7-14 hari kerja.
                            </p>
                        </div>
                    </div>

                    {{-- Section 2: Rincian Produk & Custom Dimensi --}}
                    <div class="bg-white rounded-xl sm:rounded-2xl border border-stone-200 p-4 sm:p-6 shadow-xs">
                        <div class="flex items-center justify-between pb-3 sm:pb-4 border-b border-stone-100 mb-4">
                            <h2 class="text-sm sm:text-base font-black text-stone-900 uppercase tracking-wider flex items-center gap-2">
                                <span class="w-6 h-6 rounded-md bg-orange-600 text-white flex items-center justify-center text-xs">2</span>
                                <span>Produk Yang Dipesan</span>
                            </h2>
                            <span class="text-xs text-stone-500 font-semibold">
                                Total {{ $items->sum('quantity') }} unit
                            </span>
                        </div>

                        <div class="space-y-4">
                            @foreach($items as $item)
                                @php
                                    $prod = $item->product;
                                    $unitPrice = (int) ($prod->price ?? 0);
                                    $subtotalItem = $unitPrice * $item->quantity;
                                @endphp
                                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 p-3.5 bg-stone-50/70 rounded-xl border border-stone-200">
                                    <div class="flex items-start gap-3 min-w-0">
                                        <div class="w-16 h-16 sm:w-20 sm:h-20 rounded-lg overflow-hidden bg-stone-100 border border-stone-200 shrink-0 aspect-square">
                                            <img src="{{ $prod->image ?? '' }}" alt="{{ $prod->name ?? '' }}" class="w-full h-full object-cover">
                                        </div>
                                        <div class="min-w-0 flex-1">
                                            <span class="text-[10px] font-bold text-orange-600 uppercase tracking-wider">
                                                {{ $prod->category ?? 'Kayu Solid' }} &bull; {{ $prod->wood_type ?? 'Jati/Sungkai' }}
                                            </span>
                                            <h3 class="text-xs sm:text-sm font-bold text-stone-900 leading-snug line-clamp-1 mt-0.5">
                                                {{ $prod->name ?? 'Produk Pande Oka' }}
                                            </h3>

                                            {{-- Custom Variation / Dimensions Tag --}}
                                            <div class="mt-1.5 inline-flex flex-wrap items-center gap-1.5 px-2.5 py-1 bg-orange-100/70 border border-orange-200 text-orange-900 rounded-md text-[11px] font-semibold">
                                                <svg class="w-3.5 h-3.5 text-orange-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"/>
                                                </svg>
                                                <span>{{ $item->variation ?? 'Standar Workshop' }}</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex sm:flex-col items-baseline sm:items-end justify-between border-t sm:border-t-0 pt-2 sm:pt-0 border-stone-200 shrink-0 text-right">
                                        <div class="text-[11px] text-stone-500">
                                            {{ $item->quantity }} x Rp {{ number_format($unitPrice, 0, ',', '.') }}
                                        </div>
                                        <span class="text-sm sm:text-base font-black text-orange-600">
                                            Rp {{ number_format($subtotalItem, 0, ',', '.') }}
                                        </span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- Section 3: Pilihan Metode Pembayaran --}}
                    <div class="bg-white rounded-xl sm:rounded-2xl border border-stone-200 p-4 sm:p-6 shadow-xs">
                        <div class="flex items-center justify-between pb-3 sm:pb-4 border-b border-stone-100 mb-4">
                            <h2 class="text-sm sm:text-base font-black text-stone-900 uppercase tracking-wider flex items-center gap-2">
                                <span class="w-6 h-6 rounded-md bg-orange-600 text-white flex items-center justify-center text-xs">3</span>
                                <span>Metode Pembayaran</span>
                            </h2>
                            <span class="text-xs text-stone-500">Pilih salah satu</span>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-2.5 sm:gap-3 text-xs">
                            {{-- Option 1: Bayar saat Pengambilan di Workshop (Default) --}}
                            <label class="relative flex flex-col p-3.5 border-2 border-orange-600 bg-orange-50/50 rounded-xl cursor-pointer hover:bg-orange-50 transition-colors">
                                <input type="radio" name="payment_method" value="Bayar di Workshop (Cash/EDC/Transfer)" checked class="sr-only payment-radio" onchange="selectPaymentMethod(this)">
                                <div class="flex items-center justify-between mb-1">
                                    <strong class="text-stone-900 font-bold">Bayar di Workshop</strong>
                                    <span class="w-4 h-4 rounded-full border-2 border-orange-600 flex items-center justify-center">
                                        <span class="w-2 h-2 rounded-full bg-orange-600"></span>
                                    </span>
                                </div>
                                <span class="text-[11px] text-stone-500 mt-1">
                                    Pelunasan saat serah-terima fisik furniture di workshop Bali.
                                </span>
                            </label>

                            {{-- Option 2: Transfer Bank / Virtual Account --}}
                            <label class="relative flex flex-col p-3.5 border border-stone-300 bg-white rounded-xl cursor-pointer hover:border-orange-500 transition-colors">
                                <input type="radio" name="payment_method" value="Transfer Bank Virtual Account" class="sr-only payment-radio" onchange="selectPaymentMethod(this)">
                                <div class="flex items-center justify-between mb-1">
                                    <strong class="text-stone-900 font-bold">Transfer Bank</strong>
                                    <span class="w-4 h-4 rounded-full border-2 border-stone-300 flex items-center justify-center check-dot">
                                        <span class="w-2 h-2 rounded-full bg-transparent"></span>
                                    </span>
                                </div>
                                <span class="text-[11px] text-stone-500 mt-1">
                                    BCA, Mandiri, BNI, BRI. Bukti transfer dicocokkan ke SPK.
                                </span>
                            </label>

                            {{-- Option 3: QRIS Instan --}}
                            <label class="relative flex flex-col p-3.5 border border-stone-300 bg-white rounded-xl cursor-pointer hover:border-orange-500 transition-colors">
                                <input type="radio" name="payment_method" value="QRIS Instan" class="sr-only payment-radio" onchange="selectPaymentMethod(this)">
                                <div class="flex items-center justify-between mb-1">
                                    <strong class="text-stone-900 font-bold">QRIS Instan</strong>
                                    <span class="w-4 h-4 rounded-full border-2 border-stone-300 flex items-center justify-center check-dot">
                                        <span class="w-2 h-2 rounded-full bg-transparent"></span>
                                    </span>
                                </div>
                                <span class="text-[11px] text-stone-500 mt-1">
                                    Gopay, OVO, ShopeePay, Dana, &amp; seluruh m-banking.
                                </span>
                            </label>
                        </div>
                    </div>

                </div>

                {{-- Right Column (4 cols): Rincian Pembayaran & Tombol Beli Unduh Excel --}}
                <div class="lg:col-span-4 space-y-4">

                    {{-- Sticky Summary Card --}}
                    <div class="bg-white rounded-xl sm:rounded-2xl border border-stone-200 p-4 sm:p-6 shadow-xs sticky top-24">
                        <h3 class="text-xs sm:text-sm font-black text-stone-900 uppercase tracking-wider pb-3 border-b border-stone-100 flex items-center justify-between">
                            <span>Ringkasan Pembayaran</span>
                            <span class="text-[10px] text-orange-600 font-bold normal-case">SPK Workshop</span>
                        </h3>

                        {{-- Voucher Code Box --}}
                        <div class="py-3.5 border-b border-stone-100">
                            <label class="block text-[11px] font-bold text-stone-700 uppercase tracking-wider mb-1.5 flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"/>
                                </svg>
                                <span>Voucher Diskon Toko</span>
                            </label>
                            <div class="flex items-center gap-2">
                                <input type="text" 
                                       id="voucher-checkout-input" 
                                       value="{{ $voucherCode }}" 
                                       placeholder="Kode: PANDEOKA2026"
                                       class="flex-1 px-2.5 py-1.5 bg-stone-50 border border-stone-300 rounded text-xs font-semibold text-stone-900 uppercase outline-none focus:border-orange-600">
                                <button type="button" 
                                        onclick="applyCheckoutVoucher()" 
                                        class="px-3 py-1.5 bg-stone-900 hover:bg-orange-600 text-white font-bold text-xs rounded transition-colors">
                                    Gunakan
                                </button>
                            </div>
                            <span id="voucher-checkout-note" class="text-[10px] text-orange-700 font-semibold block mt-1">
                                Kupon PANDEOKA2026 aktif (Potongan Rp 250.000)
                            </span>
                        </div>

                        {{-- Cost Breakdown --}}
                        <div class="py-3 space-y-2 text-xs">
                            <div class="flex justify-between text-stone-600">
                                <span>Subtotal Produk:</span>
                                <span class="font-bold text-stone-900" id="subtotal-display">
                                    Rp {{ number_format($subtotal, 0, ',', '.') }}
                                </span>
                            </div>

                            <div class="flex justify-between text-green-700 font-semibold" id="voucher-discount-row">
                                <span>Diskon Voucher Toko:</span>
                                <span id="voucher-discount-display">- Rp {{ number_format($voucherDiscount, 0, ',', '.') }}</span>
                            </div>

                            <div class="flex justify-between text-stone-600">
                                <span>Biaya Pengiriman:</span>
                                <span class="font-bold text-stone-900">
                                    Rp 0 (Tanpa Pengiriman / Self-Pickup)
                                </span>
                            </div>

                            <div class="pt-3 border-t border-stone-200 flex items-baseline justify-between">
                                <div>
                                    <strong class="text-xs sm:text-sm font-black text-stone-900 block uppercase">Total Tagihan:</strong>
                                    <span class="text-[10px] text-stone-500">Termasuk PPN 11%</span>
                                </div>
                                <span id="grandtotal-display" class="text-lg sm:text-2xl font-black text-orange-600">
                                    Rp {{ number_format($grandTotal, 0, ',', '.') }}
                                </span>
                            </div>
                        </div>

                        {{-- Big Buy Action Button --}}
                        <div class="mt-4 pt-3 border-t border-stone-100">
                            <button type="submit" 
                                    id="btn-submit-order"
                                    class="w-full py-3.5 px-4 bg-orange-600 hover:bg-orange-700 active:scale-[0.99] text-white font-black text-xs sm:text-sm uppercase tracking-wider rounded-xl transition-all shadow-md flex items-center justify-center gap-2">
                                <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                                <span>Konfirmasi &amp; Unduh SPK Excel</span>
                            </button>
                            <p class="text-[10px] text-stone-400 text-center mt-2 leading-tight">
                                File Excel (.xls) otomatis diunduh saat tombol ditekan.
                            </p>
                        </div>

                        {{-- Security and Trust points --}}
                        <div class="mt-5 pt-4 border-t border-stone-100 space-y-1.5 text-[11px] text-stone-600">
                            <div class="flex items-center gap-2">
                                <span class="text-orange-600 font-bold">✓</span>
                                <span>100% Kayu Solid Alami (Sertifikasi Legal SVLK)</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="text-orange-600 font-bold">✓</span>
                                <span>Garansi Konstruksi Rangka 5 Tahun Resmi</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="text-orange-600 font-bold">✓</span>
                                <span>Pelayanan Serah Terima Langsung di Workshop</span>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </form>

    </div>
</div>

{{-- Order Success & Excel Downloaded Modal --}}
<div id="checkout-success-modal" class="fixed inset-0 z-50 hidden flex items-center justify-center p-4">
    <div class="fixed inset-0 bg-stone-900/60 backdrop-blur-xs transition-opacity" onclick="closeCheckoutSuccessModal()"></div>
    <div class="relative bg-white rounded-2xl max-w-lg w-full p-6 sm:p-8 shadow-2xl border border-stone-200 z-10 text-center animate-in fade-in zoom-in duration-200">
        
        <div class="w-16 h-16 bg-green-100 text-green-600 rounded-full flex items-center justify-center mx-auto mb-4 ring-8 ring-green-50">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
            </svg>
        </div>

        <span class="px-2.5 py-1 bg-orange-100 text-orange-700 font-bold text-[10px] sm:text-xs rounded-full uppercase tracking-wider">
            Surat Perintah Kerja (SPK) Excel
        </span>

        <h3 class="text-xl sm:text-2xl font-black text-stone-900 mt-2 tracking-tight">
            Pesanan Berhasil Diproses!
        </h3>

        <p class="text-stone-600 text-xs sm:text-sm mt-2 leading-relaxed">
            File <strong>SPK Pesanan Workshop (.xls)</strong> telah otomatis diunduh ke perangkat Anda. 
            Karena <strong>tidak ada pengiriman ekspedisi</strong>, silakan tunjukkan file Excel ini saat serah-terima di Workshop Pande Oka Bali.
        </p>

        <div class="bg-stone-50 border border-stone-200 rounded-xl p-3.5 my-5 text-left text-xs space-y-1.5">
            <div class="flex justify-between text-stone-500">
                <span>Status Serah Terima:</span>
                <strong class="text-stone-900">Self-Pickup di Workshop (Tanpa Ekspedisi)</strong>
            </div>
            <div class="flex justify-between text-stone-500">
                <span>Alamat Workshop:</span>
                <span class="text-stone-800 text-right font-medium">Jl. Sunset Road No. 88, Kuta, Bali</span>
            </div>
            <div class="flex justify-between text-stone-500">
                <span>Estimasi Pengerjaan:</span>
                <strong class="text-orange-600">7 - 14 Hari Kerja</strong>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-2.5">
            <a href="https://wa.me/6281234567890?text=Halo%20Pande%20Oka,%20saya%20sudah%20membuat%20pesanan%20kustom%20dengan%20SPK%20Excel.%20Mohon%20konfirmasi%20jadwal%20produksi." 
               target="_blank"
               class="w-full py-3 px-4 bg-green-600 hover:bg-green-700 text-white font-bold text-xs uppercase tracking-wider rounded-xl transition-all shadow-xs flex items-center justify-center gap-1.5">
                <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0 0 12.04 2zm.01 1.67c4.54 0 8.24 3.7 8.24 8.24 0 2.2-.86 4.28-2.42 5.84a8.18 8.18 0 0 1-5.83 2.41c-1.47 0-2.91-.39-4.18-1.15l-.3-.18-3.11.82.83-3.03-.2-.31a8.18 8.18 0 0 1-1.27-4.4c0-4.54 3.7-8.24 8.24-8.24zm4.52 11.64c-.25-.13-1.47-.72-1.7-.81-.23-.08-.39-.13-.56.13-.17.25-.64.81-.79.97-.14.17-.29.19-.54.06-.25-.13-1.07-.39-2.03-1.25-.75-.67-1.26-1.5-1.41-1.75-.15-.25-.02-.39.11-.51.11-.11.25-.29.38-.44.13-.15.17-.25.25-.42.08-.17.04-.32-.02-.45-.06-.13-.56-1.35-.77-1.85-.2-.49-.41-.42-.56-.43h-.48c-.17 0-.44.06-.67.31-.23.25-.88.86-.88 2.1 0 1.24.9 2.44 1.03 2.61.13.17 1.78 2.72 4.31 3.81.6.26 1.07.41 1.44.53.61.19 1.16.17 1.6.1.49-.07 1.47-.6 1.68-1.18.21-.58.21-1.08.15-1.18-.06-.11-.23-.17-.48-.29z"/></svg>
                <span>Konfirmasi via WA</span>
            </a>
            <a href="{{ url('/') }}" 
               class="w-full py-3 px-4 bg-stone-100 hover:bg-stone-200 text-stone-800 font-bold text-xs uppercase tracking-wider rounded-xl transition-all flex items-center justify-center">
                Kembali ke Beranda
            </a>
        </div>

    </div>
</div>

@push('scripts')
<script>
    let currentSubtotal = {{ $subtotal }};
    let currentVoucherDiscount = {{ $voucherDiscount }};

    function selectPaymentMethod(radio) {
        document.querySelectorAll('.payment-radio').forEach(r => {
            const label = r.closest('label');
            const dot = label.querySelector('.check-dot span');
            label.classList.remove('border-2', 'border-orange-600', 'bg-orange-50/50');
            label.classList.add('border-stone-300', 'bg-white');
            if (dot) {
                dot.classList.remove('bg-orange-600');
                dot.classList.add('bg-transparent');
            }
        });

        const activeLabel = radio.closest('label');
        activeLabel.classList.remove('border-stone-300', 'bg-white');
        activeLabel.classList.add('border-2', 'border-orange-600', 'bg-orange-50/50');
        const activeDot = activeLabel.querySelector('.check-dot span') || activeLabel.querySelector('span span');
        if (activeDot) {
            activeDot.classList.remove('bg-transparent');
            activeDot.classList.add('bg-orange-600');
        }
    }

    function applyCheckoutVoucher() {
        const input = document.getElementById('voucher-checkout-input');
        const code = input ? input.value.trim().toUpperCase() : '';
        const note = document.getElementById('voucher-checkout-note');
        const hiddenInput = document.getElementById('hidden-voucher-input');

        if (code === 'PANDEOKA2026' && currentSubtotal >= 500000) {
            currentVoucherDiscount = 250000;
            if (hiddenInput) hiddenInput.value = 'PANDEOKA2026';
            if (note) note.innerText = 'Kupon PANDEOKA2026 aktif (Potongan Rp 250.000)';
            showToast('Voucher Berhasil', 'Potongan Rp 250.000 berhasil diterapkan ke tagihan!');
        } else if (code === '') {
            currentVoucherDiscount = 0;
            if (hiddenInput) hiddenInput.value = '';
            if (note) note.innerText = 'Tidak ada voucher digunakan';
        } else {
            alert('Kode voucher tidak valid atau minimal transaksi Rp 500.000.');
            return;
        }

        updateDisplayTotals();
    }

    function updateDisplayTotals() {
        const discountDisplay = document.getElementById('voucher-discount-display');
        const grandTotalDisplay = document.getElementById('grandtotal-display');

        const finalTotal = Math.max(0, currentSubtotal - currentVoucherDiscount);

        if (discountDisplay) {
            discountDisplay.innerText = '- Rp ' + currentVoucherDiscount.toLocaleString('id-ID');
        }
        if (grandTotalDisplay) {
            grandTotalDisplay.innerText = 'Rp ' + finalTotal.toLocaleString('id-ID');
        }
    }

    function handleCheckoutSubmit(event) {
        // Allow the form submit to proceed so the file download triggers
        // Open the modal after 500ms
        setTimeout(() => {
            const modal = document.getElementById('checkout-success-modal');
            if (modal) {
                modal.classList.remove('hidden');
                document.body.classList.add('overflow-hidden');
            }
        }, 500);
    }

    function closeCheckoutSuccessModal() {
        const modal = document.getElementById('checkout-success-modal');
        if (modal) {
            modal.classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
            window.location.href = "{{ url('/') }}";
        }
    }
</script>
@endpush

@endsection
