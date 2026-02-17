<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Wiki Moonkeys' }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600&display=swap" rel="stylesheet"/>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-[#0B1220] text-[#E2E8F0] antialiased ">

<header class="border-b border-[#1E293B] bg-[#0B1220]/80 px-6 py-4 backdrop-blur-md sticky top-0 z-50">
    <div class="mx-auto flex max-w-7xl items-center justify-between">
        <div class="flex items-center gap-3 font-bold text-xl tracking-tight text-[#F8FAFC]">

            <!-- Ícone lunar -->
            <a href="/" class="flex items-center gap-3 font-bold text-xl tracking-tight">

                <span class="text-[#FACC15] drop-shadow-[0_0_6px_rgba(250,204,21,0.4)] transition hover:scale-110">
                    🌕
                </span>

                <span class="bg-gradient-to-r from-[#E2E8F0] to-[#60A5FA] bg-clip-text text-transparent">
                    Wiki MoonKeys
                </span>

            </a>

        </div>
    </div>
</header>

<main class="mx-auto max-w-7xl px-4 md:px-6 py-8">
    {{ $slot }}
</main>

</body>
</html>
