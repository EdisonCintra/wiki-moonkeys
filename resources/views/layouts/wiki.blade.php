<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Wiki Moonkeys' }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body class="min-h-screen bg-white text-zinc-800 antialiased dark:bg-zinc-900 dark:text-zinc-200">

<header class="border-b border-zinc-200 bg-white/80 px-6 py-4 backdrop-blur dark:border-zinc-800 dark:bg-zinc-900/80 sticky top-0 z-50">
    <div class="mx-auto flex max-w-7xl items-center justify-between">
        <div class="flex items-center gap-2 font-bold text-xl tracking-tight">
            <span class="text-purple-600">🌕</span> Wiki MoonKeys
        </div>

    </div>
</header>

<main class="mx-auto max-w-7xl px-6 py-8">
    {{ $slot }}
</main>


</body>
</html>
