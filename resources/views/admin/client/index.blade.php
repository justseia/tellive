@extends('layouts.admin.app')

@section('content')
    <div class="flex-1 flex justify-center bg-[#EFF1F4] py-[40px]">
        <div class="max-w-[857px] w-full">
            <div class="mb-[30px] px-[10px] md:px-[20px] ld:px-[30px]">
                <div class="text-black text-[24px] md:text-[28px] font-medium">Моя команда</div>
            </div>
            <div class="flex items-center mb-[20px] gap-[10px] overflow-x-auto hide-scrollbar px-[10px] md:px-[20px] ld:px-[30px]">
                <a href="">
                    <div class="h-[40px] rounded-[6px] bg-[#2272DD] px-[16px] md:px-[20px] flex gap-[12px] items-center">
                        @include('icons.plus', ['color' => '#FFFFFF'])
                        <div class="text-white text-[15px] font-medium text-nowrap">Добавить клиента</div>
                    </div>
                </a>
                <select class="border border-[#E8E8E8] rounded-[6px] pl-[16px] md:pl-[20px] pr-[32px] md:pr-[40px]">
                    <option value="" selected disabled>Оплата</option>
                </select>
                <select class="border border-[#E8E8E8] rounded-[6px] pl-[16px] md:pl-[20px] pr-[32px] md:pr-[40px]">
                    <option value="" selected disabled>Тип клиента</option>
                </select>
                <select class="border border-[#E8E8E8] rounded-[6px] pl-[16px] md:pl-[20px] pr-[32px] md:pr-[40px]">
                    <option value="" selected disabled>Тариф</option>
                </select>
                <a href="">
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
                        @foreach(range(1, 10) as $client)
                            <tr class="border-b border-b-[#F1F1F4] last:border-b-0">
                                <td class="p-[16px] border-r border-r-[#F1F1F4]">
                                    <div class="flex flex-col gap-[7px]">
                                        <div class="text-[#071437] text-[15px] font-normal">Алия Ногаева</div>
                                        <div class="flex gap-[8px] whitespace-nowrap">
                                            <div class="h-[23px] px-[10px] border-[0.5px] border-[#8A919B]/60px flex items-center justify-center w-fit rounded-[4px]">
                                                <div class="font-medium text-[12px] text-[#5A6472]/70">Новый клиент</div>
                                            </div>
                                            <div class="h-[23px] px-[10px] border-[0.5px] border-[#8A919B]/60px flex items-center justify-center w-fit rounded-[4px]">
                                                <div class="font-medium text-[12px] text-[#5A6472]/70">Новый клиент</div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="p-[16px] border-r border-r-[#F1F1F4]">
                                    <div class="flex flex-col items-center gap-[2px]">
                                        <div class="text-[12px] font-medium text-[#8B919F]">Оплачено до:</div>
                                        <div class="text-[15px] font-medium text-[#272B41]">01.06.2025</div>
                                    </div>
                                </td>
                                <td class="p-[16px] border-r border-r-[#F1F1F4]">
                                    <div class="flex flex-col gap-[2px]">
                                        <div class="text-[12px] font-medium text-[#8B919F]">Куратор:</div>
                                        <div class="text-[15px] font-medium text-[#272B41]">Жулдыз Кульжабекова</div>
                                    </div>
                                </td>
                                <td class="p-[16px]">
                                    <a href="">
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
