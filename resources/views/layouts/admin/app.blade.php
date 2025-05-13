<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans flex h-dvh">
        <x-admin.aside/>

        <main class="flex-1 overflow-y-auto overflow-x-hidden flex flex-col">
            <x-admin.header/>

            @yield('content')
        </main>

        @stack('scripts')
    </body>
</html>
