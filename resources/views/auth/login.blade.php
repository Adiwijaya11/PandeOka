@extends('layouts.app')

@section('title', 'Masuk ke Akun - Pande Oka Furniture & Living')
@section('meta_description', 'Masuk ke akun Pande Oka Furniture untuk melihat riwayat pesanan, melacak pengiriman furniture kayu solid, dan penawaran khusus member.')

@section('content')
{{-- Full-Page Standalone Auth Container (100svh on all screens, No Navbar & No Footer) --}}
<div class="bg-stone-100 h-[100svh] max-h-[100svh] w-full flex flex-col items-center justify-center p-3 sm:p-5 lg:p-6 font-sans overflow-hidden">
    
    <div class="max-w-md lg:max-w-5xl xl:max-w-6xl w-full h-[calc(100svh-1.5rem)] sm:h-[calc(100svh-2.5rem)] lg:h-[620px] xl:h-[640px] max-h-full flex flex-col gap-2 sm:gap-3 my-auto">
        
        {{-- Quick Back to Store Bar --}}
        <div class="flex items-center justify-between px-1 shrink-0">
            <a href="{{ url('/') }}" class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-stone-600 hover:text-orange-600 bg-white hover:bg-stone-50 border border-stone-200 px-3.5 py-1.5 sm:py-2 rounded-xl transition-all shadow-2xs group">
                <svg class="w-4 h-4 text-stone-500 group-hover:text-orange-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                <span>Kembali ke Toko</span>
            </a>

            <div class="text-[11px] font-semibold text-stone-400 hidden sm:block">
                Pande Oka Official Bali &bull; Jepara
            </div>
        </div>

        {{-- Split Login Card (Mobile: Form Only, Desktop: 2 Sections) --}}
        <div class="flex-1 min-h-0 bg-white rounded-2xl sm:rounded-3xl border border-stone-200 shadow-xl lg:shadow-2xl overflow-hidden grid grid-cols-1 lg:grid-cols-12 h-full">
            
            {{-- Section Kiri: Heading Website (Hidden on Mobile, Visible on Desktop lg+) --}}
            <div class="hidden lg:flex lg:col-span-5 bg-stone-900 text-white p-8 lg:p-10 xl:p-12 flex-col justify-between relative overflow-hidden h-full">
                {{-- Background Image with Solid Dark Overlay (No Gradients) --}}
                <div class="absolute inset-0 z-0">
                    <img src="https://images.unsplash.com/photo-1616486338812-3dadae4b4ace?auto=format&fit=crop&w=1600&q=85" 
                         alt="Interior Kayu Solid Pande Oka" 
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

                        {{-- Middle Heading & Tagline --}}
                        <div class="mt-6 lg:mt-8 xl:mt-10">
                            <div class="inline-flex items-center gap-2 px-3 py-1 bg-orange-600 text-white text-[11px] font-black uppercase tracking-wider rounded-md mb-3 shadow-xs">
                                <span class="w-1.5 h-1.5 rounded-full bg-white"></span>
                                <span>Kayu Solid Asli</span>
                            </div>
                            
                            {{-- Main Heading --}}
                            <h1 class="text-2xl lg:text-3xl xl:text-4xl font-black text-white tracking-tight leading-tight">
                                FURNITURE KAYU SOLID <span class="text-orange-500">BERKUALITAS</span>
                            </h1>

                            {{-- Clean Tagline --}}
                            <p class="text-xs sm:text-sm text-stone-300 mt-3 leading-relaxed font-normal">
                                Kehangatan serat alami kayu jati &amp; sungkai Jepara-Bali untuk menyempurnakan setiap sudut hunian Anda.
                            </p>
                        </div>
                    </div>

                    {{-- Minimalist Bottom Note --}}
                    <div class="pt-4 border-t border-white/10 mt-6">
                        <p class="text-[11px] sm:text-xs text-stone-400 leading-relaxed">
                            Garansi Konstruksi 5 Tahun &bull; Sertifikasi Legal SVLK &bull; Pengiriman Seluruh Indonesia
                        </p>
                    </div>
                </div>
            </div>

            {{-- Section Kanan: Form Login (No scroll, perfectly fitted) --}}
            <div class="col-span-12 lg:col-span-7 p-4 sm:p-6 lg:p-8 xl:p-10 flex flex-col justify-center bg-white h-full overflow-hidden">
                
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

                    {{-- Form Title --}}
                    <div class="mb-3 sm:mb-4 text-center sm:text-left">
                        <span class="text-[11px] font-bold text-orange-600 uppercase tracking-widest block mb-0.5">Selamat Datang</span>
                        <h2 class="text-xl sm:text-2xl font-black text-stone-900 tracking-tight">
                            Masuk ke Akun
                        </h2>
                        <p class="text-xs sm:text-sm text-stone-500 mt-0.5 leading-snug">
                            Silakan masukkan email dan kata sandi akun Pande Oka Anda.
                        </p>
                    </div>

                    {{-- Feedback Alerts --}}
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

                    @if (session('success'))
                        <div class="mb-3 p-3 bg-green-50 border border-green-200 rounded-xl text-xs text-green-700 flex items-center gap-2">
                            <svg class="w-3.5 h-3.5 text-green-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            <span>{{ session('success') }}</span>
                        </div>
                    @endif

                    {{-- Login Form --}}
                    <form action="{{ route('login.submit') }}" method="POST" class="space-y-3 sm:space-y-3.5">
                        @csrf

                        {{-- Email Field --}}
                        <div>
                            <label for="email" class="block text-[11px] sm:text-xs font-bold text-stone-800 uppercase tracking-wider mb-1.5">
                                Alamat Email
                            </label>
                            <div class="relative">
                                <input type="email" 
                                       id="email" 
                                       name="email" 
                                       value="{{ old('email') }}" 
                                       required 
                                       autofocus
                                       autocomplete="username"
                                       placeholder="nama@email.com" 
                                       class="w-full px-3.5 sm:px-4 py-2.5 sm:py-3 text-xs sm:text-sm rounded-xl border border-stone-300 text-stone-900 placeholder-stone-400 focus:outline-none focus:border-orange-600 focus:ring-1 focus:ring-orange-600 transition-colors">
                                <div class="absolute inset-y-0 right-0 pr-3.5 flex items-center pointer-events-none text-stone-400">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        {{-- Password Field with Show/Hide Toggle --}}
                        <div>
                            <div class="flex items-center justify-between mb-1.5">
                                <label for="password" class="block text-[11px] sm:text-xs font-bold text-stone-800 uppercase tracking-wider">
                                    Kata Sandi
                                </label>
                                <a href="#" 
                                   onclick="event.preventDefault(); alert('Silakan hubungi WhatsApp CS kami di +62 812-3456-7890 untuk bantuan reset akun.');"
                                   class="text-[11px] sm:text-xs text-orange-600 hover:text-orange-700 font-semibold transition-colors">
                                    Lupa Sandi?
                                </a>
                            </div>
                            <div class="relative">
                                <input type="password" 
                                       id="password" 
                                       name="password" 
                                       required 
                                       autocomplete="current-password"
                                       placeholder="••••••••" 
                                       class="w-full px-3.5 sm:px-4 py-2.5 sm:py-3 text-xs sm:text-sm rounded-xl border border-stone-300 text-stone-900 placeholder-stone-400 focus:outline-none focus:border-orange-600 focus:ring-1 focus:ring-orange-600 transition-colors pr-11">
                                <button type="button" 
                                        id="toggle-password-btn" 
                                        onclick="togglePasswordVisibility()" 
                                        class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-stone-400 hover:text-stone-700 focus:outline-none"
                                        aria-label="Lihat kata sandi">
                                    <svg id="eye-icon" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                    <svg id="eye-off-icon" class="w-4 h-4 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l18 18" />
                                    </svg>
                                </button>
                            </div>
                        </div>

                        {{-- Remember Me Checkbox --}}
                        <div class="flex items-center justify-between pt-0.5">
                            <label class="flex items-center gap-2 cursor-pointer select-none">
                                <input type="checkbox" 
                                       name="remember" 
                                       value="1"
                                       checked 
                                       class="w-3.5 h-3.5 text-orange-600 border-stone-300 rounded focus:ring-orange-500 accent-orange-600">
                                <span class="text-xs text-stone-600 font-medium">Ingat saya di perangkat ini</span>
                            </label>
                        </div>

                        {{-- Submit Button --}}
                        <div class="pt-1.5">
                            <button type="submit" 
                                    class="w-full py-3 sm:py-3.5 px-5 bg-orange-600 hover:bg-orange-700 text-white font-bold text-xs sm:text-sm uppercase tracking-wider rounded-xl transition-colors shadow-sm active:scale-[0.99] flex items-center justify-center gap-2">
                                <span>Masuk ke Akun</span>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                </svg>
                            </button>
                        </div>
                    </form>

                    {{-- Register Link --}}
                    <div class="mt-4 pt-3.5 border-t border-stone-100 text-center">
                        <p class="text-xs sm:text-sm text-stone-600">
                            Belum memiliki akun Pande Oka? 
                            <a href="{{ route('register') }}" 
                               class="font-bold text-orange-600 hover:text-orange-700 underline ml-1">
                                Daftar Akun Baru Sekarang
                            </a>
                        </p>
                    </div>
                </div>

            </div>

        </div>

    </div>
</div>

{{-- Password Show/Hide Toggle Script --}}
<script>
    function togglePasswordVisibility() {
        const input = document.getElementById('password');
        const eyeIcon = document.getElementById('eye-icon');
        const eyeOffIcon = document.getElementById('eye-off-icon');

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
