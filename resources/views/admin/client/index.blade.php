@extends('layouts.admin.app')

@section('content')
    <div class="flex-1 flex justify-center bg-[#EFF1F4] px-[30px] py-[40px]">
        <div class="max-w-[857px] w-full">
            <div class="text-black text-[28px] font-medium">Моя команда</div>
            <div class="rounded-[10px] overflow-hidden">
                <table class="table-auto w-full bg-white rounded-[10px] border-collapse">
                    <thead class="bg-[#FCFCFC]">
                        <tr class="border-b border-b-[#F1F1F4]">
                            <th class="border-r border-r-[#F1F1F4] p-[16px]">
                                <div class="text-[#4B5675] text-[14px] font-normal text-start">Клиент</div>
                            </th>
                            <th class="border-r border-r-[#F1F1F4] p-[16px]">
                                <div class="text-[#4B5675] text-[14px] font-normal text-start">Оплата</div>
                            </th>
                            <th class="border-r border-r-[#F1F1F4] p-[16px]">
                                <div class="text-[#4B5675] text-[14px] font-normal text-start">Ветка</div>
                            </th>
                            <th class="p-[16px]">
                                <div class="text-[#4B5675] text-[14px] font-normal text-start">Действия</div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(range(1, 10) as $client)
                            <tr class="border-b border-b-[#F1F1F4] last:border-b-0">
                                <td class="p-[16px] border-r border-r-[#F1F1F4]">
                                    <div>{{ $client }}</div>
                                </td>
                                <td class="p-[16px] border-r border-r-[#F1F1F4]">
                                    <div>{{ $client }}</div>
                                </td>
                                <td class="p-[16px] border-r border-r-[#F1F1F4]">
                                    <div>{{ $client }}</div>
                                </td>
                                <td class="p-[16px]">
                                    <div>{{ $client }}</div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
