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
        <div class="flex-1 flex items-center justify-center bg-[#EFF1F4] px-[10px]">
            <form action="{{ route('admin.auth.login') }}" method="POST">
                @csrf
                <div class="flex flex-col max-w-[444px] w-full bg-white py-[26px] px-[20px] md:p-[40px] rounded-[10px]">
                    <div class="flex flex-col gap-[10px] mb-[40px]">
                        <div class="text-[25px] font-medium text-black">Войти в кабинет</div>
                        <div class="text-[15px] font-medium text-[#9EA9B7]">Tellive — №1 инструмент для партнера inCruises</div>
                    </div>
                    <div class="flex flex-col gap-[20px] mb-[10px]">
                        <input name="email" type="email" class="border border-[#DBDFE9] h-[46px] rounded-[4px] px-[16px] text-[15px] bg-[#FCFCFC] placeholder:text-[#9EA9B7]" placeholder="Ваша почта" required>
                        <input name="password" type="password" minlength="8" class="border border-[#DBDFE9] h-[46px] rounded-[4px] px-[16px] text-[15px] bg-[#FCFCFC] placeholder:text-[#9EA9B7]" placeholder="Пароль" required>
                    </div>
                    <div class="flex justify-between mb-[30px]">
                        <label>
                            <span class="flex items-center gap-[10px]">
                                <input name="remember" type="checkbox" class="rounded-[3px] w-[16px] h-[16px] border-[#8B919F] checked:border-[#2272DD]">
                                <span class="font-medium text-[14px] text-[#9EA9B7]">Запомнить меня</span>
                            </span>
                        </label>
                        <a href="" class="text-[#9EA9B7] font-medium text-[14px]">Забыли пароль?</a>
                    </div>
                    <button type="submit" class="h-[48px] text-white font-semibold text-[16px] bg-[#2272DD] rounded-[6px]">Войти</button>
                </div>
            </form>
        </div>
    </body>
</html>
