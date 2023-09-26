<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Manuzik') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!--select 2-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.0/js/select2.min.js"></script>


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body class="font-sans antialiased">
    <div class="flex">
        @include('layouts.new-nav')

        <div class="w-5/6 bg-gray-200 flex-1">
            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 lg:text-center">
                    {{ $header }}
                </div>
            </header>

            @include('alerts.success')
            @include('alerts.error')
            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

    </div>
    <x-popups.musics.create />
    <x-popups.playlists.create />
    <x-popups.users.create />
    @include('scripts.popup-toggle');
</body>

</html>
