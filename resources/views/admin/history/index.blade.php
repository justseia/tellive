@extends('layouts.admin.app')

@section('content')
    <div class="md:px-[30px] px-[16px] pt-[40px] pb-[40px]">
        <div class="mb-[30px]">
            <div class="font-medium text-[20px] md:text-[28px] text-[#0B131D]">Истории</div>
        </div>
        <a href="" class="inline-block">
            <div class="flex items-center w-fit gap-[12px] rounded-[6px] border border-[#E8E8E8] bg-[#F9F9F9] py-[8px] px-[20px]">
                @include('icons.plus', ['color' => '#0B131D'])
                <div class="font-medium text-[14px] md:text-[15px] text-[#0B131D]">Создать историю</div>
            </div>
        </a>
    </div>
    <div class="pb-[40px] md:pb-[60px]">
        <div class="mb-[20px] md:mb-[30px] px-[16px] md:px-[30px]">
            <div class="font-medium text-[20px] text-[#0B131D]">Мои истории</div>
        </div>
        <div class="overflow-x-auto hide-scrollbar w-full">
            <div class="flex min-w-max gap-[20px] px-[16px]">
                @forelse(range(1, 5) as $story)
                    <a href="">
                        <x-admin.history-card/>
                    </a>
                @empty
                    <div class="bg-[#F9F9F9] rounded-[6px] h-[48px] md:h-[59px] flex items-center justify-center w-full">
                        <div class="font-medium text-[15px] text-[#0B131D]">Начните с создания первой истории</div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
    <hr class="border-b border-[#D7DADF]/30 mx-[16px] md:mx-[40px]"/>
    <div class="pt-[30px] md:pt-[50px] pb-[30px] md:pb-[60px]">
        <div class="mb-[26px] flex justify-between items-center px-[16px]">
            <div class="font-medium text-[20px] text-[#0B131D]">Избранные истории</div>
            <a href="#" class="text-[#0B131D]/40 font-medium text-[14px] text-end text-nowrap">Истории партнеров</a>
        </div>
        <div class="overflow-x-auto hide-scrollbar w-full">
            <div class="flex min-w-max gap-[20px] px-[16px]">
                @forelse(range(1, 5) as $story)
                    <a href="">
                        <x-admin.history-card/>
                    </a>
                @empty
                    <a href="" class="w-full">
                        <x-admin.add-button title="Добавить истории в избранное"/>
                    </a>
                @endforelse
            </div>
        </div>
    </div>
    <hr class="border-b border-[#D7DADF]/30 mx-[16px] md:mx-[40px]"/>
    <div class="pt-[30px] md:pt-[50px] pb-[30px] md:pb-[60px]">
        <div class="mb-[26px] flex gap-[16px] items-center px-[16px]">
            <div class="font-medium text-[20px] text-[#0B131D]">Подборка историй Tellive</div>
            @include('icons.down')
        </div>
        <div class="overflow-x-auto hide-scrollbar w-full">
            <div class="flex min-w-max gap-[20px] px-[16px]">
                @forelse(range(1, 5) as $story)
                    <a href="">
                        <x-admin.history-card/>
                    </a>
                @empty
                    <a href="" class="w-full">
                        <x-admin.add-button title="Добавить истории в избранное"/>
                    </a>
                @endforelse
            </div>
        </div>
    </div>
@endsection
