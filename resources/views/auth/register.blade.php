@extends('layouts.app')

@section('title', 'Daftar Akun Baru - Pande Oka Furniture & Living')
@section('meta_description', 'Daftarkan akun member Pande Oka Furniture. Lengkapi alamat dan nomor telepon untuk pengiriman furniture kayu solid bergaransi 5 tahun.')

@section('content')
{{-- Full-Page Standalone Auth Container (100svh on all screens, No Navbar & No Footer) --}}
<div class="bg-stone-100 h-[100svh] max-h-[100svh] w-full flex flex-col items-center justify-center p-3 sm:p-5 lg:p-6 font-sans overflow-hidden">
    
    <div class="max-w-md lg:max-w-5xl xl:max-w-6xl w-full h-[calc(100svh-1.5rem)] sm:h-[calc(100svh-2.5rem)] lg:h-[620px] xl:h-[640px] max-h-full flex flex-col gap-2 sm:gap-3 my-auto">
        
        {{-- Quick Navigation Bar --}}
        <div class="flex items-center justify-between px-1 shrink-0">
            <a href="{{ url('/') }}" class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-stone-600 hover:text-orange-600 bg-white hover:bg-stone-50 border border-stone-200 px-3.5 py-1.5 sm:py-2 rounded-xl transition-all shadow-2xs group">
                <svg class="w-4 h-4 text-stone-500 group-hover:text-orange-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                <span>Kembali ke Beranda</span>
            </a>

            <div class="text-[11px] font-semibold text-stone-400 hidden sm:block">
                Pande Oka Official Bali &bull; Jepara
            </div>
        </div>

        {{-- Split Register Card (Exact Same Sizing & Grid Ratio as Login: 5 Cols Left, 7 Cols Right) --}}
        <div class="flex-1 min-h-0 bg-white rounded-2xl sm:rounded-3xl border border-stone-200 shadow-xl lg:shadow-2xl overflow-hidden grid grid-cols-1 lg:grid-cols-12 h-full">
            
            {{-- Section Kiri: Heading Website (Hidden on Mobile, Visible on Desktop lg+ 5 cols) --}}
            <div class="hidden lg:flex lg:col-span-5 bg-stone-900 text-white p-8 lg:p-10 xl:p-12 flex-col justify-between relative overflow-hidden h-full">
                {{-- Background Image with Solid Dark Overlay (No Gradients) --}}
                <div class="absolute inset-0 z-0">
                    <img src="https://images.unsplash.com/photo-1618221195710-dd6b41faaea6?auto=format&fit=crop&w=1600&q=85" 
                         alt="Workshop Furniture Kayu Solid" 
                         class="w-full h-full object-cover object-center brightness-50">
                    <div class="absolute inset-0 bg-stone-950/85"></div>
                </div>

                {{-- Left Content Container --}}
                <div class="relative z-10 flex flex-col justify-between h-full">
                    <div>
                        {{-- Brand Logo --}}
                        <a href="{{ url('/') }}" class="inline-block">
                            <span class="font-black text-2xl sm:text-3xl tracking-[0.2em] text-white uppercase block">
                                PANDE OKA<span class="text-orange-500">.</span>
                            </span>
                            <span class="text-[10px] sm:text-xs text-stone-400 tracking-[0.3em] uppercase block font-semibold mt-1">
                                Furniture &amp; Living
                            </span>
                        </a>

                        {{-- Main Heading & Statement --}}
                        <div class="mt-6 lg:mt-8 xl:mt-10">
                            <div class="inline-flex items-center gap-2 px-3 py-1 bg-orange-600 text-white text-[11px] font-black uppercase tracking-wider rounded-md mb-3 shadow-xs">
                                <span class="w-1.5 h-1.5 rounded-full bg-white"></span>
                                <span>Pendaftaran Member</span>
                            </div>
                            
                            <h1 class="text-2xl lg:text-3xl xl:text-4xl font-black text-white tracking-tight leading-tight">
                                GABUNG BERSAMA <span class="text-orange-500">PANDE OKA</span>
                            </h1>

                            <p class="text-xs sm:text-sm text-stone-300 mt-3 leading-relaxed font-normal">
                                Dapatkan kemudahan berbelanja furniture kayu solid asli dengan garansi konstruksi 5 tahun dan layanan pengiriman terpercaya.
                            </p>

                            {{-- Clean Perks List (Minimal, SVG Icons, No Emoji) --}}
                            <div class="mt-6 pt-5 border-t border-white/10 space-y-2.5 text-xs text-stone-200">
                                <div class="flex items-center gap-2.5">
                                    <div class="w-5 h-5 rounded-full bg-orange-600/30 text-orange-400 flex items-center justify-center shrink-0">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                                    </div>
                                    <span>Pelacakan ekspedisi truk real-time</span>
                                </div>
                                <div class="flex items-center gap-2.5">
                                    <div class="w-5 h-5 rounded-full bg-orange-600/30 text-orange-400 flex items-center justify-center shrink-0">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                                    </div>
                                    <span>Garansi rangka resmi 5 tahun terdata</span>
                                </div>
                                <div class="flex items-center gap-2.5">
                                    <div class="w-5 h-5 rounded-full bg-orange-600/30 text-orange-400 flex items-center justify-center shrink-0">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                                    </div>
                                    <span>Konsultasi dimensi custom gratis</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Bottom Legal Badge --}}
                    <div class="pt-4 border-t border-white/10 mt-6">
                        <p class="text-[11px] sm:text-xs text-stone-400 leading-relaxed">
                            Sertifikasi SVLK No. 048/SVLK/2026 &bull; Pengrajin Jepara &amp; Bali
                        </p>
                    </div>
                </div>
            </div>

            {{-- Section Kanan: Form Register (Exact Same Width as Login 7 cols, Internal Smooth Scroll Without Visible Scrollbar) --}}
            <div class="col-span-12 lg:col-span-7 h-full flex flex-col bg-white overflow-hidden">
                <div class="h-full overflow-y-auto no-scrollbar [scrollbar-width:none] [-ms-overflow-style:none] [&::-webkit-scrollbar]:hidden p-4 sm:p-6 lg:p-8 xl:p-10 flex flex-col justify-between">
                    <div class="max-w-md w-full mx-auto my-auto">
                        {{-- Mobile-only Brand Header --}}
                        <div class="lg:hidden mb-2 sm:mb-3 text-center">
                            <a href="{{ url('/') }}" class="inline-block">
                                <span class="font-black text-lg sm:text-xl tracking-[0.2em] text-stone-900 uppercase block">
                                    PANDE OKA<span class="text-orange-600">.</span>
                                </span>
                                <span class="text-[9px] text-stone-400 tracking-[0.25em] uppercase block font-semibold">
                                    Furniture &amp; Living
                                </span>
                            </a>
                        </div>

                        {{-- Form Header --}}
                        <div class="mb-3 sm:mb-4 pb-2 border-b border-stone-100 text-center sm:text-left">
                            <span class="text-[11px] font-bold text-orange-600 uppercase tracking-widest block mb-0.5">Formulir Pendaftaran</span>
                            <h2 class="text-xl sm:text-2xl font-black text-stone-900 tracking-tight">
                                Buat Akun Pelanggan Baru
                            </h2>
                            <p class="text-xs sm:text-sm text-stone-500 mt-0.5">
                                Lengkapi data diri dan alamat pengiriman di bawah ini untuk kemudahan transaksi furniture Anda.
                            </p>
                        </div>

                        {{-- Errors Alert --}}
                        @if ($errors->any())
                            <div class="mb-3 p-3 bg-red-50 border border-red-200 rounded-xl text-xs text-red-700 space-y-1">
                                @foreach ($errors->all() as $error)
                                    <div class="flex items-center gap-2">
                                        <svg class="w-3.5 h-3.5 text-red-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                        <span>{{ $error }}</span>
                                    </div>
                                @endforeach
                            </div>
                        @endif

                        {{-- Registration Form --}}
                        <form action="{{ route('register.submit') }}" method="POST" class="space-y-3.5 sm:space-y-4">
                            @csrf

                            {{-- Group 1: Informasi Kontak & Pribadi --}}
                            <div>
                                <div class="text-[11px] sm:text-xs font-black text-stone-900 uppercase tracking-wider mb-2 flex items-center gap-2">
                                    <span class="w-1.5 h-1.5 rounded-full bg-orange-600"></span>
                                    <span>1. Data Pribadi &amp; Kontak</span>
                                </div>

                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-2.5 sm:gap-3">
                                    {{-- Nama Lengkap --}}
                                    <div class="sm:col-span-2">
                                        <label for="name" class="block text-[11px] sm:text-xs font-bold text-stone-700 uppercase tracking-wider mb-1">
                                            Nama Lengkap <span class="text-orange-600">*</span>
                                        </label>
                                        <input type="text" 
                                               id="name" 
                                               name="name" 
                                               value="{{ old('name') }}" 
                                               required 
                                               autocomplete="name"
                                               placeholder="Contoh: I Made Adiwijaya" 
                                               class="w-full px-3.5 sm:px-4 py-2 sm:py-2.5 text-xs sm:text-sm rounded-xl border border-stone-300 text-stone-900 placeholder-stone-400 focus:outline-none focus:border-orange-600 focus:ring-1 focus:ring-orange-600 transition-colors">
                                    </div>

                                    {{-- Alamat Email --}}
                                    <div>
                                        <label for="email" class="block text-[11px] sm:text-xs font-bold text-stone-700 uppercase tracking-wider mb-1">
                                            Alamat Email <span class="text-orange-600">*</span>
                                        </label>
                                        <input type="email" 
                                               id="email" 
                                               name="email" 
                                               value="{{ old('email') }}" 
                                               required 
                                               autocomplete="email"
                                               placeholder="nama@email.com" 
                                               class="w-full px-3.5 sm:px-4 py-2 sm:py-2.5 text-xs sm:text-sm rounded-xl border border-stone-300 text-stone-900 placeholder-stone-400 focus:outline-none focus:border-orange-600 focus:ring-1 focus:ring-orange-600 transition-colors">
                                    </div>

                                    {{-- Nomor Telepon / WhatsApp --}}
                                    <div>
                                        <label for="phone" class="block text-[11px] sm:text-xs font-bold text-stone-700 uppercase tracking-wider mb-1">
                                            No. Telepon / WhatsApp <span class="text-orange-600">*</span>
                                        </label>
                                        <input type="tel" 
                                               id="phone" 
                                               name="phone" 
                                               value="{{ old('phone') }}" 
                                               required 
                                               autocomplete="tel"
                                               placeholder="081234567890" 
                                               class="w-full px-3.5 sm:px-4 py-2 sm:py-2.5 text-xs sm:text-sm rounded-xl border border-stone-300 text-stone-900 placeholder-stone-400 focus:outline-none focus:border-orange-600 focus:ring-1 focus:ring-orange-600 transition-colors">
                                    </div>
                                </div>
                            </div>

                            {{-- Group 2: Alamat Pengiriman Lengkap --}}
                            <div class="pt-1">
                                <div class="text-[11px] sm:text-xs font-black text-stone-900 uppercase tracking-wider mb-2 flex items-center gap-2">
                                    <span class="w-1.5 h-1.5 rounded-full bg-orange-600"></span>
                                    <span>2. Alamat Lengkap Pengiriman Furniture</span>
                                </div>

                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-2.5 sm:gap-3">
                                    {{-- Provinsi --}}
                                    <div>
                                        <label for="province" class="block text-[11px] sm:text-xs font-bold text-stone-700 uppercase tracking-wider mb-1">
                                            Provinsi <span class="text-orange-600">*</span>
                                        </label>
                                        <select id="province" 
                                                name="province" 
                                                required 
                                                autocomplete="address-level1"
                                                class="w-full px-3 py-2 sm:py-2.5 text-xs sm:text-sm rounded-xl border border-stone-300 text-stone-900 bg-white focus:outline-none focus:border-orange-600 focus:ring-1 focus:ring-orange-600 transition-colors">
                                            <option value="">Pilih Provinsi</option>
                                            <option value="Bali" {{ old('province') === 'Bali' ? 'selected' : '' }}>Bali</option>
                                            <option value="Jawa Timur" {{ old('province') === 'Jawa Timur' ? 'selected' : '' }}>Jawa Timur</option>
                                            <option value="Jawa Tengah" {{ old('province') === 'Jawa Tengah' ? 'selected' : '' }}>Jawa Tengah</option>
                                            <option value="DI Yogyakarta" {{ old('province') === 'DI Yogyakarta' ? 'selected' : '' }}>DI Yogyakarta</option>
                                            <option value="Jawa Barat" {{ old('province') === 'Jawa Barat' ? 'selected' : '' }}>Jawa Barat</option>
                                            <option value="DKI Jakarta" {{ old('province') === 'DKI Jakarta' ? 'selected' : '' }}>DKI Jakarta</option>
                                            <option value="Banten" {{ old('province') === 'Banten' ? 'selected' : '' }}>Banten</option>
                                            <option value="Lainnya" {{ old('province') === 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                        </select>
                                    </div>

                                    {{-- Kota / Kabupaten --}}
                                    <div>
                                        <label for="city" class="block text-[11px] sm:text-xs font-bold text-stone-700 uppercase tracking-wider mb-1">
                                            Kota / Kabupaten <span class="text-orange-600">*</span>
                                        </label>
                                        <input type="text" 
                                               id="city" 
                                               name="city" 
                                               value="{{ old('city') }}" 
                                               required 
                                               autocomplete="address-level2"
                                               placeholder="Denpasar / Badung" 
                                               class="w-full px-3.5 sm:px-4 py-2 sm:py-2.5 text-xs sm:text-sm rounded-xl border border-stone-300 text-stone-900 placeholder-stone-400 focus:outline-none focus:border-orange-600 focus:ring-1 focus:ring-orange-600 transition-colors">
                                    </div>

                                    {{-- Kode Pos --}}
                                    <div class="sm:col-span-2">
                                        <label for="postal_code" class="block text-[11px] sm:text-xs font-bold text-stone-700 uppercase tracking-wider mb-1">
                                            Kode Pos <span class="text-orange-600">*</span>
                                        </label>
                                        <input type="text" 
                                               id="postal_code" 
                                               name="postal_code" 
                                               value="{{ old('postal_code') }}" 
                                               required 
                                               autocomplete="postal-code"
                                               placeholder="80361" 
                                               class="w-full px-3.5 sm:px-4 py-2 sm:py-2.5 text-xs sm:text-sm rounded-xl border border-stone-300 text-stone-900 placeholder-stone-400 focus:outline-none focus:border-orange-600 focus:ring-1 focus:ring-orange-600 transition-colors">
                                    </div>

                                    {{-- Detail Alamat Lengkap & Patokan --}}
                                    <div class="sm:col-span-2">
                                        <label for="address" class="block text-[11px] sm:text-xs font-bold text-stone-700 uppercase tracking-wider mb-1">
                                            Alamat &amp; Patokan Lokasi <span class="text-orange-600">*</span>
                                        </label>
                                        <textarea id="address" 
                                                  name="address" 
                                                  rows="2" 
                                                  required 
                                                  autocomplete="street-address"
                                                  placeholder="Nama jalan, nomor rumah, RT/RW, dan patokan lokasi..." 
                                                  class="w-full px-3.5 sm:px-4 py-2 text-xs sm:text-sm rounded-xl border border-stone-300 text-stone-900 placeholder-stone-400 focus:outline-none focus:border-orange-600 focus:ring-1 focus:ring-orange-600 transition-colors">{{ old('address') }}</textarea>
                                    </div>
                                </div>
                            </div>

                            {{-- Group 3: Kata Sandi --}}
                            <div class="pt-1">
                                <div class="text-[11px] sm:text-xs font-black text-stone-900 uppercase tracking-wider mb-2 flex items-center gap-2">
                                    <span class="w-1.5 h-1.5 rounded-full bg-orange-600"></span>
                                    <span>3. Keamanan Kata Sandi</span>
                                </div>

                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-2.5 sm:gap-3">
                                    {{-- Password --}}
                                    <div>
                                        <label for="reg-password" class="block text-[11px] sm:text-xs font-bold text-stone-700 uppercase tracking-wider mb-1">
                                            Kata Sandi <span class="text-orange-600">*</span>
                                        </label>
                                        <div class="relative">
                                            <input type="password" 
                                                   id="reg-password" 
                                                   name="password" 
                                                   required 
                                                   minlength="8" 
                                                   autocomplete="new-password"
                                                   placeholder="Min. 8 karakter" 
                                                   class="w-full px-3.5 sm:px-4 py-2 sm:py-2.5 text-xs sm:text-sm rounded-xl border border-stone-300 text-stone-900 placeholder-stone-400 focus:outline-none focus:border-orange-600 focus:ring-1 focus:ring-orange-600 transition-colors pr-11">
                                            <button type="button" 
                                                    onclick="toggleRegPassword('reg-password', 'reg-eye-1', 'reg-eye-off-1')" 
                                                    class="absolute inset-y-0 right-0 pr-3 flex items-center text-stone-400 hover:text-stone-700 focus:outline-none"
                                                    aria-label="Lihat kata sandi">
                                                <svg id="reg-eye-1" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                                <svg id="reg-eye-off-1" class="w-4 h-4 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l18 18"/></svg>
                                            </button>
                                        </div>
                                    </div>

                                    {{-- Confirm Password --}}
                                    <div>
                                        <label for="password_confirmation" class="block text-[11px] sm:text-xs font-bold text-stone-700 uppercase tracking-wider mb-1">
                                            Konfirmasi Sandi <span class="text-orange-600">*</span>
                                        </label>
                                        <div class="relative">
                                            <input type="password" 
                                                   id="password_confirmation" 
                                                   name="password_confirmation" 
                                                   required 
                                                   minlength="8" 
                                                   autocomplete="new-password"
                                                   placeholder="Ulangi sandi" 
                                                   class="w-full px-3.5 sm:px-4 py-2 sm:py-2.5 text-xs sm:text-sm rounded-xl border border-stone-300 text-stone-900 placeholder-stone-400 focus:outline-none focus:border-orange-600 focus:ring-1 focus:ring-orange-600 transition-colors pr-11">
                                            <button type="button" 
                                                    onclick="toggleRegPassword('password_confirmation', 'reg-eye-2', 'reg-eye-off-2')" 
                                                    class="absolute inset-y-0 right-0 pr-3 flex items-center text-stone-400 hover:text-stone-700 focus:outline-none"
                                                    aria-label="Lihat konfirmasi kata sandi">
                                                <svg id="reg-eye-2" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                                <svg id="reg-eye-off-2" class="w-4 h-4 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l18 18"/></svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Persetujuan Terms --}}
                            <div class="pt-1">
                                <label class="flex items-start gap-2.5 cursor-pointer select-none">
                                    <input type="checkbox" 
                                           required 
                                           checked 
                                           class="w-3.5 h-3.5 text-orange-600 border-stone-300 rounded focus:ring-orange-500 accent-orange-600 mt-0.5">
                                    <span class="text-xs text-stone-600 leading-relaxed">
                                        Saya menyetujui <a href="#" class="text-orange-600 font-semibold underline">Syarat &amp; Ketentuan</a> serta <a href="#" class="text-orange-600 font-semibold underline">Kebijakan Privasi</a> data pelanggan Pande Oka Furniture &amp; Living.
                                    </span>
                                </label>
                            </div>

                            {{-- Submit CTA Button --}}
                            <div class="pt-1.5">
                                <button type="submit" 
                                        class="w-full py-3 sm:py-3.5 px-5 bg-orange-600 hover:bg-orange-700 text-white font-bold text-xs sm:text-sm uppercase tracking-wider rounded-xl transition-colors shadow-sm active:scale-[0.99] flex items-center justify-center gap-2">
                                    <span>Daftar Akun Baru Sekarang</span>
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                    </svg>
                                </button>
                            </div>

                            {{-- Already have account prompt --}}
                            <div class="mt-3.5 pt-3 text-center border-t border-stone-100">
                                <p class="text-xs sm:text-sm text-stone-600">
                                    Sudah memiliki akun Pande Oka? 
                                    <a href="{{ route('login') }}" class="font-bold text-orange-600 hover:text-orange-700 underline ml-1">
                                        Masuk ke Akun Anda
                                    </a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>

{{-- Interactive Password Toggle Script --}}
<script>
    function toggleRegPassword(inputId, eyeId, eyeOffId) {
        const input = document.getElementById(inputId);
        const eyeIcon = document.getElementById(eyeId);
        const eyeOffIcon = document.getElementById(eyeOffId);

        if (input.type === 'password') {
            input.type = 'text';
            eyeIcon.classList.add('hidden');
            eyeOffIcon.classList.remove('hidden');
        } else {
            input.type = 'password';
            eyeIcon.classList.remove('hidden');
            eyeOffIcon.classList.add('hidden');
        }
    }
</script>
@endsection
