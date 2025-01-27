<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
        <link rel="icon" type="image" href="{{ asset('/assets/images/logo.jpeg') }}">

        <!-- Scripts -->
        @vite(['resources/css/style.scss', 'resources/js/app.js'])
    </head>
    
    <body>
        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </body>

    @include('partials.messages')
    @include('partials.javascript')
</html>
