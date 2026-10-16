<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Super Admin - Pande Oka Furniture</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-stone-50 min-h-screen text-stone-900 font-sans flex flex-col">
    <header class="bg-white border-b border-stone-200 px-6 py-4 flex items-center justify-between">
        <div class="flex items-center gap-3">
            <span class="font-bold text-lg text-stone-900 tracking-tight">Pande Oka</span>
            <span class="text-xs bg-amber-100 text-amber-800 font-semibold px-2.5 py-0.5 rounded-full border border-amber-200">Super Admin</span>
        </div>
        <div class="flex items-center gap-4">
            <span class="text-sm text-stone-600">{{ auth()->user()?->name ?? 'Super Admin' }} ({{ auth()->user()?->email }})</span>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="text-xs font-semibold px-3.5 py-1.5 bg-stone-900 hover:bg-stone-800 text-white rounded-md transition-colors cursor-pointer">
                    Keluar (Logout)
                </button>
            </form>
        </div>
    </header>

    <main class="flex-1 p-6">
        {{-- Konten dikosongkan sementara sesuai request user --}}
    </main>
</body>
</html>
