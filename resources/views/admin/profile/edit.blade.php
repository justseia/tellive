@php
    use App\Enums\UserInfoEnum;
    use App\Models\UserInfo;
@endphp

@extends('layouts.admin.app')

@section('content')
    <div
            class="flex-1 px-[10px] bg-[#EFF1F4]"
            x-data="{
            workExperienceOpen: false,
            countriesCountOpen: false,
            cruisesCountOpen: false,
            supportedCountOpen: false,
        }"
    >
        <div class="flex flex-col items-center py-[20px] md:py-[40px]">
            <div class="max-w-[620px] w-full">
                <div class="flex flex-col p-[20px] md:p-[30px] bg-white rounded-[10px]">
                    <div class="flex flex-col gap-[10px]">
                        <div class="font-medium text-[20px] md:text-[24px] text-[#0B131D]">Профиль</div>
                        <div class="font-medium text-[14px] text-[#9EA9B7]">
                            Настройте основные блоки вашего сайта,
                            <br>
                            чтобы сделать его уникальным и привлекательным!
                        </div>
                    </div>
                    <hr class="border-b border-[#9EA9B7]/20 my-[20px]"/>
                    <div class="flex items-center gap-[7px] mb-[20px]">
                        @include('components.icons.link', ['color' => '#2272DD'])
                        <div class="font-medium text-[14px] text-[#2272DD]">Как редактировать свой профиль?</div>
                    </div>
                    <div x-data="{ tab: 'about' }">
                        <div class="mb-[30px] flex items-center h-[38px] border-collapse">
                            <button
                                    :class="tab === 'about' ? 'bg-[#F4F8FD] text-[#2272DD] border-[#2272DD]' : 'bg-[#9EA9B7]/5 text-[#9EA9B7] border-[#9EA9B7]'"
                                    class="h-full w-full max-w-[130px] font-medium text-[15px] rounded-l-[4px] border focus:outline-none"
                                    @click="tab = 'about'"
                            >
                                О себе
                            </button>
                            <button
                                    :class="tab === 'numbers' ? 'bg-[#F4F8FD] text-[#2272DD] border-[#2272DD]' : 'bg-[#9EA9B7]/5 text-[#9EA9B7] border-[#9EA9B7]'"
                                    class="h-full w-full max-w-[130px] font-medium text-[15px] border focus:outline-none"
                                    @click="tab = 'numbers'"
                            >
                                Цифры
                            </button>
                            <button
                                    :class="tab === 'connection' ? 'bg-[#F4F8FD] text-[#2272DD] border-[#2272DD]' : 'bg-[#9EA9B7]/5 text-[#9EA9B7] border-[#9EA9B7]'"
                                    class="h-full w-full max-w-[130px] font-medium text-[15px] rounded-r-[4px] border focus:outline-none"
                                    @click="tab = 'connection'"
                            >
                                Связь
                            </button>
                        </div>
                        <div class="">
                            <div x-show="tab === 'about'">
                                <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="flex flex-col gap-[30px]">
                                        <x-forms.image value="{{ $user->avatar }}" name="avatar" title="Загрузите свою фотографию" placeholder="Загрузить"/>
                                        <x-forms.text value="{{ $user->first_name }}" name="first_name" title="Имя" placeholder="Введите ваше имя"/>
                                        <x-forms.text value="{{ $user->last_name }}" name="last_name" title="Фамилия" placeholder="Введите вашу фамилию"/>
                                        <x-forms.textarea value="{{ $user->about_me }}" name="about_me" title="Напишите краткий текст о себе" placeholder="О себе" rows="4"/>
                                        <button type="submit" class="flex w-full h-[48px] justify-center items-center gap-[12px] rounded-[6px] border border-[#2272DD] bg-[#2272DD]/5 px-[20px] py-[8px] text-[15px] font-medium text-[#2272DD]">
                                            Сохранить изменения
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div x-show="tab === 'numbers'" x-cloak>
                                <form action="{{ route('admin.profile.update') }}" method="POST">
                                    @csrf
                                    <div class="text-[14px] font-medium text-[#9EA9B7] mb-[30px]">Можно выбрать не более 3 параметров</div>
                                    <div class="mb-[30px] flex flex-col gap-[10px]">
                                        <div class="text-[15px] font-semibold text-[#0B131D]">Пользовательские цифры</div>
                                        <div class="flex flex-col gap-[10px]">
                                            @foreach($userInfos as $userInfo)
                                                @php
                                                    $isChecked = $user->first_info_id == $userInfo->id || $user->second_info_id == $userInfo->id || $user->third_info_id == $userInfo->id;
                                                @endphp
                                                <div x-data="{ checked: {{ $isChecked ? 'true' : 'false' }} }" class="flex justify-between items-center h-[49px] rounded-[4px] bg-[#FCFCFC] border border-[#CFD4DB] px-[16px]">
                                                    <label class="w-full">
                                                        <span class="flex items-center gap-[10px]">
                                                            <template x-if="checked">
                                                                <div class="hidden">
                                                                    <input type="hidden" name="model[]" value="{{ get_class($userInfo) }}">
                                                                    <input type="hidden" name="id[]" value="{{ $userInfo->id }}">
                                                                </div>
                                                            </template>
                                                            <input name="user_info[]" type="checkbox" class="rounded-[3px] w-[16px] h-[16px] border-[#8B919F] checked:border-[#2272DD]" x-model="checked">
                                                            <span :class="checked ? 'text-[#2272DD]' : 'text-[#9EA9B7]'" class="font-medium text-[14px]">{{ UserInfoEnum::get($userInfo->value)[$userInfo->type] }}</span>
                                                        </span>
                                                    </label>
                                                    @if($userInfo->type == UserInfoEnum::YEAR)
                                                        <div @click="workExperienceOpen = true">
                                                            <x-icons.edit/>
                                                        </div>
                                                    @endif
                                                    @if($userInfo->type == UserInfoEnum::COUNTRY)
                                                        <div @click="countriesCountOpen = true">
                                                            <x-icons.edit/>
                                                        </div>
                                                    @endif
                                                    @if($userInfo->type == UserInfoEnum::CRUISE)
                                                        <div @click="cruisesCountOpen = true">
                                                            <x-icons.edit/>
                                                        </div>
                                                    @endif
                                                    @if($userInfo->type == UserInfoEnum::SUPPORT)
                                                        <div @click="supportedCountOpen = true">
                                                            <x-icons.edit/>
                                                        </div>
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                        @php
                                            $userInfoYear = UserInfo::query()->where('user_id', $user->id)->where('type', UserInfoEnum::YEAR)->exists();
                                            $userInfoCountry = UserInfo::query()->where('user_id', $user->id)->where('type', UserInfoEnum::COUNTRY)->exists();
                                            $userInfoCruise = UserInfo::query()->where('user_id', $user->id)->where('type', UserInfoEnum::CRUISE)->exists();
                                            $userInfoSupport = UserInfo::query()->where('user_id', $user->id)->where('type', UserInfoEnum::SUPPORT)->exists();
                                        @endphp
                                        <div class="relative {{ ($userInfoYear && $userInfoCountry && $userInfoCruise && $userInfoSupport) ? 'hidden' : '' }}" x-data="{ open: false }">
                                            <button @click="open = !open" type="button" class="w-full border border-[#CFD4DB] bg-[#FAFAFB] px-[18px] py-[10px] rounded-[4px] font-medium text-[14px] text-[#9EA9B7]">
                                                <div class="flex gap-[10px] items-center">
                                                    <div class="w-[10px] -mt-1">
                                                        <x-icons.down color="#9EA9B7"/>
                                                    </div>
                                                    <div class="text-[15px] font-medium text-[#9EA9B7]">Добавить</div>
                                                </div>
                                            </button>
                                            <div x-show="open" @click.away="open = false" x-transition class="absolute left-0 mt-2 w-full bg-white border border-gray-200 rounded-md shadow-lg z-50">
                                                <button @click="workExperienceOpen = true" type="button" class="w-full text-start block px-4 h-[48px] text-sm text-gray-700 hover:bg-gray-100 {{ $userInfoYear ? 'hidden' : '' }}">
                                                    🗓️ Опыт работы в inCruises
                                                </button>
                                                <button @click="countriesCountOpen = true" type="button" class="w-full text-start block px-4 h-[48px] text-sm text-gray-700 hover:bg-gray-100 {{ $userInfoCountry ? 'hidden' : '' }}">
                                                    🌍 Количество стран
                                                </button>
                                                <button @click="cruisesCountOpen = true" type="button" class="w-full text-start block px-4 h-[48px] text-sm text-gray-700 hover:bg-gray-100 {{ $userInfoCruise ? 'hidden' : '' }}">
                                                    🛳️ Количество круизов
                                                </button>
                                                <button @click="supportedCountOpen = true" type="button" class="w-full text-start block px-4 h-[48px] text-sm text-gray-700 hover:bg-gray-100 {{ $userInfoSupport ? 'hidden' : '' }}">
                                                    🤝 Количество поддержанных людей
                                                </button>
                                            </div>
                                        </div>
                                        <x-forms.example/>
                                    </div>
                                    <div class="flex flex-col gap-[10px] mb-[30px]">
                                        <div class="text-[15px] font-semibold text-[#0B131D]">Начальные цифры</div>
                                        <div class="flex flex-col gap-[10px]">
                                            @foreach($infos as $info)
                                                @php
                                                    $isChecked = $user->first_info_id == $info->id || $user->second_info_id == $info->id || $user->third_info_id == $info->id;
                                                @endphp
                                                <label x-data="{ checked: {{ $isChecked ? 'true' : 'false' }} }" class="w-full">
                                                    <span class="px-[16px] flex items-center gap-[10px] h-[49px] rounded-[4px] bg-[#FCFCFC] border border-[#CFD4DB]">
                                                        <template x-if="checked">
                                                            <div class="hidden">
                                                                <input type="hidden" name="model[]" value="{{ get_class($info) }}">
                                                                <input type="hidden" name="id[]" value="{{ $info->id }}">
                                                            </div>
                                                        </template>
                                                        <input name="user_info[]" type="checkbox" class="rounded-[3px] w-[16px] h-[16px] border-[#8B919F] checked:border-[#2272DD]" x-model="checked">
                                                        <span :class="checked ? 'text-[#2272DD]' : 'text-[#9EA9B7]'" class="font-medium text-[14px]">{{ UserInfoEnum::get($info->value)[$info->type] }}</span>
                                                    </span>
                                                </label>
                                            @endforeach
                                        </div>
                                        <x-forms.example/>
                                    </div>
                                    <button type="submit" class="flex w-full h-[48px] justify-center items-center gap-[12px] rounded-[6px] border border-[#2272DD] bg-[#2272DD]/5 px-[20px] py-[8px] text-[15px] font-medium text-[#2272DD]">
                                        Сохранить изменения
                                    </button>
                                </form>
                            </div>
                            <div x-show="tab === 'connection'" x-cloak>
                                <form action="{{ route('admin.profile.update') }}" method="POST">
                                    @csrf
                                    <div class="flex flex-col gap-[30px]">
                                        <x-forms.text value="{{ $user->whatsapp }}" name="whatsapp" title="WhatsApp" placeholder="Введите ваш номер WhatsApp"/>
                                        <x-forms.text value="{{ $user->telegram }}" name="telegram" title="Telegram" placeholder="Введите имя пользователя Telegram"/>
                                        <button type="submit" class="flex w-full h-[48px] justify-center items-center gap-[12px] rounded-[6px] border border-[#2272DD] bg-[#2272DD]/5 px-[20px] py-[8px] text-[15px] font-medium text-[#2272DD]">
                                            Сохранить изменения
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <x-admin.modal :key="'workExperienceOpen'">
            <form action="{{ route('admin.profile.info') }}" method="POST">
                @csrf
                @php
                    $userInfoModel = UserInfo::query()->where('user_id', $user->id)->where('type', UserInfoEnum::YEAR)->first()
                @endphp
                <div class="text-[15px] font-medium text-[#0B131D] mb-[10px]">С какого года вы работаете с inCruises?</div>
                <input name="type" value="{{ UserInfoEnum::YEAR }}" type="hidden">
                <input name="value" value="{{ $userInfoModel?->value }}" type="number" class="mb-[30px] w-full border border-[#DBDFE9] h-[46px] rounded-[4px] px-[16px] text-[15px] placeholder:text-[#9EA9B7]" placeholder="Введите год">
                <button type="submit" class="flex w-full h-[48px] justify-center items-center gap-[12px] rounded-[6px] border border-[#2272DD] bg-[#2272DD]/5 px-[20px] py-[8px] text-[15px] font-medium text-[#2272DD]">
                    Сохранить изменения
                </button>
            </form>
        </x-admin.modal>
        <x-admin.modal :key="'countriesCountOpen'">
            <form action="{{ route('admin.profile.info') }}" method="POST">
                @csrf
                @php
                    $userInfoModel = UserInfo::query()->where('user_id', $user->id)->where('type', UserInfoEnum::COUNTRY)->first()
                @endphp
                <div class="text-[15px] font-medium text-[#0B131D] mb-[10px]">Сколько стран вы посетили?</div>
                <input name="type" value="{{ UserInfoEnum::COUNTRY }}" type="hidden">
                <input name="value" value="{{ $userInfoModel?->value }}" type="number" class="mb-[30px] w-full border border-[#DBDFE9] h-[46px] rounded-[4px] px-[16px] text-[15px] placeholder:text-[#9EA9B7]" placeholder="Введите число стран">
                <button type="submit" class="flex w-full h-[48px] justify-center items-center gap-[12px] rounded-[6px] border border-[#2272DD] bg-[#2272DD]/5 px-[20px] py-[8px] text-[15px] font-medium text-[#2272DD]">
                    Сохранить изменения
                </button>
            </form>
        </x-admin.modal>
        <x-admin.modal :key="'cruisesCountOpen'">
            <form action="{{ route('admin.profile.info') }}" method="POST">
                @csrf
                @php
                    $userInfoModel = UserInfo::query()->where('user_id', $user->id)->where('type', UserInfoEnum::CRUISE)->first()
                @endphp
                <div class="text-[15px] font-medium text-[#0B131D] mb-[10px]">Сколько круизов вы посетили?</div>
                <input name="type" value="{{ UserInfoEnum::CRUISE }}" type="hidden">
                <input name="value" value="{{ $userInfoModel?->value }}" type="number" class="mb-[30px] w-full border border-[#DBDFE9] h-[46px] rounded-[4px] px-[16px] text-[15px] placeholder:text-[#9EA9B7]" placeholder="Введите число круизов">
                <button type="submit" class="flex w-full h-[48px] justify-center items-center gap-[12px] rounded-[6px] border border-[#2272DD] bg-[#2272DD]/5 px-[20px] py-[8px] text-[15px] font-medium text-[#2272DD]">
                    Сохранить изменения
                </button>
            </form>
        </x-admin.modal>
        <x-admin.modal :key="'supportedCountOpen'">
            <form action="{{ route('admin.profile.info') }}" method="POST">
                @csrf
                @php
                    $userInfoModel = UserInfo::query()->where('user_id', $user->id)->where('type', UserInfoEnum::SUPPORT)->first()
                @endphp
                <div class="text-[15px] font-medium text-[#0B131D] mb-[10px]">Скольких людей вы поддержали с поездкой в круиз?</div>
                <input name="type" value="{{ UserInfoEnum::SUPPORT }}" type="hidden">
                <input name="value" value="{{ $userInfoModel?->value }}" type="number" class="mb-[30px] w-full border border-[#DBDFE9] h-[46px] rounded-[4px] px-[16px] text-[15px] placeholder:text-[#9EA9B7]" placeholder="Введите количество людей">
                <button type="submit" class="flex w-full h-[48px] justify-center items-center gap-[12px] rounded-[6px] border border-[#2272DD] bg-[#2272DD]/5 px-[20px] py-[8px] text-[15px] font-medium text-[#2272DD]">
                    Сохранить изменения
                </button>
            </form>
        </x-admin.modal>
    </div>
@endsection
