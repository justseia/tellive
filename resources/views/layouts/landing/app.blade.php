<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <x-landing.header/>

        <main class="flex-1 overflow-y-auto overflow-x-hidden flex flex-col bg-[#EFF1F4]">
            @yield('content')
        </main>

        @stack('scripts')
        @stack('modal')
    </body>
</html>
