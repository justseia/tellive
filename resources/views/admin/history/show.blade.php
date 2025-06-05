@php use DragonCode\Support\Facades\Helpers\Str; @endphp
@extends('layouts.admin.app')

@section('content')
    <div class="flex flex-col items-center py-[40px]">
        <div class="max-w-[620px] w-full">
            <div class="flex items-center justify-between mb-[27px] px-[16px]">
                <a href="{{ back()->getTargetUrl() }}">
                    <div class="font-medium text-[15px] text-[#5A6472]">← Вернуться</div>
                </a>
                <div class="flex gap-[12px] items-center">
                    <div class="font-medium text-[15px] text-[#5A6472]">Мои истории</div>
                    @include('components.icons.down', ['color' => '#5A6472'])
                </div>
            </div>
            <div class="flex flex-col gap-[10px] md:gap-[20px]">
                <div class="px-[16px] md:px-0">
                    <div class="h-[180px] md:h-[315px] relative rounded-[10px] overflow-hidden">
                        <img src="{{ $history->image_url }}" alt="img" class="absolute top-0 left-0 w-full h-full object-cover object-center">
                    </div>
                </div>

                {{----------------------------------BLOCK------------------------------------------}}
                @foreach(json_decode($history->blocks) as $index => $block)
                    <div class="md:bg-[#F9F9F9] rounded-[20px] pt-0 md:pt-[24px] pb-[30px]">
                        @if($index == 0)
                            <div class="px-[16px] md:px-[26px]">
                                {{--HEADER--}}
                                <div class="flex justify-between mb-[23px]">
                                    <div class="font-medium text-[15px] md:text-[14px] text-[#9EA9B7]">{{ $history->date->format('d M Y') }}</div>
                                    <div class="flex gap-[26px] items-center">
                                        <div class="flex gap-[8px] items-center">
                                            @include('components.icons.views')
                                            <div class="font-medium text-[15px] md:text-[14px] text-[#9EA9B7]">{{ $history->views }}</div>
                                        </div>
                                        @include('components.icons.three-dot')
                                    </div>
                                </div>

                                {{--TITLE--}}
                                <div class="mb-[12px]">
                                    <div class="font-semibold text-[20px] md:text-[24px] text-[#0B131D]">{{ $history->title }}</div>
                                </div>

                                {{--AUTHOR--}}
                                <div class="flex gap-[10px] items-center mb-[20px] md:mb-[30px]">
                                    <img src="{{ $history->user->avatar }}" alt="img" class="rounded-full w-[30px] h-[30px]">
                                    <div class="font-medium text-[15px] text-[#85898E]">{{ $history->user->first_name . ' ' . $history->user->last_name }}</div>
                                </div>
                            </div>
                        @endif
                        <div class="flex flex-col gap-[20px]">
                            @if(!empty($block->text))
                                <div class="px-[16px] md:px-[26px]">
                                    <div class="font-medium text-[15px] text-[#5A6472]">
                                        {{ $block->text }}
                                    </div>
                                </div>
                            @endif
                            @if(!empty($block->images))
                                <div class="flex px-[16px] md:px-[26px] w-full gap-[10px] md:gap-[20px] {{ count($block->images) > 2 ? 'overflow-x-auto hide-scrollbar' : '' }}">
                                    @foreach($block->images as $image)
                                        <img src="{{ $image }}" alt="img" class="{{ count($block->images) == 1 ? 'w-[322px] h-[430px] md:w-[322px] md:h-[430px]' : '' }} {{ count($block->images) == 2 ? 'h-[202px] md:h-[342px] flex-1 basis-0 min-w-0 ' : '' }} {{ count($block->images) > 2 ? 'w-[206px] h-[257px]' : '' }} rounded-[6px] object-center object-cover">
                                    @endforeach
                                </div>
                            @endif
                            @if(!empty($block->youtube_url))
                                @php
                                    $videoId = Str::before(Str::after($block->youtube_url, 'v='), '&');
                                @endphp
                                <div x-data="{ youtube: false }">
                                    <div @click="youtube = true" class="px-[16px] md:px-[26px]">
                                        <div class="h-[180px] md:h-[315px] relative rounded-[10px] overflow-hidden">
                                            <img src="https://img.youtube.com/vi/{{ $videoId }}/hqdefault.jpg" alt="img" class="absolute top-0 left-0 w-full h-full object-cover object-center">
                                            <div class="absolute w-full h-full bg-black/30"></div>
                                            <div class="absolute top-1/2 left-1/2 -translate-1/2 bg-white/80 w-[40px] h-[40px] rounded-full flex items-center justify-center">
                                                @include('components.icons.play')
                                            </div>
                                        </div>
                                    </div>
                                    <x-admin.youtube-modal :key="'youtube'">
                                        <template x-if="youtube">
                                            <iframe width="100%" height="315" src="https://www.youtube.com/embed/{{ $videoId }}" title="YouTube video player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                        </template>
                                    </x-admin.youtube-modal>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
