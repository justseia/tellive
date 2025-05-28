@extends('layouts.admin.app')

@section('content')
    <div class="flex-1 flex flex-col items-center w-full bg-[#EFF1F4]">
        <div class="mb-[30px] px-[16px] pt-[30px] md:px-[30px] md:pt-[40px] w-full md:max-w-[738px] lg:max-w-[884px]">
            <div class="text-[24px] md:text-[28px] font-medium text-[#0B131D]">
                C возвращением,
                <span class="text-[#5A6472]">Жулдыз</span>
            </div>
        </div>
        <div class="mb-[30px] w-full">
            <div class="overflow-x-auto hide-scrollbar">
                <div class="flex min-w-max gap-[12px] md:gap-[20px] px-[16px] max-w-[854px] md:px-[calc((100%-738px)/2+30px)] lg:px-[calc((100%-884px)/2+30px)]">
                    @foreach(range(1, 16) as $story)
                        <a href="">
                            <x-admin.story/>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-[20px] w-full md:max-w-[738px] lg:max-w-[884px] px-[16px] md:px-[30px] mb-[30px]">
            <div class="w-full">
                <img src="https://www.k12digest.com/wp-content/uploads/2024/03/1-3-550x330.jpg" alt="img" class="rounded-[16px] h-[155px] md:h-[200px] top-0 left-0 w-full mb-[10px] object-cover object-center">
                <div class="w-full rounded-[16px] bg-[#F9F9F9] pb-[30px] p-[20px]">
                    <div class="flex justify-between mb-[16px]">
                        <div class="font-medium text-[13px] md:text-[14px] text-[#9EA9B7]">11 апр 2025</div>
                        <div class="flex gap-[26px] items-center">
                            <div class="flex gap-[8px] items-center">
                                @include('components.icons.views')
                                <div class="font-medium text-[13px] md:text-[14px] text-[#9EA9B7]">679</div>
                            </div>
                            @include('components.icons.three-dot')
                        </div>
                    </div>
                    <div class="flex flex-col">
                        <div class="mb-[12px] md:mb-[20px]">
                            <div class="font-medium text-[16px] md:text-[18px] text-[#0B131D]">Мой первый круиз ✨</div>
                        </div>
                        <div class="mb-[16px]">
                            <div class="font-medium text-[14px] md:text-[15px] text-[#5A6472]">Впервые в жизни мы с мужем поехали за границу, вместе с друзьями. Детей оставили дома, хотели сначала увидеть все сами...</div>
                        </div>
                        <div class="font-medium text-[14px] md:text-[16px] text-[#9EA9B7]">Читать историю</div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col gap-[20px]">
                <div class="flex flex-col rounded-[10px] p-[20px] bg-white">
                    <div class="text-[18px] font-medium text-[#0B131D] mb-[22px]">Пробный доступ на 3 дней ✨</div>
                    <div class="text-[14px] font-medium text-[#2272DD] mb-[16px]">Осталось 3 дней</div>
                    <div class="w-full bg-[#EFF1F4] mb-[22px] p-[3px] rounded-full">
                        <div class="rounded-full w-1/3 bg-[#2272DD] h-[8px]"></div>
                    </div>
                    <div class="flex w-fit items-center gap-[12px] rounded-[6px] border border-[#E8E8E8] bg-[#F9F9F9] px-[20px] py-[8px]">
                        <div class="text-[14px] font-medium text-[#0B131D] md:text-[15px]">Добавить отзыв</div>
                    </div>
                </div>
                <div class="flex flex-col rounded-[10px] p-[20px] bg-white">
                    <div class="text-[18px] font-medium text-[#0B131D] mb-[10px]">Заполните ваш сайт</div>
                    <div class="text-[14px] font-medium text-[#5A6472]/50 mb-[26px]">Чем больше заполнена страница, тем больше доверия вызывает у людей</div>
                    <div class="flex flex-col gap-[10px]">
                        <div class="w-full bg-[#2272DD]/5 flex items-center justify-between h-[47px] rounded-[6px] px-[20px]">
                            <div class="text-[14px] font-medium text-[#5A6472]">Создать аккаунт</div>
                            @include('components.icons.done')
                        </div>
                        <div class="w-full bg-[#2272DD]/5 flex items-center justify-between h-[47px] rounded-[6px] px-[20px]">
                            <div class="text-[14px] font-medium text-[#5A6472]">Заполнить профиль</div>
                            @include('components.icons.link', ['color' => '#C6D0DC'])
                        </div>
                        <div class="w-full bg-[#2272DD]/5 flex items-center justify-between h-[47px] rounded-[6px] px-[20px]">
                            <div class="text-[14px] font-medium text-[#5A6472]">Добавить историю</div>
                            @include('components.icons.link', ['color' => '#C6D0DC'])
                        </div>
                        <div class="w-full bg-[#2272DD]/5 flex items-center justify-between h-[47px] rounded-[6px] px-[20px]">
                            <div class="text-[14px] font-medium text-[#5A6472]">Добавить отзывы</div>
                            @include('components.icons.link', ['color' => '#C6D0DC'])
                        </div>
                        <div class="w-full bg-[#2272DD]/5 flex items-center justify-between h-[47px] rounded-[6px] px-[20px]">
                            <div class="text-[14px] font-medium text-[#5A6472]">Заполнить сайт</div>
                            @include('components.icons.link', ['color' => '#C6D0DC'])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
