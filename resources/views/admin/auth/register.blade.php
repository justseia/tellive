@extends('layouts.auth.auth')

@section('content')
    <div class="flex-1 flex items-center justify-center bg-[#EFF1F4] px-[10px]">
        <form action="{{ route('admin.auth.register') }}" method="POST" class="w-full flex justify-center items-center">
            @csrf
            <div class="flex flex-col max-w-[444px] w-full bg-white py-[26px] px-[20px] md:p-[40px] rounded-[10px]">
                @if(!auth()->check())
                    <div x-data="{ email: '', country_code: '+7', phone_number: '', password: '', password_confirmation: '', error: '' }">
                        <div class="flex flex-col gap-[10px] mb-[40px]">
                            <div class="text-[25px] font-medium text-black">Создайте сайт - за 5 минут!</div>
                            <div class="text-[15px] font-medium text-[#9EA9B7]">Tellive - №1 инструмент для партнера inCruises</div>
                        </div>
                        <div class="flex flex-col gap-[20px] mb-[40px]">
                            <input name="email" type="email" x-model="email" class="border border-[#DBDFE9] h-[46px] rounded-[4px] px-[16px] text-[15px] bg-[#FCFCFC] placeholder:text-[#9EA9B7]" placeholder="Ваша почта" required>
                            <div class="flex gap-[10px] w-full">
                                <input name="country_code" type="text" x-model="country_code" class="w-[71px] border border-[#DBDFE9] h-[46px] rounded-[4px] px-[16px] text-[15px] bg-[#FCFCFC] placeholder:text-[#9EA9B7]" placeholder="+7" required>
                                <input name="phone_number" type="text" x-model="phone_number" class="flex-1 border border-[#DBDFE9] h-[46px] rounded-[4px] px-[16px] text-[15px] bg-[#FCFCFC] placeholder:text-[#9EA9B7]" placeholder="Ваш номер" required>
                            </div>
                            <input name="password" type="password" x-model="password" minlength="8" class="w-full border border-[#DBDFE9] h-[46px] rounded-[4px] px-[16px] text-[15px] bg-[#FCFCFC] placeholder:text-[#9EA9B7]" placeholder="Пароль" required>
                            <div class="flex flex-col gap-[6px]">
                                <input name="password_confirmation" type="password" x-model="password_confirmation" minlength="8" class="border border-[#DBDFE9] h-[46px] rounded-[4px] px-[16px] text-[15px] bg-[#FCFCFC] placeholder:text-[#9EA9B7]" placeholder="Повторите пароль" required>
                                <div class="text-red-500 text-[12px]" x-show="error != ''" x-html="error"></div>
                            </div>
                        </div>
                        <button
                            type="button"
                            @click="
                            if (password !== password_confirmation) {
                                error = 'Пароли не совпадают';
                            } else {
                                error = '';
                                const form = document.querySelector('form');
                                if (form.reportValidity()) {
                                    form.submit();
                                }
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
                        <button
                            type="submit"
                            class="h-[48px] text-white font-semibold text-[16px] bg-[#2272DD] rounded-[6px] mb-[20px] w-full"
                        >
                            Дальше
                        </button>
                    </div>
                @elseif(auth()->user()->step == 2)
                    <div x-data="{
                        domain: '',
                        validate() {
                            const regex = /^[a-zA-Z\-]+$/;
                            if (!regex.test(this.domain)) {
                                this.error = 'Можно использовать только латинские буквы и дефис (-)';
                            } else {
                                this.error = '';
                            }
                        }
                    }">
                        <div class="flex flex-col gap-[10px] mb-[40px]">
                            <div class="text-[25px] font-medium text-black">Придумайте название сайта</div>
                            <div class="text-[15px] font-medium text-[#9EA9B7]">Это ссылка, по которой будет открываться ваш сайт. Можно использовать имя, фамилию или любое слово</div>
                        </div>
                        <div class="flex flex-col gap-[20px] mb-[10px]">
                            <div class="flex flex-col w-full">
                                <input name="subdomain" type="text" x-model="domain" @input="validate" class="border border-[#DBDFE9] h-[46px] rounded-[4px] px-[16px] text-[15px] bg-[#FCFCFC] placeholder:text-[#9EA9B7]" placeholder="Как будет называться сайт?" required>
                                <template x-if="error">
                                    <div class="text-[14px] text-red-500" x-text="error"></div>
                                </template>
                            </div>
                            <div class="text-[15px] font-medium text-[#9EA9B7]">
                                Ваша ссылка:
                                <span class="text-black">
                                    <span x-html="(domain != '' ? domain : 'имя') + '.tellive.me'"></span>
                                </span>
                            </div>
                        </div>
                        <button type="submit" class="h-[48px] text-white font-semibold text-[16px] bg-[#2272DD] rounded-[6px] mb-[20px] w-full">Дальше</button>
                    </div>
                @elseif(auth()->user()->step == 3)
                    <div class="flex flex-col items-center">
                        <div class="mb-[20px]">
                            @include('components.icons.done-register')
                        </div>
                        <div class="flex flex-col gap-[10px] mb-[40px] text-center">
                            <div class="text-[25px] font-medium text-black">Готово!</div>
                            <div class="text-[15px] font-medium text-[#9EA9B7]">Ваша личная страница уже работает.
                                <br>
                                Осталось добавить фото и рассказать о себе
                            </div>
                        </div>
                        <button type="submit" class="h-[48px] text-white font-semibold text-[16px] bg-[#2272DD] rounded-[6px] mb-[20px] w-full">Перейти в личный кабинет</button>
                    </div>
                @endif
            </div>
        </form>
    </div>
@endsection
