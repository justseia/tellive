@extends('layouts.admin.app')

@section('content')
    <div class="px-[16px] md:px-[40px] pt-[30px] pb-[24px]">
        <div class="flex items-center gap-[18px] mb-[20px] md:mb-[24px]">
            <img src="{{ $user->avatar }}" alt="img" class="h-[70px] w-[70px] md:h-[130px] md:w-[130px] rounded-full object-cover object-center shrink-0">
            <div class="flex flex-col">
                <div class="mb-[8px]">
                    <div class="font-medium text-[20px]">{{ $user->first_name . ' ' . $user->last_name }}</div>
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
                <a href="{{ $siteUrl }}" class="bg-[#2272DD] px-[18px] py-[10px] rounded-[4px] font-medium text-[14px] text-white">
                    Открыть сайт
                </a>
                @subdomain
                    <a href="{{ route('admin.profile.edit') }}" class="border border-[#E8E8E8] bg-[#F9F9F9] px-[18px] py-[10px] rounded-[4px] font-medium text-[14px] text-[#0B131D]">
                        Редактировать
                    </a>
                @else
                    <div x-data="{ writeMeOpen: false }">
                        <button @click="writeMeOpen = true" class="border border-[#E8E8E8] bg-[#F9F9F9] px-[18px] py-[10px] rounded-[4px] font-medium text-[14px] text-[#0B131D]">
                            Написать мне
                        </button>
                        <x-admin.modal :key="'writeMeOpen'">
                            <div class="flex flex-col gap-[10px]">
                                <a href="https://wa.me/{{ $user->whatsapp }}">
                                    <div class="rounded-[10px] h-[48px] w-full bg-gray-200 flex items-center gap-[10px] justify-center">
                                        <div class="w-[25px]">
                                            @include('components.icons.whatsapp')
                                        </div>
                                        <div class="text-[15px]">Написать в WhatsApp</div>
                                    </div>
                                </a>
                                <a href="https://t.me/{{ $user->telegram }}">
                                    <div class="rounded-[10px] h-[48px] w-full bg-gray-200 flex items-center gap-[10px] justify-center">
                                        <div class="w-[25px]">
                                            @include('components.icons.telegram')
                                        </div>
                                        <div class="text-[15px]">Написать в Telegram</div>
                                    </div>
                                </a>
                            </div>
                        </x-admin.modal>
                    </div>
                @endsubdomain
            </div>
            @if(isset($user->about_me) && !empty($user->about_me))
                <div x-data="{ expanded: false, scrollHeight: 0 }" x-init="scrollHeight = $refs.text.scrollHeight" class="relative text-[#717171]">
                    <div x-ref="text" x-bind:style="expanded ? `max-height: ${scrollHeight}px` : 'max-height: 3em'" class="overflow-hidden transition-all duration-500 ease-in-out">
                        {!! nl2br(e($user->about_me)) !!}
                    </div>
                    <div x-show="!expanded" x-transition.opacity class="pointer-events-none absolute bottom-8 left-0 w-full h-6 bg-gradient-to-b from-transparent to-white"></div>
                    <button @click="expanded = !expanded" class="mt-2 text-[#757575]/40 relative z-10">
                        <span x-show="!expanded">ещё...</span>
                        <span x-show="expanded">скрыть</span>
                    </button>
                </div>
            @endif
        </div>
    </div>
    <hr class="border-b border-[#D7DADF]/30 mx-[16px] md:mx-[30px]"/>
    <div class="flex flex-col pt-[28px] pb-[40px] md:pb-[60px]">
        <div class="mb-[20px] md:mb-[26px] px-[16px] md:px-[40px]">
            <div class="font-medium text-[20px] text-[#0B131D]">Подборка для новичка</div>
        </div>
        <div class="overflow-x-auto hide-scrollbar w-full">
            <div class="flex min-w-max gap-[12px] md:gap-[20px] px-[16px] md:px-[40px]">
                @forelse(range(1, 5) as $story)
                    <a href="">
                        <x-admin.story/>
                    </a>
                @empty
                    <div class="bg-[#F9F9F9] rounded-[10px] h-[48px] md:h-[59px] flex items-center justify-center w-full">
                        <div class="font-medium text-[15px] text-[#9EA9B7]">Нет данных</div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
    <hr class="border-b border-[#D7DADF]/30 mx-[16px] md:mx-[30px]"/>
    <div class="pt-[30px] md:pt-[50px] pb-[30px] md:pb-[60px]">
        <div class="mb-[26px] md:mb-[36px] flex gap-[15px] justify-between items-center px-[16px] md:px-[40px]">
            <div class="font-medium text-[20px] md:text-[26px] text-[#0B131D]">Видео про inCruises</div>
            <a href="{{ route('admin.video.index') }}" class="text-[#0B131D]/40 font-medium text-[14px] md:text-[16px] text-end text-nowrap">Все видео</a>
        </div>
        <div class="overflow-x-auto hide-scrollbar w-full">
            <div class="flex min-w-max gap-[20px] px-[16px] md:px-[30px]">
                @forelse($videos as $video)
                    <a href="">
                        <x-admin.video-card :video="$video"/>
                    </a>
                @empty
                    @subdomain
                        <a href="{{ route('admin.video.create') }}" class="w-full">
                            <x-admin.add-button title="Добавить первое видео"/>
                        </a>
                    @else
                        <div class="bg-[#F9F9F9] rounded-[10px] h-[48px] md:h-[59px] flex items-center justify-center w-full">
                            <div class="font-medium text-[15px] text-[#9EA9B7]">Нет данных</div>
                        </div>
                    @endsubdomain
                @endforelse
            </div>
        </div>
    </div>
    <hr class="border-b border-[#D7DADF]/30 mx-[16px] md:mx-[30px]"/>
    <div class="pt-[50px] pb-[60px]">
        <div class="mb-[26px] md:mb-[36px] flex gap-[15px] justify-between items-center px-[16px] md:px-[40px]">
            <div class="font-medium text-[20px] md:text-[26px] text-[#0B131D]">Истории жизни в inCruises</div>
            <a href="{{ route('admin.history.index') }}" class="text-[#0B131D]/40 font-medium text-[14px] md:text-[16px] text-end text-nowrap">Все истории</a>
        </div>
        <div class="overflow-x-auto hide-scrollbar w-full">
            <div class="flex min-w-max gap-[20px] px-[16px] md:px-[30px]">
                @forelse($histories as $history)
                    <a href="{{ route('admin.history.show', $history) }}">
                        <x-admin.history-card :history="$history"/>
                    </a>
                @empty
                    @subdomain
                    <a href="{{ route('admin.history.create') }}" class="w-full">
                        <x-admin.add-button title="Добавить первую историю"/>
                    </a>
                @else
                    <div class="bg-[#F9F9F9] rounded-[10px] h-[48px] md:h-[59px] flex items-center justify-center w-full">
                        <div class="font-medium text-[15px] text-[#9EA9B7]">Нет данных</div>
                    </div>
                    @endsubdomain
                    @endforelse
            </div>
        </div>
    </div>
    <hr class="border-b border-[#D7DADF]/30 mx-[16px] md:mx-[30px]"/>
    <div class="pt-[50px] pb-[60px]">
        <div class="mb-[26px] md:mb-[36px] flex gap-[15px] justify-between items-center px-[16px] md:px-[40px]">
            <div class="font-medium text-[20px] md:text-[26px] text-[#0B131D]">Истории жизни в inCruises</div>
            <a href="#" class="text-[#0B131D]/40 font-medium text-[14px] md:text-[16px] text-end text-nowrap">Все истории</a>
        </div>
        <div class="overflow-x-auto hide-scrollbar w-full">
            <div class="flex min-w-max gap-[20px] px-[16px] md:px-[30px]">
                @forelse($reviews as $review)
                    <a href="">
                        <x-admin.review-card :review="$review" :typeTravelEnum="$typeTravelEnum"/>
                    </a>
                @empty
                    @subdomain
                    <a href="{{ route('admin.review.create') }}" class="w-full">
                        <x-admin.add-button title="Добавить первый отзыв"/>
                    </a>
                @else
                    <div class="bg-[#F9F9F9] rounded-[10px] h-[48px] md:h-[59px] flex items-center justify-center w-full">
                        <div class="font-medium text-[15px] text-[#9EA9B7]">Нет данных</div>
                    </div>
                    @endsubdomain
                    @endforelse
            </div>
        </div>
    </div>
@endsection
