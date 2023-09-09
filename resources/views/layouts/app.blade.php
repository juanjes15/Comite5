<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')
        <x-sidebar />

        <div class="px-4 pt-11 sm:ml-64">
            <div class="p-4 rounded-lg mt-14">
                @if (isset($header))
                    <header class="bg-orange-400 shadow rounded-lg">
                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
                @endif
                {{ $slot }}
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.0/flowbite.min.js"></script>
</body>

</html>
