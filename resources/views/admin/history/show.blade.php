@extends('layouts.admin.app')

@section('content')
    <div class="flex flex-col items-center py-[40px]">
        <div class="max-w-[620px] w-full">
            <div class="flex items-center justify-between mb-[27px] px-[16px]">
                <a href="{{ redirect()->back()->getTargetUrl() }}">
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
                        <img src="https://www.k12digest.com/wp-content/uploads/2024/03/1-3-550x330.jpg" alt="img" class="absolute top-0 left-0 w-full h-full object-cover object-center">
                        <div class="absolute w-full h-full bg-black/30"></div>
                        <div class="absolute top-1/2 left-1/2 -translate-1/2 bg-white/80 w-[40px] h-[40px] rounded-full flex items-center justify-center">
                            @include('components.icons.play')
                        </div>
                    </div>
                </div>

                {{----------------------------------BLOCK------------------------------------------}}
                @foreach(range(1, 5) as $index => $history)
                    <div class="md:bg-[#F9F9F9] rounded-[20px] pt-0 md:pt-[24px] pb-[30px]">
                        @if($index == 0)
                            <div class="px-[16px] md:px-[26px]">
                                {{--HEADER--}}
                                <div class="flex justify-between mb-[23px]">
                                    <div class="font-medium text-[15px] md:text-[14px] text-[#9EA9B7]">11 апр 2025</div>
                                    <div class="flex gap-[26px] items-center">
                                        <div class="flex gap-[8px] items-center">
                                            @include('components.icons.views')
                                            <div class="font-medium text-[15px] md:text-[14px] text-[#9EA9B7]">679</div>
                                        </div>
                                        @include('components.icons.three-dot')
                                    </div>
                                </div>

                                {{--TITLE--}}
                                <div class="mb-[12px]">
                                    <div class="font-semibold text-[20px] md:text-[24px] text-[#0B131D]">Мой первый круиз ✨</div>
                                </div>

                                {{--AUTHOR--}}
                                <div class="flex gap-[10px] items-center mb-[20px] md:mb-[30px]">
                                    <img src="https://pbs.twimg.com/profile_images/1701878932176351232/AlNU3WTK_400x400.jpg" alt="img" class="rounded-full w-[30px] h-[30px]">
                                    <div class="font-medium text-[15px] text-[#85898E]">Жулдыз Кульжабекова</div>
                                </div>
                            </div>
                        @endif
                        <div class="flex flex-col gap-[20px]">
                            <div class="px-[16px] md:px-[26px]">
                                <div class="font-medium text-[15px] text-[#5A6472]">
                                    Впервые я почувствовала масштаб компании, когда полетела в Астану на мероприятие inCruises ✈️ Одолжила денег у подруги — просто внутренний отклик был: раз живём, почему бы не попробовать?
                                    <br/>
                                    <br/>
                                    На сцене выступали люди, которые рассказывали свои истории. И я увидела что стояла там, где когда-то стояли они. Тогда я вдохновилась и решила накопить на круиз в Европу.
                                    <br/>
                                    <br/>
                                    Первая попытка не получилась и отказали в визе в 2023 году. Но за это время я успела побывать уже в трёх круизах и в нескольких странах.
                                    <br/>
                                    В ноябре 2025 будет моя вторая попытка попасть в Европу. И в этот раз я уверена – все получится. 😊
                                </div>
                            </div>
                            @isset($images)
                                <div class="flex px-[16px] md:px-[26px] w-full gap-[10px] md:gap-[20px] {{ count($images) > 2 ? 'overflow-x-auto hide-scrollbar' : '' }}">
                                    @foreach($images as $image)
                                        <img src="https://www.k12digest.com/wp-content/uploads/2024/03/1-3-550x330.jpg" alt="img" class="{{ count($images) == 1 ? 'w-[322px] h-[430px] md:w-[322px] md:h-[430px]' : '' }} {{ count($images) == 2 ? 'h-[202px] md:h-[342px] flex-1 basis-0 min-w-0 ' : '' }} {{ count($images) > 2 ? 'w-[206px] h-[257px]' : '' }} rounded-[6px] object-center object-cover">
                                    @endforeach
                                </div>
                            @endisset
                            <div class="px-[16px] md:px-[26px]">
                                <div class="h-[180px] md:h-[315px] relative rounded-[10px] overflow-hidden">
                                    <img src="https://www.k12digest.com/wp-content/uploads/2024/03/1-3-550x330.jpg" alt="img" class="absolute top-0 left-0 w-full h-full object-cover object-center">
                                    <div class="absolute w-full h-full bg-black/30"></div>
                                    <div class="absolute top-1/2 left-1/2 -translate-1/2 bg-white/80 w-[40px] h-[40px] rounded-full flex items-center justify-center">
                                        @include('components.icons.play')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
