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
                        <div class="flex flex-col gap-[10px] mb-[14px]">
                            <div class="font-medium text-[20px] md:text-[24px] text-[#0B131D]">{{ $client->full_name }}</div>
                        </div>
                        <div class="flex items-center gap-[8px] whitespace-nowrap mb-[30px]">
                            <div class="h-[23px] px-[10px] border-[0.5px] border-[#8A919B]/60px flex items-center justify-center w-fit rounded-[4px]">
                                <div class="font-medium text-[12px] text-[#5A6472]/70">{{ $client->type }}</div>
                            </div>
                            <div class="h-[23px] px-[10px] border-[0.5px] border-[#8A919B]/60px flex items-center justify-center w-fit rounded-[4px]">
                                <div class="font-medium text-[12px] text-[#5A6472]/70">{{ $client->tariff }}</div>
                            </div>
                        </div>
                        <div class="flex items-center gap-[10px]">
                            <div class="font-medium text-[15px] text-[#071437]">Основные данные</div>
                            @include('icons.edit')
                        </div>
                        <hr class="border-b border-[#9EA9B7]/20 my-[20px]"/>
                        <div class="flex flex-col gap-[20px]">
                            <div class="flex gap-[48px]">
                                <div class="flex flex-col gap-[16px]">
                                    <div class="font-medium text-[14px] text-[#78829D]">Номер:</div>
                                    <div class="font-medium text-[14px] text-[#78829D]">Куратор:</div>
                                    <div class="font-medium text-[14px] text-[#78829D]">Город:</div>
                                </div>
                                <div class="flex flex-col gap-[16px]">
                                    <div class="font-medium text-[14px] text-[#4B5675]">{{ $client->phone_number }}</div>
                                    <div class="font-medium text-[14px] text-[#4B5675]">{{ $client->curator }}</div>
                                    <div class="font-medium text-[14px] text-[#4B5675]">{{ $client->city }}</div>
                                </div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-[20px]">
                                <x-forms.date name="last_payment_date" title="Дата последнего платежа" value="{{ $client->last_payment_date }}" :showExample="false"/>
                                <x-forms.date name="last_payment_partnership" title="Последняя оплата партнерства" value="{{ $client->last_payment_partnership }}" :showExample="false"/>
                            </div>
                            <x-forms.textarea name="last_payment_partnership" title="Заметка" placeholder="Круиз в Европу в ноябре" value="{{ $client }}" rows="6" :showExample="false"/>
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
