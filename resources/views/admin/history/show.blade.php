@extends('layouts.admin.app')

@section('content')
    <div class="flex flex-col items-center py-[40px]">
        <div class="max-w-[620px] w-full">
            {{-----------------------------------------------------------------------------------------------------------}}
            <div class="flex items-center justify-between mb-[27px] px-[16px]">
                <a href="{{ redirect()->back()->getTargetUrl() }}">
                    <div class="font-medium text-[15px] text-[#5A6472]">← Вернуться</div>
                </a>
                <div class="flex gap-[12px] items-center">
                    <div class="font-medium text-[15px] text-[#5A6472]">Мои истории</div>
                    @include('icons.down', ['color' => '#5A6472'])
                </div>
            </div>
            <div class="flex flex-col">
                {{-----------------------------------------------------------------------------------------------------------}}
                <div class="px-[16px] md:px-0">
                    <div class="h-[180px] md:h-[315px] relative rounded-[10px] overflow-hidden mb-[10px] md:mb-[20px]">
                        <img src="https://www.k12digest.com/wp-content/uploads/2024/03/1-3-550x330.jpg" alt="img" class="absolute top-0 left-0 w-full h-full object-cover object-center">
                        <div class="absolute w-full h-full bg-black/30"></div>
                        <div class="absolute top-1/2 left-1/2 -translate-1/2 bg-white/80 w-[40px] h-[40px] rounded-full flex items-center justify-center">
                            @include('icons.play')
                        </div>
                    </div>
                </div>

                {{-----------------------------------------------------------------------------------------------------------}}
                <div class="md:bg-[#F9F9F9] rounded-[20px] pt-[10px] md:pt-[24px] pb-[30px]">
                    <div class="px-[16px] md:px-[26px]">

                        {{-----------------------------------------------------------------------------------------------------------}}
                        <div class="flex justify-between mb-[23px]">
                            <div class="font-medium text-[15px] md:text-[14px] text-[#9EA9B7]">11 апр 2025</div>
                            <div class="flex gap-[26px] items-center">
                                <div class="flex gap-[8px] items-center">
                                    @include('icons.views')
                                    <div class="font-medium text-[15px] md:text-[14px] text-[#9EA9B7]">679</div>
                                </div>
                                @include('icons.three-dot')
                            </div>
                        </div>

                        {{-----------------------------------------------------------------------------------------------------------}}
                        <div class="mb-[12px]">
                            <div class="font-semibold text-[20px] md:text-[24px] text-[#0B131D]">Мой первый круиз ✨</div>
                        </div>

                        {{-----------------------------------------------------------------------------------------------------------}}
                        <div class="flex gap-[10px] items-center mb-[20px] md:mb-[30px]">
                            <img src="https://pbs.twimg.com/profile_images/1701878932176351232/AlNU3WTK_400x400.jpg" alt="img" class="rounded-full w-[30px] h-[30px]">
                            <div class="font-medium text-[15px] text-[#85898E]">Жулдыз Кульжабекова</div>
                        </div>

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
                    <div class="flex overflow-y-auto">
                        <img src="https://www.k12digest.com/wp-content/uploads/2024/03/1-3-550x330.jpg" alt="img" class="w-[206px] h-[257px]">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
