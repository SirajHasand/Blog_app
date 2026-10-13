
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'My Blog') }}</title>

    <meta name="theme-color" content="#020617">
    <meta name="description" content="Sign in to your account and continue to My Blog.">

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet">

    {{-- Application CSS and JS --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-slate-950 font-sans antialiased text-white">

    {{-- Full-screen wrapper: no extra card, padding, or width restriction --}}
    <div class="min-h-screen w-full">
        {{ $slot }}
    </div>

</body>
</html>
