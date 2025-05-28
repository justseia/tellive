</html>
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

        @yield('content')

        @if ($errors->has('error'))
            <div
                x-data="{ show: true }"
                x-init="setTimeout(() => show = false, 3000)"
                x-show="show"
                class="fixed top-4 right-4 bg-red-500 text-white px-4 py-2 rounded shadow"
            >
                {{ $errors->first('error') }}
            </div>
        @endif

    </body>
</html>
