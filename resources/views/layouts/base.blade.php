<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2/dist/base.min.css">
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2/dist/utilities.min.css">
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2/dist/components.min.css">
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2/dist/tailwind.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
</head>

<body>
    <div id="app">
        @include('layouts.nav')
        @yield('header_content')
        <main>
            <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
                @if (session('success'))
                    <div
                        class="mb-5 bg-green-100 border-t-4 border-green-500 rounded-b text-green-900 px-4 py-3 shadow-md flex items-center justify-between">
                        <div class="flex">
                            <svg class="hidden w-6 h-6 text-green-500 mr-4" fill="none" stroke="currentColor"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M5 13l4 4L19 7"></path>
                            </svg>
                            <p class="text-sm font-semibold">{{ session('success') }}</p>
                        </div>
                        <button class="text-red-500 hover:text-red-700"
                            onclick="this.parentElement.style.display='none'">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                @endif
                @if (session('error'))
                    <div
                        class="mb-5 bg-red-100 border-t-4 border-red-500 rounded-b text-red-900 px-4 py-3 shadow-md flex items-center justify-between">
                        <div class="flex">
                            <svg class="hidden w-6 h-6 text-red-500 mr-4" fill="none" stroke="currentColor"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                            <p class="text-sm font-semibold">{{ session('error') }}</p>
                        </div>
                        <button class="text-red-500 hover:text-red-700"
                            onclick="this.parentElement.style.display='none'">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                @endif

                @yield('content')
            </div>
        </main>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</body>

</html>
