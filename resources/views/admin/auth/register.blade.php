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
    <form action="{{ route('admin.auth.login') }}" method="POST" class="w-full flex justify-center items-center">
        @csrf
        <div class="flex flex-col max-w-[444px] w-full bg-white py-[26px] px-[20px] md:p-[40px] rounded-[10px]">
            @if(!auth()->check())
                <div x-data="{ email: '', country_code: '', phone_number: '', password: '', password_confirmation: '', error: '' }">
                    <div class="flex flex-col gap-[10px] mb-[40px]">
                        <div class="text-[25px] font-medium text-black">Создайте сайт - за 5 минут!</div>
                        <div class="text-[15px] font-medium text-[#9EA9B7]">Tellive - №1 инструмент для партнера inCruises</div>
                    </div>
                    <div class="flex flex-col gap-[20px] mb-[10px]">
                        <input name="email" type="email" x-model="email" class="border border-[#DBDFE9] h-[46px] rounded-[4px] px-[16px] text-[15px] bg-[#FCFCFC] placeholder:text-[#9EA9B7]" placeholder="Ваша почта" required>
                        <div class="flex gap-[10px] w-full">
                            <input name="country_code" type="text" x-model="country_code" class="w-[71px] border border-[#DBDFE9] h-[46px] rounded-[4px] px-[16px] text-[15px] bg-[#FCFCFC] placeholder:text-[#9EA9B7]" placeholder="+7" required>
                            <input name="phone_number" type="text" x-model="phone_number" class="flex-1 border border-[#DBDFE9] h-[46px] rounded-[4px] px-[16px] text-[15px] bg-[#FCFCFC] placeholder:text-[#9EA9B7]" placeholder="Ваш номер" required>
                        </div>
                        <input name="password" type="password" x-model="password" minlength="8" class="w-full border border-[#DBDFE9] h-[46px] rounded-[4px] px-[16px] text-[15px] bg-[#FCFCFC] placeholder:text-[#9EA9B7]" placeholder="Пароль" required>
                        <input name="password_confirmation" type="password" x-model="password_confirmation" minlength="8" class="border border-[#DBDFE9] h-[46px] rounded-[4px] px-[16px] text-[15px] bg-[#FCFCFC] placeholder:text-[#9EA9B7]" placeholder="Повторите пароль" required>
                    </div>
                    <div class="text-red-500 my-[5px]" x-show="error != ''" x-html="error"></div>
                    <button
                        type="button"
                        @click="
                        if (password !== password_confirmation) {
                            error = 'Пароли не совпадают';
                        } else {
                            error = '';
                            step = 2;
                        }
                    "
                        class="h-[48px] text-white font-semibold text-[16px] bg-[#2272DD] rounded-[6px] mb-[20px] w-full"
                    >
                        Зарегистрироваться
                    </button>
                    <div class="flex justify-center gap-[5px]">
                        <div class="font-medium text-[16px] text-[#9EA9B7]">Уже есть аккаунт?</div>
                        <a href="{{ route('admin.auth.loginView') }}" class="font-medium text-[16px] text-[#2272DD]">Войти</a>
                    </div>
                </div>
            @elseif(auth()->user()->step == 1)
                <div>
                    <div class="flex flex-col gap-[10px] mb-[40px]">
                        <div class="text-[25px] font-medium text-black">Сайт почти готов - нужно немного информации</div>
                        <div class="text-[15px] font-medium text-[#9EA9B7]">Просто ответьте на 2 вопроса.</div>
                    </div>
                    <div class="flex flex-col gap-[20px] mb-[10px]">
                        <input name="first_name" type="text" class="border border-[#DBDFE9] h-[46px] rounded-[4px] px-[16px] text-[15px] bg-[#FCFCFC] placeholder:text-[#9EA9B7]" placeholder="Имя" required>
                        <input name="last_name" type="text" class="border border-[#DBDFE9] h-[46px] rounded-[4px] px-[16px] text-[15px] bg-[#FCFCFC] placeholder:text-[#9EA9B7]" placeholder="Фамилия" required>
                        <div class="text-[15px] font-medium text-[#9EA9B7]">Это будет на вашем сайте и в шапке профиля</div>
                    </div>
                    <button type="button" @click="step = 3" class="h-[48px] text-white font-semibold text-[16px] bg-[#2272DD] rounded-[6px] mb-[20px] w-full">Дальше</button>
                </div>
            @elseif(auth()->user()->step == 2)
                <div x-data="{ domain: '' }">
                    <div class="flex flex-col gap-[10px] mb-[40px]">
                        <div class="text-[25px] font-medium text-black">Придумайте название сайта</div>
                        <div class="text-[15px] font-medium text-[#9EA9B7]">Это ссылка, по которой будет открываться ваш сайт. Можно использовать имя, фамилию или любое слово</div>
                    </div>
                    <div class="flex flex-col gap-[20px] mb-[10px]">
                        <input name="domain" type="text" class="border border-[#DBDFE9] h-[46px] rounded-[4px] px-[16px] text-[15px] bg-[#FCFCFC] placeholder:text-[#9EA9B7]" placeholder="Как будет называться сайт?" required>
                        <div class="text-[15px] font-medium text-[#9EA9B7]">
                            Ваша ссылка: <span class="text-black"><span x-html="domain != '' ? domain : 'имя'"></span>.tellive.me</span>
                        </div>
                    </div>
                    <button type="submit" class="h-[48px] text-white font-semibold text-[16px] bg-[#2272DD] rounded-[6px] mb-[20px] w-full">Дальше</button>
                </div>
            @endif
        </div>
    </form>
</div>

</body>
</html>
