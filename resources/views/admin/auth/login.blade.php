@extends('layouts.auth.auth')

@section('content')
    <div class="flex-1 flex items-center justify-center bg-[#EFF1F4] px-[10px]">
        <form action="{{ route('admin.auth.login') }}" method="POST" class="w-full flex justify-center items-center">
            @csrf
            <div class="flex flex-col max-w-[444px] w-full bg-white py-[26px] px-[20px] md:p-[40px] rounded-[10px]">
                <div class="flex flex-col gap-[10px] mb-[40px]">
                    <div class="text-[25px] font-medium text-black">Войти в кабинет</div>
                    <div class="text-[15px] font-medium text-[#9EA9B7]">Tellive - №1 инструмент для партнера inCruises</div>
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
                </div>
                <button type="submit" class="h-[48px] text-white font-semibold text-[16px] bg-[#2272DD] rounded-[6px] mb-[20px]">Войти</button>
                <div class="flex justify-center gap-[5px]">
                    <div class="font-medium text-[16px] text-[#9EA9B7]">Нет аккаунта?</div>
                    <a href="{{ route('admin.auth.registerView') }}" class="font-medium text-[16px] text-[#2272DD]">Зарегистрироваться</a>
                </div>
            </div>
        </form>
    </div>
@endsection
