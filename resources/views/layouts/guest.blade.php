@props(['pagina' => ''])
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Portal Proveedores | {{ $pagina }}</title>

        <!-- Favicons -->
        <link rel="icon" type="image/png" href="/img/favicon-96x96.png" sizes="96x96" />
        <link rel="icon" type="image/svg+xml" href="/img/favicon.svg" />
        <link rel="shortcut icon" href="/img/favicon.ico" />
        <link rel="apple-touch-icon" sizes="180x180" href="/img/apple-touch-icon.png" />
        <link rel="manifest" href="/img/site.webmanifest" />

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col justify-between bg-gray-100">
            <x-nav-guest/>
            <!-- Contenido principal centrado -->
            <div class="flex flex-col sm:justify-center items-center pt-3 sm:pt-0 pb-5">
                <div class="w-full sm:max-w-md mt-6 px-3 py-2 bg-white shadow-md overflow-hidden sm:rounded-lg">
                    {{ $slot }}
                </div>
            </div>

            <!-- Footer -->
            <x-footer-guest />
        </div>
    </body>
</html>
