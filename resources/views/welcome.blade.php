<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'CatatanKu' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @fluxAppearance
</head>
<body class="min-h-screen bg-zinc-50 text-zinc-900 dark:bg-zinc-900 dark:text-zinc-100">
    <header x-data="{ open: false }" class="border-b border-zinc-200 bg-white dark:border-zinc-700 dark:bg-zinc-800">
        <div class="mx-auto flex max-w-5xl items-center justify-between p-4">
            <a href="{{ route('dashboard') }}" wire:navigate class="text-lg font-bold">CatatanKu</a>
            <button type="button" class="sm:hidden" x-on:click="open = !open" aria-label="Menu">&#9776;</button>
            <nav class="hidden items-center gap-4 sm:flex"><x-nav-links /></nav>
        </div>
        <nav x-show="open" x-transition x-cloak class="flex flex-col gap-3 border-t border-zinc-200 p-4 dark:border-zinc-700 sm:hidden">
            <x-nav-links />
        </nav>
    </header>

    <main class="mx-auto max-w-5xl p-4 sm:p-6">{{ $slot }}</main>

    @fluxScripts
</body>
</html>