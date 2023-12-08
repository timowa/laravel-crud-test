<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js','resources/css/style.css','resources/js/script.js','resources/js/notify.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>

<body class="font-sans antialiased flex" x-data="{openCreateModal : false, openEditModal : false, p_name: '', p_article: '', p_available: '', p_data: '',p_id:''}">
@include('layouts.sidebar')
<div class="min-h-screen bg-gray-100 dark:bg-gray-900 w-screen">
    @include('layouts.navigation')

    <main>
        {{ $slot }}
    </main>
</div>
</body>
</html>
