{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <script>
            function setCookie(name, value, days) {
                let expires = "";
                if (days) {
                    let date = new Date();
                    date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                    expires = "; expires=" + date.toUTCString();
                }
                document.cookie = name + "=" + (value || "") + expires + "; path=/";
            }

            function getCookie(name) {
                let nameEQ = name + "=";
                let ca = document.cookie.split(';');
                for (let i = 0; i < ca.length; i++) {
                    let c = ca[i];
                    while (c.charAt(0) == ' ') c = c.substring(1, c.length);
                    if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
                }
                return null;
            }

            function deleteCookie(name) {
                document.cookie = name + "=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
            }

            const savedTheme = getCookie('theme') || 'system';
            if (savedTheme === 'dark' || (savedTheme === 'system' && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        </script>



    </head>
    <!-- resources/views/layouts/app.blade.php -->

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @isset($header)
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Flash Messages Container (Taruh di sini agar muncul di semua halaman) -->
        <div class="max-w-7xl mx-auto mt-4 px-4 sm:px-6 lg:px-8">
            @if (session('success'))
                <div id="alert-success" class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 shadow-md mb-4 rounded-r-lg flex justify-between items-center" role="alert">
                    <div>
                        <p class="font-bold uppercase text-xs">Berhasil!</p>
                        <p class="text-sm">{{ session('success') }}</p>
                    </div>
                    <button onclick="document.getElementById('alert-success').remove()" class="text-green-500 hover:text-green-700">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>
            @endif

            @if (session('error'))
                <div id="alert-error" class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 shadow-md mb-4 rounded-r-lg flex justify-between items-center" role="alert">
                    <div>
                        <p class="font-bold uppercase text-xs">Gagal!</p>
                        <p class="text-sm">{{ session('error') }}</p>
                    </div>
                    <button onclick="document.getElementById('alert-error').remove()" class="text-red-500 hover:text-red-700">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>
            @endif
        </div>

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
</body>
</html> --}}


<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <script>
            // Helper Functions
            function setCookie(name, value, days) {
                let expires = "";
                if (days) {
                    let date = new Date();
                    date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                    expires = "; expires=" + date.toUTCString();
                }
                document.cookie = name + "=" + (value || "") + expires + "; path=/";
            }

            function getCookie(name) {
                let nameEQ = name + "=";
                let ca = document.cookie.split(';');
                for (let i = 0; i < ca.length; i++) {
                    let c = ca[i];
                    while (c.charAt(0) == ' ') c = c.substring(1, c.length);
                    if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
                }
                return null;
            }

            function deleteCookie(name) {
                document.cookie = name + "=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
            }

            // Terapkan tema secepat mungkin untuk mencegah flash warna putih (FOUC)
            const savedTheme = getCookie('theme') || 'system';
            if (savedTheme === 'dark' || (savedTheme === 'system' && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        </script>
    </head>

    <body class="font-sans antialiased bg-gray-100 text-gray-900 dark:bg-gray-900 dark:text-gray-100 transition-colors duration-200">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow transition-colors duration-200">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <div class="max-w-7xl mx-auto mt-4 px-4 sm:px-6 lg:px-8">
                @if (session('success'))
                    <div id="alert-success" class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 shadow-md mb-4 rounded-r-lg flex justify-between items-center" role="alert">
                        <div>
                            <p class="font-bold uppercase text-xs">Berhasil!</p>
                            <p class="text-sm">{{ session('success') }}</p>
                        </div>
                        <button onclick="document.getElementById('alert-success').remove()" class="text-green-500 hover:text-green-700">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                        </button>
                    </div>
                @endif

                @if (session('error'))
                    <div id="alert-error" class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 shadow-md mb-4 rounded-r-lg flex justify-between items-center" role="alert">
                        <div>
                            <p class="font-bold uppercase text-xs">Gagal!</p>
                            <p class="text-sm">{{ session('error') }}</p>
                        </div>
                        <button onclick="document.getElementById('alert-error').remove()" class="text-red-500 hover:text-red-700">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                        </button>
                    </div>
                @endif
            </div>

            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
