<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <x-landing.header/>

        <main class="flex-1 overflow-y-auto overflow-x-hidden flex flex-col bg-[#EFF1F4]">
            @yield('content')
        </main>

        @if ($errors->any())
            <div
                x-data="{ show: true }"
                x-init="setTimeout(() => show = false, 3000)"
                x-show="show"
                class="fixed top-4 right-4 bg-red-500 text-white px-4 py-2 rounded shadow"
            >
                @foreach($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
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

        @stack('scripts')
        @stack('modal')
    </body>
</html>
