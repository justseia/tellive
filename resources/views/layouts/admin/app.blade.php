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
        @stack('modal')

        @if ($errors->any())
            <div
                x-data="{ show: true }"
                x-init="setTimeout(() => show = false, 3000)"
                x-show="show"
                class="fixed top-4 right-4 bg-red-500 text-white px-4 py-2 rounded shadow"
            >
                {{ $errors }}
            </div>
        @endif

        @if (session('success'))
            <div
                x-data="{ show: true }"
                x-init="setTimeout(() => show = false, 3000)"
                x-show="show"
                class="fixed top-4 right-4 bg-green-500 text-white px-4 py-2 rounded shadow"
            >
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-[#1DB003]/5 bg-[#DD5122]/5 bg-[#2272DD]/5 bg-[#5A6472]/5 text-[#1DB003] text-[#DD5122] text-[#2272DD] text-[#5A6472] border-[#1DB003] border-[#DD5122] border-[#2272DD] border-[#5A6472]"></div>
    </body>
</html>
