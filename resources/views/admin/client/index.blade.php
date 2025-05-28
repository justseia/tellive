@extends('layouts.admin.app')

@section('content')
    <div class="bg-[#1DB003]/5 bg-[#DD5122]/5 bg-[#2272DD]/5 bg-[#5A6472]/5 text-[#1DB003] text-[#DD5122] text-[#2272DD] text-[#5A6472] border-[#1DB003] border-[#DD5122] border-[#2272DD] border-[#5A6472]"></div>

    <div class="flex-1 flex justify-center bg-[#EFF1F4] py-[40px]">
        <div class="max-w-[857px] w-full">
            <div class="mb-[30px] px-[10px] md:px-[20px] ld:px-[30px]">
                <div class="text-black text-[24px] md:text-[28px] font-medium">Моя команда</div>
            </div>
            <div class="flex items-center mb-[20px] gap-[10px] overflow-x-auto hide-scrollbar px-[10px] md:px-[20px] ld:px-[30px]">
                <a href="{{ route('admin.client.create') }}">
                    <div class="h-[40px] rounded-[6px] bg-[#2272DD] px-[16px] md:px-[20px] flex gap-[12px] items-center">
                        @include('components.icons.plus', ['color' => '#FFFFFF'])
                        <div class="text-white text-[15px] font-medium text-nowrap">Добавить клиента</div>
                    </div>
                </a>
                <form action="{{ route('admin.client.index') }}" method="GET" class="flex items-center gap-[10px]">
                    <select name="last_payment_partnership" onchange="this.form.submit()" class="border border-[#E8E8E8] rounded-[6px] pl-[16px] md:pl-[20px] pr-[32px] md:pr-[40px]">
                        <option value="" disabled selected hidden>Оплата</option>
                        <option value="week_before_payment" {{ request('last_payment_partnership') == 'week_before_payment' ? 'selected' : '' }}>Неделя до оплаты</option>
                        <option value="paid" {{ request('last_payment_partnership') == 'paid' ? 'selected' : '' }}>Оплачено</option>
                        <option value="overdue" {{ request('last_payment_partnership') == 'overdue' ? 'selected' : '' }}>Просрочено</option>
                    </select>
                    <select name="type" onchange="this.form.submit()" class="border border-[#E8E8E8] rounded-[6px] pl-[16px] md:pl-[20px] pr-[32px] md:pr-[40px]">
                        <option value="" disabled selected hidden>Тип клиента</option>
                        @foreach($userTypeEnum as $key => $userType)
                            <option value="{{ $key }}" {{ request('type') == $key ? 'selected' : '' }}>{{ $userType }}</option>
                        @endforeach
                    </select>
                    <select name="tariff" onchange="this.form.submit()" class="border border-[#E8E8E8] rounded-[6px] pl-[16px] md:pl-[20px] pr-[32px] md:pr-[40px]">
                        <option value="" disabled selected hidden>Тариф</option>
                        @foreach($tariffEnum as $key => $tariff)
                            <option value="{{ $key }}" {{ request('type') == $key ? 'selected' : '' }}>{{ $tariff[0] }}</option>
                        @endforeach
                    </select>
                </form>
                <a href="{{ route('admin.client.index') }}">
                    <div class="h-[40px] rounded-[6px] bg-transparent px-[10px] flex gap-[12px] items-center">
                        <div class="text-[#2272DD] text-[15px] font-normal text-nowrap">Сбросить фильтры</div>
                    </div>
                </a>
            </div>
            <div class="rounded-[10px] px-[10px] md:px-[20px] ld:px-[30px] overflow-x-auto hide-scrollbar">
                <table class="table-auto w-full bg-white rounded-[10px] border-collapse">
                    <thead class="bg-[#FCFCFC]">
                        <tr class="border-b border-b-[#F1F1F4]">
                            <th class="border-r border-r-[#F1F1F4] p-[16px] rounded-tl-[10px]">
                                <div class="text-[#4B5675] text-[14px] font-normal text-start">Клиент</div>
                            </th>
                            <th class="border-r border-r-[#F1F1F4] p-[16px]">
                                <div class="text-[#4B5675] text-[14px] font-normal text-start">Оплата</div>
                            </th>
                            <th class="border-r border-r-[#F1F1F4] p-[16px]">
                                <div class="text-[#4B5675] text-[14px] font-normal text-start">Ветка</div>
                            </th>
                            <th class="p-[16px] rounded-tr-[10px]">
                                <div class="text-[#4B5675] text-[14px] font-normal text-start">Действия</div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($clients as $client)
                            <tr class="border-b border-b-[#F1F1F4] last:border-b-0">
                                <td class="p-[16px] border-r border-r-[#F1F1F4]">
                                    <div class="flex flex-col gap-[7px]">
                                        <div class="text-[#071437] text-[15px] font-normal text-nowrap">{{ $client->full_name }}</div>
                                        <div class="flex gap-[8px] whitespace-nowrap">
                                            <div class="h-[23px] px-[10px] border-[0.5px] border-[#8A919B] bg-[#8A919B]/5 flex items-center justify-center w-fit rounded-[4px]">
                                                <div class="font-medium text-[12px] text-[#8A919B]">{{ $userTypeEnum[$client->type] }}</div>
                                            </div>
                                            <div class="h-[23px] px-[10px] border-[0.5px] border-[{{ $tariffEnum[$client->tariff][1] }}] flex items-center justify-center w-fit rounded-[4px] bg-[{{ $tariffEnum[$client->tariff][1] }}]/5">
                                                <div class="font-medium text-[12px] text-[{{ $tariffEnum[$client->tariff][1] }}]">{{ $tariffEnum[$client->tariff][0] }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="p-[16px] border-r border-r-[#F1F1F4]">
                                    <div class="flex flex-col items-center gap-[2px]">
                                        <div class="text-[12px] font-medium text-[#8B919F]">Оплачено до:</div>
                                        <div class="text-[15px] font-medium text-[#272B41] text-nowrap">{{ $client->last_payment_date?->format('d.m.Y') ?? '-' }}</div>
                                    </div>
                                </td>
                                <td class="p-[16px] border-r border-r-[#F1F1F4]">
                                    <div class="flex flex-col gap-[2px]">
                                        <div class="text-[12px] font-medium text-[#8B919F]">Куратор:</div>
                                        <div class="text-[15px] font-medium text-[#272B41] text-nowrap">{{ $client->curator }}</div>
                                    </div>
                                </td>
                                <td class="p-[16px]">
                                    <a href="{{ route('admin.client.show', $client) }}">
                                        <div class="px-[29px] h-[36px] border border-[#E8E8E8] bg-[#F9F9F9] flex items-center justify-center rounded-[5px]">
                                            <div class="text-[#212121] text-[14px] font-normal">Подробнее</div>
                                        </div>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
