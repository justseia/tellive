@extends('layouts.admin.app')

@section('content')
    <div class="px-[16px] md:px-[40px] pt-[30px] pb-[24px]">
        <div class="flex items-center gap-[18px] mb-[20px] md:mb-[24px]">
            <img src="https://pbs.twimg.com/profile_images/1701878932176351232/AlNU3WTK_400x400.jpg" alt="img" class="h-[70px] w-[70px] md:h-[130px] md:w-[130px] rounded-full object-cover object-center shrink-0">
            <div class="flex flex-col">
                <div class="mb-[8px]">
                    <div class="font-medium text-[20px]">Жулдыз Кульжабекова</div>
                </div>
                <div class="flex gap-[10px] mb-0 md:mb-[16px]">
                    <div class="py-[6px] px-[10px] rounded-[6px] bg-[#5A6472]/5 text-center">
                        <div class="text-[#5A6472]/70 font-medium text-[11px] md:text-[12px]">Партнёр inCruises</div>
                    </div>
                    <div class="py-[6px] px-[10px] rounded-[6px] bg-[#5A6472]/5 text-center">
                        <div class="text-[#5A6472]/70 font-medium text-[11px] md:text-[12px]">Амбассадор Tellive</div>
                    </div>
                </div>
                <div class="hidden md:block">
                    <x-admin.profile-info/>
                </div>
            </div>
        </div>
        <div class="mb-[20px] md:hidden">
            <x-admin.profile-info/>
        </div>
        <div class="flex flex-col">
            <div class="flex gap-[12px] mb-[20px]">
                <button type="button" class="bg-[#2272DD] px-[18px] py-[10px] rounded-[4px] font-medium text-[14px] text-white">
                    Открыть сайт
                </button>
                <button type="button" class="border border-[#E8E8E8] bg-[#F9F9F9] px-[18px] py-[10px] rounded-[4px] font-medium text-[14px] text-[#0B131D]">
                    Написать мне
                </button>
            </div>
            <div x-data="{ expanded: false, scrollHeight: 0 }" x-init="scrollHeight = $refs.text.scrollHeight" class="relative text-[#717171]">
                <div x-ref="text" x-bind:style="expanded ? `max-height: ${scrollHeight}px` : 'max-height: 3em'" class="overflow-hidden transition-all duration-500 ease-in-out">
                    Когда я отправилась в первый круиз, поняла: свобода — это не про деньги.
                    <br>
                    Это про разрешение себе жить. В этом всём — не просто круизы.
                    <br>
                    Это про разрешение себе жить. В этом всём — не просто круизы.
                    <br>
                    Это про разрешение себе жить. В этом всём — не просто круизы.
                    <br>
                    Это про разрешение себе жить. В этом всём — не просто круизы.
                </div>
                <div x-show="!expanded" x-transition.opacity class="pointer-events-none absolute bottom-8 left-0 w-full h-6 bg-gradient-to-b from-transparent to-white"></div>
                <button @click="expanded = !expanded" class="mt-2 text-[#757575]/40 relative z-10">
                    <span x-show="!expanded">ещё...</span>
                    <span x-show="expanded">скрыть</span>
                </button>
            </div>
        </div>
    </div>
    <hr class="border-b border-[#D7DADF]/30 mx-[16px] md:mx-[40px]"/>
    <div class="flex flex-col pt-[28px] pb-[40px] md:pb-[60px]">
        <div class="mb-[20px] md:mb-[26px] px-[16px] md:px-[40px]">
            <div class="font-medium text-[20px] text-[#0B131D]">Подборка для новичка</div>
        </div>
        <div class="overflow-x-auto hide-scrollbar w-full">
            <div class="flex min-w-max gap-[12px] md:gap-[20px] px-[16px] md:px-[40px]">
                @forelse(range(1, 10) as $story)
                    <a href="">
                        <div class="border-[1.5px] border-[#2272DD] rounded-[14px] p-[5px] shrink-0">
                            <div class="relative rounded-[10px] overflow-hidden">
                                <div class="relative h-[110px] w-[110px] md:h-[158px] md:w-[158px]">
                                    <img src="https://www.k12digest.com/wp-content/uploads/2024/03/1-3-550x330.jpg" alt="img" class="absolute top-0 left-0 w-full h-full object-cover object-center">
                                    <div class="absolute w-full h-full bg-gradient-to-t from-black via-transparent to-transparent"></div>
                                </div>
                                <div class="absolute left-0 bottom-0 p-[16px]">
                                    <div class="text-white font-medium md:text-[14px] text-[11px]">Как выбрать круиз?</div>
                                </div>
                                <div class="absolute top-[16px] right-[16px]">
                                    @include('icons.link')
                                </div>
                            </div>
                        </div>
                    </a>
                @empty
                    <a href="" class="w-full">
                        <x-admin.add-button title="Добавить первую подборку"/>
                    </a>
                @endforelse
            </div>
        </div>
    </div>
    <hr class="border-b border-[#D7DADF]/30 mx-[16px] md:mx-[40px]"/>
    <div class="pt-[30px] md:pt-[50px] pb-[30px] md:pb-[60px]">
        <div class="mb-[26px] md:mb-[36px] flex gap-[15px] justify-between items-center px-[16px] md:px-[40px]">
            <div class="font-medium text-[20px] md:text-[26px] text-[#0B131D]">Видео про inCruises</div>
            <a href="#" class="text-[#0B131D]/40 font-medium text-[14px] md:text-[16px] text-end text-nowrap">Все видео</a>
        </div>
        <div class="overflow-x-auto hide-scrollbar w-full">
            <div class="flex min-w-max gap-[20px] px-[16px] md:px-[40px]">
                @forelse(range(1, 5) as $story)
                    <a href="">
                        <x-admin.video-card/>
                    </a>
                @empty
                    <a href="" class="w-full">
                        <x-admin.add-button title="Добавить первое видео"/>
                    </a>
                @endforelse
            </div>
        </div>
    </div>
    <hr class="border-b border-[#D7DADF]/30 mx-[16px] md:mx-[40px]"/>
    <div class="pt-[50px] pb-[60px]">
        <div class="mb-[26px] md:mb-[36px] flex gap-[15px] justify-between items-center px-[16px] md:px-[40px]">
            <div class="font-medium text-[20px] md:text-[26px] text-[#0B131D]">Истории жизни в inCruises</div>
            <a href="#" class="text-[#0B131D]/40 font-medium text-[14px] md:text-[16px] text-end text-nowrap">Все истории</a>
        </div>
        <div class="overflow-x-auto hide-scrollbar w-full">
            <div class="flex min-w-max gap-[20px] px-[16px] md:px-[40px]">
                @forelse(range(1, 5) as $story)
                    <a href="">
                        <x-admin.history-card/>
                    </a>
                @empty
                    <a href="" class="w-full">
                        <x-admin.add-button title="Добавить первую историю"/>
                    </a>
                @endforelse
            </div>
        </div>
    </div>
    <hr class="border-b border-[#D7DADF]/30 mx-[16px] md:mx-[40px]"/>
    <div class="pt-[50px] pb-[60px]">
        <div class="mb-[26px] md:mb-[36px] flex gap-[15px] justify-between items-center px-[16px] md:px-[40px]">
            <div class="font-medium text-[20px] md:text-[26px] text-[#0B131D]">Истории жизни в inCruises</div>
            <a href="#" class="text-[#0B131D]/40 font-medium text-[14px] md:text-[16px] text-end text-nowrap">Все истории</a>
        </div>
        <div class="overflow-x-auto hide-scrollbar w-full">
            <div class="flex min-w-max gap-[20px] px-[16px] md:px-[40px]">
                @forelse(range(1, 5) as $story)
                    <a href="">
                        <x-admin.review-card/>
                    </a>
                @empty
                    <a href="" class="w-full">
                        <x-admin.add-button title="Добавить первый отзыв"/>
                    </a>
                @endforelse
            </div>
        </div>
    </div>
@endsection
