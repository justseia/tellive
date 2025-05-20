@extends('layouts.admin.app')

@section('content')
    <div class="flex-1 px-[10px] bg-[#EFF1F4]">
        <form action="{{ route('admin.client.update', $client) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="flex flex-col items-center py-[20px] md:py-[40px]">
                <div class="max-w-[620px] w-full">
                    <div class="flex items-center justify-between mb-[27px] px-[16px]">
                        <a href="{{ route('admin.client.index') }}">
                            <div class="font-medium text-[15px] text-[#5A6472]">← Назад</div>
                        </a>
                        <button class="hover:cursor-pointer font-medium text-[15px] text-[#2272DD]">
                            Сохранить
                        </button>
                    </div>
                    <div class="flex flex-col p-[20px] md:p-[30px] bg-white rounded-[10px]">
                        <div class="flex flex-col gap-[10px]">
                            <div class="font-medium text-[20px] md:text-[24px] text-[#0B131D]">Данные об участнике</div>
                        </div>
                        <hr class="border-b border-[#9EA9B7]/20 my-[20px]"/>
                        <div class="flex flex-col gap-[20px]">
                            <x-forms.text name="full_name" title="ФИО" placeholder="Краткий заголовок (до 15 символов)" value="{{ $client->full_name }}" :showExample="false"/>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-[20px]">
                                <x-forms.select name="type" title="Тип участника" selected="Выберите тип" :showExample="false">
                                    <option value="1" {{ $client->type == '1' ? 'selected' : '' }}>1</option>
                                    <option value="2" {{ $client->type == '2' ? 'selected' : '' }}>2</option>
                                    <option value="3" {{ $client->type == '3' ? 'selected' : '' }}>3</option>
                                </x-forms.select>
                                <x-forms.select name="tariff" title="Тариф" selected="Выберите тариф" :showExample="false">
                                    <option value="1" {{ $client->tariff == '1' ? 'selected' : '' }}>1</option>
                                    <option value="2" {{ $client->tariff == '2' ? 'selected' : '' }}>2</option>
                                    <option value="3" {{ $client->tariff == '3' ? 'selected' : '' }}>3</option>
                                </x-forms.select>
                            </div>
                            <x-forms.text name="phone_number" title="Номер" placeholder="Введите номер телефона" value="{{ $client->phone_number }}" :showExample="false"/>
                            <x-forms.text name="curator" title="Куратор" placeholder="Кто сопровождает участника?" value="{{ $client->curator }}" :showExample="false"/>
                            <x-forms.text name="city" title="Город" placeholder="Введите город участника" value="{{ $client->city }}" :showExample="false"/>
                            <button type="submit" class="flex w-full items-center gap-[12px] rounded-[4px] bg-[#2272DD] h-[48px] justify-center text-[14px] font-medium text-white md:text-[15px]">
                                Опубликовать
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
