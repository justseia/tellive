@extends('layouts.landing.app')

@section('content')
    {{--    SECTION 1    --}}
    @if($banners->isNotEmpty())
        <div
            class="max-w-[1340px] w-full mx-auto"
            x-data="{
                active: 0,
                total: {{ $banners->count() }},
                init() {
                    setInterval(() => {
                        this.active = (this.active + 1) % this.total;
                    }, 3000);
                }
            }"
        >
            <div class="mt-[30px] mb-[80px] relative h-[544px]">
                @foreach($banners as $index => $banner)
                    <div x-show="active === {{ $index }}"
                         x-transition:enter="transition ease-out duration-700"
                         x-transition:enter-start="opacity-0"
                         x-transition:enter-end="opacity-100"
                         x-transition:leave="transition ease-in duration-700"
                         x-transition:leave-start="opacity-100"
                         x-transition:leave-end="opacity-0"
                         class="absolute w-full h-full flex flex-col justify-center px-[50px] bg-cover bg-center rounded-[20px]"
                         style="background-image: url('{{ $banner->image_url }}')">
                        <div class="mb-[20px] font-medium text-[50px] text-white">{{ $banner->title }}</div>
                        <div class="mb-[50px] font-medium text-[18px] text-white">{{ $banner->text_banner }}</div>
                        <a href="{{ $banner->url_button }}" class="w-fit" target="_blank">
                            <div class="px-[32px] py-[16px] rounded-[4px] bg-[#2272DD] text-white font-semibold text-[16px]">{{ $banner->text_button }}</div>
                        </a>
                    </div>
                @endforeach

                @if($banners->count() > 1)
                    <div class="absolute right-1/2 translate-x-1/2 bottom-[58px] flex gap-[14px]">
                        @foreach($banners as $index => $banner)
                            <div :class="active === {{ $index }} ? 'bg-white' : 'bg-white/50'" class="rounded-full h-[4px] w-[35px] transition-all"></div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    @endif


    {{--    SECTION 2    --}}
    <div class="max-w-[1240px] w-full mx-auto">
        <div class="mb-[120px]">
            <div class="mb-[20px] font-medium text-[50px] text-[#0B131D]">Как inCruises помогает путешествовать</div>
            <div class="mb-[50px] font-medium text-[18px] text-[#0B131D]">
                Простой способ начать копить на отдых.
                <br>
                Бонусы, скидки и свобода выбора — всё работает на тебя.
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-[20px]">
                <div class="flex flex-col bg-[#2272DD] rounded-[16px] px-[24px] py-[20px]">
                    <div class="w-[60px] h-[60px] rounded-full bg-white/15 flex items-center justify-center mb-[22px]">
                        <x-icons.money/>
                    </div>
                    <div class="mb-[16px] font-medium text-[24px] text-white">
                        Копишь — получаешь
                        <br>
                        в 2 раза больше
                    </div>
                    <div class="font-medium text-[18px] text-white/80">Копишь 100$ — на счет поступают $200 бонусов. Этими бонусами оплачиваешь 50% стоимости круиза</div>
                </div>
                <div class="flex flex-col bg-white rounded-[16px] px-[24px] py-[20px]">
                    <div class="w-[60px] h-[60px] rounded-full bg-[#F1F1F3] flex items-center justify-center mb-[22px]">
                        <x-icons.beach/>
                    </div>
                    <div class="mb-[16px] font-medium text-[24px] text-[#0B131D]">
                        Люкс отдых по цене
                        <br>
                        обычного
                    </div>
                    <div class="font-medium text-[18px] text-[#9EA9B7]">Всё включено - без доплат: Проживание, питание, детский отдых, шоу — каждый день в новой стране.</div>
                </div>
                <div class="flex flex-col bg-white rounded-[16px] px-[24px] py-[20px]">
                    <div class="w-[60px] h-[60px] rounded-full bg-[#F1F1F3] flex items-center justify-center mb-[22px]">
                        <x-icons.bag/>
                    </div>
                    <div class="mb-[16px] font-medium text-[24px] text-[#0B131D]">
                        14 дней — чтобы
                        <br>
                        спокойно всё обдумать
                    </div>
                    <div class="font-medium text-[18px] text-[#9EA9B7]">Гарантия возврата средств. Если не подойдёт - просто вернём деньги.</div>
                </div>
                <div class="flex flex-col bg-white rounded-[16px] px-[24px] py-[20px]">
                    <div class="w-[60px] h-[60px] rounded-full bg-[#F1F1F3] flex items-center justify-center mb-[22px]">
                        <x-icons.touch/>
                    </div>
                    <div class="mb-[16px] font-medium text-[24px] text-[#0B131D]">
                        Без переплат и
                        <br>
                        посредников
                    </div>
                    <div class="font-medium text-[18px] text-[#9EA9B7]">Бронируешь круиз на официальном сайте - или мы поддержим</div>
                </div>
                <div class="flex flex-col bg-white rounded-[16px] px-[24px] py-[20px]">
                    <div class="w-[60px] h-[60px] rounded-full bg-[#F1F1F3] flex items-center justify-center mb-[22px]">
                        <x-icons.home/>
                    </div>
                    <div class="mb-[16px] font-medium text-[24px] text-[#0B131D]">
                        Экономия при первом
                        <br>
                        бронировании
                    </div>
                    <div class="font-medium text-[18px] text-[#9EA9B7]">Экономь 17% уже с первого дня. Сразу, без накоплений и условий</div>
                </div>
                <div class="flex flex-col bg-white rounded-[16px] px-[24px] py-[20px]">
                    <div class="w-[60px] h-[60px] rounded-full bg-[#F1F1F3] flex items-center justify-center mb-[22px]">
                        <x-icons.lock/>
                    </div>
                    <div class="mb-[16px] font-medium text-[24px] text-[#0B131D]">
                        Все средства под
                        <br>
                        защитой Trust My Travel
                    </div>
                    <div class="font-medium text-[18px] text-[#9EA9B7]">Членские взносы хранятся в Barclays - №2 банк в Великобритании</div>
                </div>
            </div>
        </div>
    </div>


    {{--    SECTION 3    --}}
    <div class="mb-[120px]">
        <div class="max-w-[1240px] w-full mx-auto">
            <div class="mb-[60px] font-medium text-[50px] text-[#0B131D]">Один день из круиза</div>
        </div>
        <div class="flex gap-[20px] overflow-x-auto px-[calc((100%-1240px)/2)] hide-scrollbar">
            <div class="relative rounded-[20px] w-[360px] h-[360px] overflow-hidden shrink-0">
                <img src="{{ asset('assets/images/section3_1.png') }}" alt="img" class="absolute top-0 left-0 w-full h-full object-cover object-center">
                <div class="absolute w-full h-full bg-gradient-to-t from-black via-transparent to-transparent"></div>
                <div class="absolute bottom-0 left-0 p-[30px]">
                    <div class="font-semibold text-[22px] text-white">
                        Твой билет в
                        <br>
                        беззаботное
                        <br>
                        путешествие
                    </div>
                </div>
            </div>
            <div class="relative rounded-[20px] w-[360px] h-[360px] overflow-hidden shrink-0">
                <img src="{{ asset('assets/images/section3_2.png') }}" alt="img" class="absolute top-0 left-0 w-full h-full object-cover object-center">
                <div class="absolute w-full h-full bg-gradient-to-t from-black via-transparent to-transparent"></div>
                <div class="absolute bottom-0 left-0 p-[30px]">
                    <div class="font-semibold text-[17px] text-white">Отдых - без суеты</div>
                    <div class="font-semibold text-[16px] text-white/80">Проживание, еда, маршрут - все уже продумано.</div>
                </div>
            </div>
            <div class="relative rounded-[20px] w-[360px] h-[360px] overflow-hidden shrink-0">
                <img src="{{ asset('assets/images/section3_3.png') }}" alt="img" class="absolute top-0 left-0 w-full h-full object-cover object-center">
                <div class="absolute w-full h-full bg-gradient-to-t from-black via-transparent to-transparent"></div>
                <div class="absolute bottom-0 left-0 p-[30px]">
                    <div class="font-semibold text-[17px] text-white">Новая страна — каждый день</div>
                    <div class="font-semibold text-[16px] text-white/80">Исследуешь новые города - а чемодан остается на лайнере</div>
                </div>
            </div>
            <div class="relative rounded-[20px] w-[360px] h-[360px] overflow-hidden shrink-0">
                <img src="{{ asset('assets/images/section3_4.png') }}" alt="img" class="absolute top-0 left-0 w-full h-full object-cover object-center">
                <div class="absolute w-full h-full bg-gradient-to-t from-black via-transparent to-transparent"></div>
                <div class="absolute bottom-0 left-0 p-[30px]">
                    <div class="font-semibold text-[17px] text-white">Качественное время с семьей</div>
                    <div class="font-semibold text-[16px] text-white/80">В незнакомом месте - вы ближе, чем когда-либо.</div>
                </div>
            </div>
            <div class="relative rounded-[20px] w-[360px] h-[360px] overflow-hidden shrink-0">
                <img src="{{ asset('assets/images/section3_5.png') }}" alt="img" class="absolute top-0 left-0 w-full h-full object-cover object-center">
                <div class="absolute w-full h-full bg-gradient-to-t from-black via-transparent to-transparent"></div>
                <div class="absolute bottom-0 left-0 p-[30px]">
                    <div class="font-semibold text-[17px] text-white">Никаких цен в меню</div>
                    <div class="font-semibold text-[16px] text-white/80">Рестораны уровня Мишлен. Выбираешь и ешь с удовольствием.</div>
                </div>
            </div>
            <div class="relative rounded-[20px] w-[360px] h-[360px] overflow-hidden shrink-0">
                <img src="{{ asset('assets/images/section3_6.png') }}" alt="img" class="absolute top-0 left-0 w-full h-full object-cover object-center">
                <div class="absolute w-full h-full bg-gradient-to-t from-black via-transparent to-transparent"></div>
                <div class="absolute bottom-0 left-0 p-[30px]">
                    <div class="font-semibold text-[17px] text-white">Детям - бесплатно</div>
                    <div class="font-semibold text-[16px] text-white/80">На многих круизах дети до 18 едут бесплатно. Также есть присмотр</div>
                </div>
            </div>
        </div>
    </div>


    {{--    SECTION 4    --}}
    <div class="mb-[120px]">
        <div class="max-w-[1240px] w-full mx-auto">
            <div class="mb-[24px] font-medium text-[50px] text-[#0B131D]">
                <span class="text-[#2272DD]">Всё включено</span>
                - значит
                <br>
                без неожиданных расходов
            </div>
            <div class="mb-[50px] font-medium text-[18px] text-[#0B131D]">
                Круиз – это пятизвёздочный отель, только каждый день в новом городе.
                <br>
                Без доплат за еду, развлечения или комфорт. Всё уже входит в первоначальную стоимость
            </div>
        </div>
        <div class="flex gap-[20px] lg:grid grid-cols-4 overflow-x-auto px-[calc((100%-1240px)/2)] lg:px-0 lg:mx-auto lg:max-w-[1240px] lg:w-full hide-scrollbar">
            <div class="relative h-[364px] w-[295px] lg:w-full rounded-[16px] overflow-hidden shrink-0">
                <div class="relative w-full h-full">
                    <img src="{{ asset('assets/images/section4_1.png') }}" alt="img" class="absolute top-0 left-0 w-full h-full object-cover object-center">
                    <div class="absolute w-full h-full bg-gradient-to-t from-black via-transparent to-transparent"></div>
                </div>
                <div class="absolute top-0 bottom-0 w-full p-[16px] flex flex-col justify-between">
                    <div class="px-[18px] py-[8px] rounded-full bg-white w-fit">
                        <div class="font-semibold text-[14px] text-[#0B131D]">Включено в стоимость</div>
                    </div>
                    <div class="flex flex-col p-[14px]">
                        <div class="font-semibold text-[18px] text-white">Бассейн, джакузи, палуба для загара</div>
                    </div>
                </div>
            </div>
            <div class="relative h-[364px] w-[295px] lg:w-full rounded-[16px] overflow-hidden shrink-0">
                <div class="relative w-full h-full">
                    <img src="{{ asset('assets/images/section4_2.png') }}" alt="img" class="absolute top-0 left-0 w-full h-full object-cover object-center">
                    <div class="absolute w-full h-full bg-gradient-to-t from-black via-transparent to-transparent"></div>
                </div>
                <div class="absolute top-0 bottom-0 w-full p-[16px] flex flex-col justify-between">
                    <div class="px-[18px] py-[8px] rounded-full bg-white w-fit">
                        <div class="font-semibold text-[14px] text-[#0B131D]">Включено в стоимость</div>
                    </div>
                    <div class="flex flex-col p-[14px]">
                        <div class="font-semibold text-[18px] text-white">Рестораны и шведский стол</div>
                    </div>
                </div>
            </div>
            <div class="relative h-[364px] w-[295px] lg:w-full rounded-[16px] overflow-hidden shrink-0">
                <div class="relative w-full h-full">
                    <img src="{{ asset('assets/images/section4_3.png') }}" alt="img" class="absolute top-0 left-0 w-full h-full object-cover object-center">
                    <div class="absolute w-full h-full bg-gradient-to-t from-black via-transparent to-transparent"></div>
                </div>
                <div class="absolute top-0 bottom-0 w-full p-[16px] flex flex-col justify-between">
                    <div class="px-[18px] py-[8px] rounded-full bg-white w-fit">
                        <div class="font-semibold text-[14px] text-[#0B131D]">Включено в стоимость</div>
                    </div>
                    <div class="flex flex-col p-[14px]">
                        <div class="font-semibold text-[18px] text-white">Мишленовская кухня</div>
                    </div>
                </div>
            </div>
            <div class="relative h-[364px] w-[295px] lg:w-full rounded-[16px] overflow-hidden shrink-0">
                <div class="relative w-full h-full">
                    <img src="{{ asset('assets/images/section4_4.png') }}" alt="img" class="absolute top-0 left-0 w-full h-full object-cover object-center">
                    <div class="absolute w-full h-full bg-gradient-to-t from-black via-transparent to-transparent"></div>
                </div>
                <div class="absolute top-0 bottom-0 w-full p-[16px] flex flex-col justify-between">
                    <div class="px-[18px] py-[8px] rounded-full bg-white w-fit">
                        <div class="font-semibold text-[14px] text-[#0B131D]">Включено в стоимость</div>
                    </div>
                    <div class="flex flex-col p-[14px]">
                        <div class="font-semibold text-[18px] text-white">Развлекательные шоу, театр, караоке, клуб</div>
                    </div>
                </div>
            </div>
            <div class="relative h-[364px] w-[295px] lg:w-full rounded-[16px] overflow-hidden shrink-0">
                <div class="relative w-full h-full">
                    <img src="{{ asset('assets/images/section4_5.png') }}" alt="img" class="absolute top-0 left-0 w-full h-full object-cover object-center">
                    <div class="absolute w-full h-full bg-gradient-to-t from-black via-transparent to-transparent"></div>
                </div>
                <div class="absolute top-0 bottom-0 w-full p-[16px] flex flex-col justify-between">
                    <div class="px-[18px] py-[8px] rounded-full bg-white w-fit">
                        <div class="font-semibold text-[14px] text-[#0B131D]">Включено в стоимость</div>
                    </div>
                    <div class="flex flex-col p-[14px]">
                        <div class="font-semibold text-[18px] text-white">Спортплощадки</div>
                    </div>
                </div>
            </div>
            <div class="relative h-[364px] w-[295px] lg:w-full rounded-[16px] overflow-hidden shrink-0">
                <div class="relative w-full h-full">
                    <img src="{{ asset('assets/images/section4_6.png') }}" alt="img" class="absolute top-0 left-0 w-full h-full object-cover object-center">
                    <div class="absolute w-full h-full bg-gradient-to-t from-black via-transparent to-transparent"></div>
                </div>
                <div class="absolute top-0 bottom-0 w-full p-[16px] flex flex-col justify-between">
                    <div class="px-[18px] py-[8px] rounded-full bg-white w-fit">
                        <div class="font-semibold text-[14px] text-[#0B131D]">Включено в стоимость</div>
                    </div>
                    <div class="flex flex-col p-[14px]">
                        <div class="font-semibold text-[18px] text-white">Фитнес зал</div>
                    </div>
                </div>
            </div>
            <div class="relative h-[364px] w-[295px] lg:w-full rounded-[16px] overflow-hidden shrink-0">
                <div class="relative w-full h-full">
                    <img src="{{ asset('assets/images/section4_7.png') }}" alt="img" class="absolute top-0 left-0 w-full h-full object-cover object-center">
                    <div class="absolute w-full h-full bg-gradient-to-t from-black via-transparent to-transparent"></div>
                </div>
                <div class="absolute top-0 bottom-0 w-full p-[16px] flex flex-col justify-between">
                    <div class="px-[18px] py-[8px] rounded-full bg-white w-fit">
                        <div class="font-semibold text-[14px] text-[#0B131D]">Включено в стоимость</div>
                    </div>
                    <div class="flex flex-col p-[14px]">
                        <div class="font-semibold text-[18px] text-white">Серфинг и водные горки</div>
                    </div>
                </div>
            </div>
            <div class="relative h-[364px] w-[295px] lg:w-full rounded-[16px] overflow-hidden shrink-0">
                <div class="relative w-full h-full">
                    <img src="{{ asset('assets/images/section4_8.png') }}" alt="img" class="absolute top-0 left-0 w-full h-full object-cover object-center">
                    <div class="absolute w-full h-full bg-gradient-to-t from-black via-transparent to-transparent"></div>
                </div>
                <div class="absolute top-0 bottom-0 w-full p-[16px] flex flex-col justify-between">
                    <div class="px-[18px] py-[8px] rounded-full bg-white w-fit">
                        <div class="font-semibold text-[14px] text-[#0B131D]">Включено в стоимость</div>
                    </div>
                    <div class="flex flex-col p-[14px]">
                        <div class="font-semibold text-[18px] text-white">Детский сад и присмотр</div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{--    SECTION 5    --}}
    <div
        class="max-w-[1240px] w-full mx-auto"
        x-data="{
            selectedTariff: 1,
            dataTariff: [
                {
                    title: 'Premium',
                    tooltip: 'Ускоренный темп',
                    description: [
                        'Копишь 250$  — на счет поступают 500 ББ',
                        'inCruises — удваивает твои вложения каждый месяц',
                        'Всего за несколько месяцев выезжаешь в круиз!'
                    ]
                },
                {
                    title: 'Classic',
                    tooltip: 'Оптимальный темп',
                    description: [
                        'Копишь 100$  — на счет поступают 200 ББ',
                        'inCruises — удваивает твои вложения каждый месяц',
                        'Бонусные Баллы тратишь только на круиз'
                    ]
                },
                {
                    title: 'Starter',
                    tooltip: 'Начальный темп',
                    description: [
                        'Копишь 50$  — на счет поступают 50 ББ',
                        'Без удвоения бонусов',
                        'Удобно начать и протестировать систему'
                    ]
                },
                {
                    title: 'Бесплатный вход',
                    tooltip: 'Регистрация',
                    description: [
                        'Зарегистрируйся на сайте и получи 50 ББ на счет!',
                        'Без накоплений и обязательств',
                        'Посмотри на круизы, сравни цены'
                    ]
                }
            ]
        }"
    >
        <div class="mb-[120px]">
            <div class="mb-[24px] font-medium text-[50px] text-[#0B131D]">
                Сравни - как можно начать копить
            </div>
            <div class="mb-[50px] font-medium text-[18px] text-[#0B131D]">
                Ты копишь сумму — на счёт сразу получаешь
                <span class="text-[#2272DD]">в 2 раза больше бонусов.</span>
                <br>
                Бонусными баллами покрываешь 50% любого круиза.
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-[20px]">
                <div class="bg-white w-full rounded-[16px] p-[30px]">
                    <div class="flex flex-col gap-[14px]">
                        <div
                            class="rounded-[6px] bg-[#F7F8F9] h-[92px] w-full flex justify-center px-[20px] border"
                            :class="selectedTariff == 1 ? 'border-[#2272DD]' : 'border-[#8B919F]/20'"
                            @click="selectedTariff = 1"
                        >
                            <div class="w-full flex items-center justify-between">
                                <div class="flex justify-center flex-col gap-[4px]">
                                    <div
                                        class="text-[24px] font-medium"
                                        :class="selectedTariff == 1 ? 'text-[#2272DD]' : 'text-[#B6C1CD]'"
                                    >
                                        $250 в месяц
                                    </div>
                                    <div
                                        class="text-[16px] font-medium"
                                        :class="selectedTariff == 1 ? 'text-[#2272DD]' : 'text-[#A4B1C1]'"
                                    >
                                        Premium
                                    </div>
                                </div>
                                <div
                                    class="px-[14px] h-[38px] flex items-center rounded-[5px] font-medium text-white gap-[8px]"
                                    :class="selectedTariff == 1 ? 'bg-[#2272DD]' : 'bg-[#27313F]'"
                                >
                                    <x-icons.king/>
                                    <span>Премиум</span>
                                </div>
                            </div>
                        </div>
                        <div
                            class="rounded-[6px] bg-[#F7F8F9] h-[92px] w-full flex justify-center px-[20px] border"
                            :class="selectedTariff == 2 ? 'border-[#2272DD]' : 'border-[#8B919F]/20'"
                            @click="selectedTariff = 2"
                        >
                            <div class="w-full flex items-center justify-between">
                                <div class="flex justify-center flex-col gap-[4px]">
                                    <div
                                        class="text-[24px] font-medium"
                                        :class="selectedTariff == 2 ? 'text-[#2272DD]' : 'text-[#B6C1CD]'"
                                    >
                                        $100 в месяц
                                    </div>
                                    <div
                                        class="text-[16px] font-medium"
                                        :class="selectedTariff == 2 ? 'text-[#2272DD]' : 'text-[#A4B1C1]'"
                                    >
                                        Classic
                                    </div>
                                </div>
                                <div
                                    class="px-[14px] h-[38px] flex items-center rounded-[5px] bg-white border font-medium gap-[8px]"
                                    :class="selectedTariff == 2 ? 'border-[#2272DD] text-[#2272DD]' : 'border-[#B6C1CD] text-[#B6C1CD]'"
                                >
                                    Популярный
                                </div>
                            </div>
                        </div>
                        <div
                            class="rounded-[6px] bg-[#F7F8F9] h-[92px] w-full flex justify-center px-[20px] border"
                            :class="selectedTariff == 3 ? 'border-[#2272DD]' : 'border-[#8B919F]/20'"
                            @click="selectedTariff = 3"
                        >
                            <div class="w-full flex items-center justify-between">
                                <div class="flex justify-center flex-col gap-[4px]">
                                    <div
                                        class="text-[24px] font-medium"
                                        :class="selectedTariff == 3 ? 'text-[#2272DD]' : 'text-[#B6C1CD]'"
                                    >
                                        $50 в месяц
                                    </div>
                                    <div
                                        class="text-[16px] font-medium"
                                        :class="selectedTariff == 3 ? 'text-[#2272DD]' : 'text-[#A4B1C1]'"
                                    >
                                        Starter
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div
                            class="rounded-[6px] bg-[#F7F8F9] h-[92px] w-full flex justify-center px-[20px] border"
                            :class="selectedTariff == 4 ? 'border-[#2272DD]' : 'border-[#8B919F]/20'"
                            @click="selectedTariff = 4"
                        >
                            <div class="w-full flex items-center justify-between">
                                <div class="flex justify-center flex-col gap-[4px]">
                                    <div
                                        class="text-[24px] font-medium"
                                        :class="selectedTariff == 4 ? 'text-[#2272DD]' : 'text-[#B6C1CD]'"
                                    >
                                        Бесплатный вход
                                    </div>
                                    <div
                                        class="text-[16px] font-medium"
                                        :class="selectedTariff == 4 ? 'text-[#2272DD]' : 'text-[#A4B1C1]'"
                                    >
                                        Без накоплений
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-white w-full rounded-[16px] p-[30px] flex flex-col justify-between">
                    <div class="flex flex-col w-full">
                        <div class="flex justify-between mb-[20px]">
                            <div class="font-medium text-[30px] text-[#0B131D]" x-html="dataTariff[selectedTariff - 1]['title']"></div>
                            <div class="font-medium text-[18px] text-[#2272DD] py-[10px] px-[16px] bg-[#F8FBFE] rounded-[5px]" x-html="dataTariff[selectedTariff - 1]['tooltip']"></div>
                        </div>
                        <div class="flex flex-col gap-[16px]">
                            <template x-for="description in dataTariff[selectedTariff - 1]['description']" :key="description">
                                <div class="py-[18px] w-full rounded-[6px] flex items-center gap-[10px] bg-[#F7F8F9] px-[20px]">
                                    <div class="rounded-full h-[6px] w-[6px] bg-black hidden lg:block"></div>
                                    <div x-html="description" class="text-[18px]"></div>
                                </div>
                            </template>
                        </div>
                    </div>
                    <div class="flex flex-col w-full gap-[20px]">
                        <div class="font-medium text-[18px] text-[#B6C1CD] text-center">ББ — это бонусные баллы. 1 ББ = $1 при оплате круиза.</div>
                        <a href="#">
                            <div class="bg-[#2272DD] rounded-[6px] text-[18px] text-white h-[52px] flex items-center justify-center">
                                Начать копить
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{--    SECTION 6    --}}



    {{--    SECTION 7    --}}
    <div class="max-w-[1240px] w-full mx-auto mb-[60px]">
        <div class="grid items-center grid-cols-1 lg:grid-cols-12 gap-[20px] mb-[60px]">
            <div class="col-span-7 font-medium text-[50px] text-[#0B131D]">
                inCruises – клуб, который
                <span class="text-[#2272DD]">выбирают</span>
                по всему миру
            </div>
            <div class="col-span-5 font-medium text-[18px] text-[#5A6472]">
                inCruises® – эксклюзивный туристический клуб, основанный на членстве и работающий только по приглашению. inCruises — это копилка, где каждый $ превращается в два на отпуск
            </div>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-[20px]">
            <div class="order-2 lg:order-1 col-span-1 lg:col-span-7 grid grid-cols-1 md:grid-cols-2 gap-[16px]">
                <div class="bg-white rounded-[10px] p-[30px]">
                    <div class="text-[36px] font-medium text-[#0B131D] mb-[42px]">С 2016 года</div>
                    <div class="text-[16px] font-medium text-[#9EA9B7]">8 лет вдохновляем людей по всему миру на доступные круизы</div>
                </div>
                <div class="bg-white rounded-[10px] p-[30px]">
                    <div class="text-[36px] font-medium text-[#0B131D] mb-[42px]">190 000 +</div>
                    <div class="text-[16px] font-medium text-[#9EA9B7]">Тысячи вариантов размещений — море, города, отели, круизы</div>
                </div>
                <div class="bg-white rounded-[10px] p-[30px]">
                    <div class="text-[36px] font-medium text-[#0B131D] mb-[42px]">1 816 784</div>
                    <div class="text-[16px] font-medium text-[#9EA9B7]">С inCruises путешествуют уже почти два миллиона человек</div>
                </div>
                <div class="bg-white rounded-[10px] p-[30px]">
                    <div class="text-[36px] font-medium text-[#0B131D] mb-[42px]">208 стран</div>
                    <div class="text-[16px] font-medium text-[#9EA9B7]">Люди из сотен стран уже в клубе — и их становится все больше</div>
                </div>
            </div>
            <div class="order-1 lg:order-2 col-span-1 lg:col-span-5">
                <div class="rounded-[10px] overflow-hidden h-full w-full">
                    <img src="{{ asset('assets/images/section7_1.png') }}" alt="img" class="object-cover object-center h-full w-full">
                </div>
            </div>
        </div>
    </div>


    {{--    SECTION 8    --}}
    @if($reviews->isNotEmpty())
        <div
            class="max-w-[1240px] w-full mx-auto mb-[120px]"
            x-data="{
                active: 0,
                total: {{ $reviews->count() }},
                prev() {
                    if(this.active == 0) {
                        this.active = this.total;
                    }
                    this.active--;
                },
                next() {
                    if(this.active == this.total - 1) {
                        this.active = -1;
                    }
                    this.active++;
                }
            }"
        >
            <div class="flex flex-col items-center w-full">
                <div class="flex gap-[26px] items-center w-full mb-[20px]">
                    <div @click="prev" class="min-h-[48px] min-w-[48px] h-fit w-fit rounded-full bg-white flex items-center justify-center">
                        <x-icons.left/>
                    </div>
                    @foreach($reviews as $index => $review)
                        <div x-show="active === {{ $index }}"
                             class="w-full h-[493px] grid grid-cols-12 gap-[25px]">
                            <div class="col-span-7 rounded-[20px] p-[40px] bg-white flex flex-col justify-between">
                                <div>
                                    <div class="flex justify-between items-center mb-[30px]">
                                        <div class="text-[18px] font-medium text-[#9EA9B7]">{{ $review->countries }}</div>
                                        <div class="text-[18px] font-medium text-[#9EA9B7]">{{ $review->date->format('d M Y') }}</div>
                                    </div>
                                    <div class="flex flex-col mb-[30px]">
                                        <div class="text-[29px] font-medium text-[#0B131D]">{{ $review->title }}</div>
                                        <div class="text-[16px] font-medium text-[#5A6472]">{{ $review->text_review }}</div>
                                    </div>
                                </div>
                                <div class="text-[18px] font-medium text-[#9EA9B7]">Смотреть все отзывы →</div>
                            </div>
                            <div class="col-span-5 rounded-[20px] overflow-hidden w-full h-full">
                                <img src="{{ $review->image_url }}" alt="img" class="object-cover object-center h-full w-full">
                            </div>
                        </div>
                    @endforeach
                    <div @click="next" class="min-h-[48px] min-w-[48px] h-fit w-fit rounded-full bg-white flex items-center justify-center">
                        <div class="rotate-180">
                            <x-icons.left/>
                        </div>
                    </div>
                </div>

                @if($reviews->count() > 1)
                    <div class="flex gap-[14px]">
                        @foreach($reviews as $index => $review)
                            <div :class="active === {{ $index }} ? 'bg-[#0B131D]' : 'bg-[#0B131D]/16'" class="rounded-full h-[4px] w-[35px] transition-all"></div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    @endif
@endsection
