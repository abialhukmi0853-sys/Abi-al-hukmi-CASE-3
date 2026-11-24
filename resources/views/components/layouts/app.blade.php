<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'CatatanKu' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-900 min-h-screen">
    <header class="bg-white shadow" x-data="{ open: false }">
        <div class="max-w-4xl mx-auto px-4 py-3 flex items-center justify-between">
            <span class="font-bold text-lg">CatatanKu</span>

            <nav class="hidden md:flex items-center gap-4 text-sm">
                <a href="{{ route('dashboard') }}">Dashboard</a>
                <a href="{{ route('notes.index') }}">Catatan</a>
                <a href="{{ route('notes.trash') }}">Tong Sampah</a>
            </nav>

            <button @click="open = !open" class="md:hidden p-2" aria-label="Menu">
                <span x-show="!open">☰</span>
                <span x-show="open" x-cloak>✕</span>
            </button>
        </div>

        <nav x-show="open" x-cloak x-transition class="md:hidden px-4 pb-4 flex flex-col gap-3 text-sm">
            <a href="{{ route('dashboard') }}">Dashboard</a>
            <a href="{{ route('notes.index') }}">Catatan</a>
            <a href="{{ route('notes.trash') }}">Tong Sampah</a>
        </nav>
    </header>

    <main class="max-w-4xl mx-auto p-4 md:p-6">
        {{ $slot }}
    </main>

    @fluxScripts
</body>
</html>