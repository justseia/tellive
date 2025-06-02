@extends('layouts.landing.app')

@section('content')
    {{-- SECTION 1 --}}
    @if($banners->isNotEmpty())
        <div
            class="mx-auto w-full max-w-[1340px] px-[10px] md:px-[20px] lg:px-0 mt-[10px] mb-[50px] md:mb-[60px] lg:mb-[80px]"
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
            <div class="relative h-[483px] md:mt-[20px] md:h-[467px] lg:mt-[30px] lg:h-[544px]">
                @foreach($banners as $index => $banner)
                    <div
                        x-show="active === {{ $index }}"
                        x-transition:enter="transition ease-out duration-700"
                        x-transition:enter-start="opacity-0"
                        x-transition:enter-end="opacity-100"
                        x-transition:leave="transition ease-in duration-700"
                        x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0"
                        class="absolute flex h-full w-full flex-col justify-center rounded-[20px] bg-cover bg-center px-[20px] md:px-[34px] lg:px-[50px]"
                        style="background-image: url('{{ $banner->image_url }}')"
                    >
                        <div class="mb-[16px] text-[32px] font-medium text-white md:mb-[20px] md:text-[40px] lg:text-[50px] line-clamp-3 md:line-clamp-2">{{ $banner->title }}</div>
                        <div class="mb-[70px] text-[18px] font-medium text-white md:mb-[40px] lg:mb-[50px] line-clamp-3 md:line-clamp-2">{{ $banner->text_banner }}</div>
                        <a href="{{ $banner->url_button }}" class="w-full md:w-fit text-center" target="_blank">
                            <div class="rounded-[4px] bg-[#2272DD] px-[32px] py-[12px] lg:py-[16px] text-[16px] font-semibold text-white">{{ $banner->text_button }}</div>
                        </a>
                    </div>
                @endforeach @if($banners->count() > 1)
                    <div class="absolute right-1/2 bottom-[24px] flex translate-x-1/2 gap-[14px] md:bottom-[38px] lg:bottom-[58px]">
                        @foreach($banners as $index => $banner)
                            <div :class="active === {{ $index }} ? 'bg-white' : 'bg-white/50'" class="h-[2px] w-[16px] rounded-full transition-all md:h-[3px] md:w-[24px] lg:h-[4px] lg:w-[35px]"></div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    @endif


    {{-- SECTION 2 --}}
    <div class="mx-auto w-full max-w-[1240px] px-[16px] md:px-[30px] lg:px-0 mb-[50px] md:mb-[90px] lg:mb-[120px]">
        <div class="mb-[16px] lg:mb-[24px] text-[28px] md:text-[40px] lg:text-[50px] font-medium text-[#0B131D]">Как inCruises помогает путешествовать</div>
        <div class="mb-[20px] md:mb-[50px] text-[18px] font-medium text-[#0B131D]">
            Простой способ начать копить на отдых.
            <br/>
            Бонусы, скидки и свобода выбора — всё работает на тебя.
        </div>
        <div class="grid grid-cols-1 gap-[10px] md:gap-[20px] md:grid-cols-2 lg:grid-cols-3">
            <div class="flex flex-col rounded-[16px] bg-[#2272DD] px-[24px] py-[20px]">
                <div class="mb-[14px] md:mb-[22px] flex h-[40px] w-[40px] md:h-[60px] md:w-[60px] items-center justify-center rounded-full bg-white/15">
                    <x-icons.money/>
                </div>
                <div class="mb-[8px] md:mb-[14px] lg:mb-[16px] text-[22px] lg:text-[24px] font-medium text-white">
                    Копишь — получаешь
                    <br/>
                    в 2 раза больше
                </div>
                <div class="text-[14px] md:text-[18px] font-medium text-white/80">Копишь 100$ — на счет поступают $200 бонусов. Этими бонусами оплачиваешь 50% стоимости круиза</div>
            </div>
            <div class="flex flex-col rounded-[16px] bg-white px-[24px] py-[20px]">
                <div class="mb-[14px] md:mb-[22px] flex h-[40px] w-[40px] md:h-[60px] md:w-[60px] items-center justify-center rounded-full bg-[#F1F1F3]">
                    <x-icons.beach/>
                </div>
                <div class="mb-[8px] md:mb-[14px] lg:mb-[16px] text-[24px] font-medium text-[#0B131D]">
                    Люкс отдых по цене
                    <br/>
                    обычного
                </div>
                <div class="text-[14px] md:text-[18px] font-medium text-[#9EA9B7]">Всё включено - без доплат: Проживание, питание, детский отдых, шоу — каждый день в новой стране.</div>
            </div>
            <div class="flex flex-col rounded-[16px] bg-white px-[24px] py-[20px]">
                <div class="mb-[14px] md:mb-[22px] flex h-[40px] w-[40px] md:h-[60px] md:w-[60px] items-center justify-center rounded-full bg-[#F1F1F3]">
                    <x-icons.bag/>
                </div>
                <div class="mb-[8px] md:mb-[14px] lg:mb-[16px] text-[24px] font-medium text-[#0B131D]">
                    14 дней — чтобы
                    <br/>
                    спокойно всё обдумать
                </div>
                <div class="ttext-[14px] md:ext-[18px] font-medium text-[#9EA9B7]">Гарантия возврата средств. Если не подойдёт - просто вернём деньги.</div>
            </div>
            <div class="flex flex-col rounded-[16px] bg-white px-[24px] py-[20px]">
                <div class="mb-[14px] md:mb-[22px] flex h-[40px] w-[40px] md:h-[60px] md:w-[60px] items-center justify-center rounded-full bg-[#F1F1F3]">
                    <x-icons.touch/>
                </div>
                <div class="mb-[8px] md:mb-[14px] lg:mb-[16px] text-[24px] font-medium text-[#0B131D]">
                    Без переплат и
                    <br/>
                    посредников
                </div>
                <div class="text-[14px] md:text-[18px] font-medium text-[#9EA9B7]">Бронируешь круиз на официальном сайте - или мы поддержим</div>
            </div>
            <div class="flex flex-col rounded-[16px] bg-white px-[24px] py-[20px]">
                <div class="mb-[14px] md:mb-[22px] flex h-[40px] w-[40px] md:h-[60px] md:w-[60px] items-center justify-center rounded-full bg-[#F1F1F3]">
                    <x-icons.home/>
                </div>
                <div class="mb-[8px] md:mb-[14px] lg:mb-[16px] text-[24px] font-medium text-[#0B131D]">
                    Экономия при первом
                    <br/>
                    бронировании
                </div>
                <div class="text-[14px] md:text-[18px] font-medium text-[#9EA9B7]">Экономь 17% уже с первого дня. Сразу, без накоплений и условий</div>
            </div>
            <div class="flex flex-col rounded-[16px] bg-white px-[24px] py-[20px]">
                <div class="mb-[14px] md:mb-[22px] flex h-[40px] w-[40px] md:h-[60px] md:w-[60px] items-center justify-center rounded-full bg-[#F1F1F3]">
                    <x-icons.lock/>
                </div>
                <div class="mb-[8px] md:mb-[14px] lg:mb-[16px] text-[24px] font-medium text-[#0B131D]">
                    Все средства под
                    <br/>
                    защитой Trust My Travel
                </div>
                <div class="text-[14px] md:text-[18px] font-medium text-[#9EA9B7]">Членские взносы хранятся в Barclays - №2 банк в Великобритании</div>
            </div>
        </div>
    </div>


    {{-- SECTION 3 --}}
    <div class="mb-[44px] lg:mb-[70px]">
        <div class="mx-auto w-full max-w-[1240px] px-[16px] md:px-[30px] lg:px-0">
            <div class="mb-[30px] md:mb-[40px] lg:mb-[60px] text-[28px] md:text-[40px] lg:text-[50px] font-medium text-[#0B131D]">Один день из круиза</div>
        </div>
        <div class="hide-scrollbar flex gap-[20px] overflow-x-auto px-[16px] md:px-[30px] lg:px-[calc((100%-1240px)/2)]">
            <div class="relative h-[360px] w-[360px] shrink-0 overflow-hidden rounded-[20px]">
                <img src="{{ asset('assets/images/section3_1.png') }}" alt="img" class="absolute top-0 left-0 h-full w-full object-cover object-center"/>
                <div class="absolute h-full w-full bg-gradient-to-t from-black via-transparent to-transparent"></div>
                <div class="absolute bottom-0 left-0 p-[30px]">
                    <div class="text-[22px] font-semibold text-white">
                        Твой билет в
                        <br/>
                        беззаботное
                        <br/>
                        путешествие
                    </div>
                </div>
            </div>
            <div class="relative h-[360px] w-[360px] shrink-0 overflow-hidden rounded-[20px]">
                <img src="{{ asset('assets/images/section3_2.png') }}" alt="img" class="absolute top-0 left-0 h-full w-full object-cover object-center"/>
                <div class="absolute h-full w-full bg-gradient-to-t from-black via-transparent to-transparent"></div>
                <div class="absolute bottom-0 left-0 p-[30px]">
                    <div class="text-[17px] font-semibold text-white">Отдых - без суеты</div>
                    <div class="text-[16px] font-semibold text-white/80">Проживание, еда, маршрут - все уже продумано.</div>
                </div>
            </div>
            <div class="relative h-[360px] w-[360px] shrink-0 overflow-hidden rounded-[20px]">
                <img src="{{ asset('assets/images/section3_3.png') }}" alt="img" class="absolute top-0 left-0 h-full w-full object-cover object-center"/>
                <div class="absolute h-full w-full bg-gradient-to-t from-black via-transparent to-transparent"></div>
                <div class="absolute bottom-0 left-0 p-[30px]">
                    <div class="text-[17px] font-semibold text-white">Новая страна — каждый день</div>
                    <div class="text-[16px] font-semibold text-white/80">Исследуешь новые города - а чемодан остается на лайнере</div>
                </div>
            </div>
            <div class="relative h-[360px] w-[360px] shrink-0 overflow-hidden rounded-[20px]">
                <img src="{{ asset('assets/images/section3_4.png') }}" alt="img" class="absolute top-0 left-0 h-full w-full object-cover object-center"/>
                <div class="absolute h-full w-full bg-gradient-to-t from-black via-transparent to-transparent"></div>
                <div class="absolute bottom-0 left-0 p-[30px]">
                    <div class="text-[17px] font-semibold text-white">Качественное время с семьей</div>
                    <div class="text-[16px] font-semibold text-white/80">В незнакомом месте - вы ближе, чем когда-либо.</div>
                </div>
            </div>
            <div class="relative h-[360px] w-[360px] shrink-0 overflow-hidden rounded-[20px]">
                <img src="{{ asset('assets/images/section3_5.png') }}" alt="img" class="absolute top-0 left-0 h-full w-full object-cover object-center"/>
                <div class="absolute h-full w-full bg-gradient-to-t from-black via-transparent to-transparent"></div>
                <div class="absolute bottom-0 left-0 p-[30px]">
                    <div class="text-[17px] font-semibold text-white">Никаких цен в меню</div>
                    <div class="text-[16px] font-semibold text-white/80">Рестораны уровня Мишлен. Выбираешь и ешь с удовольствием.</div>
                </div>
            </div>
            <div class="relative h-[360px] w-[360px] shrink-0 overflow-hidden rounded-[20px]">
                <img src="{{ asset('assets/images/section3_6.png') }}" alt="img" class="absolute top-0 left-0 h-full w-full object-cover object-center"/>
                <div class="absolute h-full w-full bg-gradient-to-t from-black via-transparent to-transparent"></div>
                <div class="absolute bottom-0 left-0 p-[30px]">
                    <div class="text-[17px] font-semibold text-white">Детям - бесплатно</div>
                    <div class="text-[16px] font-semibold text-white/80">На многих круизах дети до 18 едут бесплатно. Также есть присмотр</div>
                </div>
            </div>
        </div>
    </div>


    {{-- SECTION 4 --}}
    <div class="mb-[70px] md:mb-[80px] lg:mb-[140px]">
        <div class="mx-auto w-full max-w-[1240px] px-[16px] md:px-[30px] lg:px-0">
            <div class="mb-[16px] lg:mb-[24px] text-[28px] md:text-[40px] lg:text-[50px] font-medium text-[#0B131D]">
                <span class="text-[#2272DD]">Всё включено</span>
                - значит
                <br/>
                без неожиданных расходов
            </div>
            <div class="mb-[40px] lg:mb-[50px] text-[14px] md:text-[16px] lg:text-[18px] font-medium text-[#0B131D]">
                Круиз – это пятизвёздочный отель, только каждый день в новом городе.
                <br/>
                Без доплат за еду, развлечения или комфорт. Всё уже входит в первоначальную стоимость
            </div>
        </div>
        <div class="hide-scrollbar flex grid-cols-4 gap-[20px] overflow-x-auto px-[16px] md:px-[30px] lg:mx-auto lg:grid lg:w-full lg:max-w-[1240px] lg:px-0">
            <div class="relative h-[364px] w-[295px] shrink-0 overflow-hidden rounded-[16px] lg:w-full">
                <div class="relative h-full w-full">
                    <img src="{{ asset('assets/images/section4_1.png') }}" alt="img" class="absolute top-0 left-0 h-full w-full object-cover object-center"/>
                    <div class="absolute h-full w-full bg-gradient-to-t from-black via-transparent to-transparent"></div>
                </div>
                <div class="absolute top-0 bottom-0 flex w-full flex-col justify-between p-[16px]">
                    <div class="w-fit rounded-full bg-white px-[18px] py-[8px]">
                        <div class="text-[14px] font-semibold text-[#0B131D]">Включено в стоимость</div>
                    </div>
                    <div class="flex flex-col p-[14px]">
                        <div class="text-[18px] font-semibold text-white">Бассейн, джакузи, палуба для загара</div>
                    </div>
                </div>
            </div>
            <div class="relative h-[364px] w-[295px] shrink-0 overflow-hidden rounded-[16px] lg:w-full">
                <div class="relative h-full w-full">
                    <img src="{{ asset('assets/images/section4_2.png') }}" alt="img" class="absolute top-0 left-0 h-full w-full object-cover object-center"/>
                    <div class="absolute h-full w-full bg-gradient-to-t from-black via-transparent to-transparent"></div>
                </div>
                <div class="absolute top-0 bottom-0 flex w-full flex-col justify-between p-[16px]">
                    <div class="w-fit rounded-full bg-white px-[18px] py-[8px]">
                        <div class="text-[14px] font-semibold text-[#0B131D]">Включено в стоимость</div>
                    </div>
                    <div class="flex flex-col p-[14px]">
                        <div class="text-[18px] font-semibold text-white">Рестораны и шведский стол</div>
                    </div>
                </div>
            </div>
            <div class="relative h-[364px] w-[295px] shrink-0 overflow-hidden rounded-[16px] lg:w-full">
                <div class="relative h-full w-full">
                    <img src="{{ asset('assets/images/section4_3.png') }}" alt="img" class="absolute top-0 left-0 h-full w-full object-cover object-center"/>
                    <div class="absolute h-full w-full bg-gradient-to-t from-black via-transparent to-transparent"></div>
                </div>
                <div class="absolute top-0 bottom-0 flex w-full flex-col justify-between p-[16px]">
                    <div class="w-fit rounded-full bg-white px-[18px] py-[8px]">
                        <div class="text-[14px] font-semibold text-[#0B131D]">Включено в стоимость</div>
                    </div>
                    <div class="flex flex-col p-[14px]">
                        <div class="text-[18px] font-semibold text-white">Мишленовская кухня</div>
                    </div>
                </div>
            </div>
            <div class="relative h-[364px] w-[295px] shrink-0 overflow-hidden rounded-[16px] lg:w-full">
                <div class="relative h-full w-full">
                    <img src="{{ asset('assets/images/section4_4.png') }}" alt="img" class="absolute top-0 left-0 h-full w-full object-cover object-center"/>
                    <div class="absolute h-full w-full bg-gradient-to-t from-black via-transparent to-transparent"></div>
                </div>
                <div class="absolute top-0 bottom-0 flex w-full flex-col justify-between p-[16px]">
                    <div class="w-fit rounded-full bg-white px-[18px] py-[8px]">
                        <div class="text-[14px] font-semibold text-[#0B131D]">Включено в стоимость</div>
                    </div>
                    <div class="flex flex-col p-[14px]">
                        <div class="text-[18px] font-semibold text-white">Развлекательные шоу, театр, караоке, клуб</div>
                    </div>
                </div>
            </div>
            <div class="relative h-[364px] w-[295px] shrink-0 overflow-hidden rounded-[16px] lg:w-full">
                <div class="relative h-full w-full">
                    <img src="{{ asset('assets/images/section4_5.png') }}" alt="img" class="absolute top-0 left-0 h-full w-full object-cover object-center"/>
                    <div class="absolute h-full w-full bg-gradient-to-t from-black via-transparent to-transparent"></div>
                </div>
                <div class="absolute top-0 bottom-0 flex w-full flex-col justify-between p-[16px]">
                    <div class="w-fit rounded-full bg-white px-[18px] py-[8px]">
                        <div class="text-[14px] font-semibold text-[#0B131D]">Включено в стоимость</div>
                    </div>
                    <div class="flex flex-col p-[14px]">
                        <div class="text-[18px] font-semibold text-white">Спортплощадки</div>
                    </div>
                </div>
            </div>
            <div class="relative h-[364px] w-[295px] shrink-0 overflow-hidden rounded-[16px] lg:w-full">
                <div class="relative h-full w-full">
                    <img src="{{ asset('assets/images/section4_6.png') }}" alt="img" class="absolute top-0 left-0 h-full w-full object-cover object-center"/>
                    <div class="absolute h-full w-full bg-gradient-to-t from-black via-transparent to-transparent"></div>
                </div>
                <div class="absolute top-0 bottom-0 flex w-full flex-col justify-between p-[16px]">
                    <div class="w-fit rounded-full bg-white px-[18px] py-[8px]">
                        <div class="text-[14px] font-semibold text-[#0B131D]">Включено в стоимость</div>
                    </div>
                    <div class="flex flex-col p-[14px]">
                        <div class="text-[18px] font-semibold text-white">Фитнес зал</div>
                    </div>
                </div>
            </div>
            <div class="relative h-[364px] w-[295px] shrink-0 overflow-hidden rounded-[16px] lg:w-full">
                <div class="relative h-full w-full">
                    <img src="{{ asset('assets/images/section4_7.png') }}" alt="img" class="absolute top-0 left-0 h-full w-full object-cover object-center"/>
                    <div class="absolute h-full w-full bg-gradient-to-t from-black via-transparent to-transparent"></div>
                </div>
                <div class="absolute top-0 bottom-0 flex w-full flex-col justify-between p-[16px]">
                    <div class="w-fit rounded-full bg-white px-[18px] py-[8px]">
                        <div class="text-[14px] font-semibold text-[#0B131D]">Включено в стоимость</div>
                    </div>
                    <div class="flex flex-col p-[14px]">
                        <div class="text-[18px] font-semibold text-white">Серфинг и водные горки</div>
                    </div>
                </div>
            </div>
            <div class="relative h-[364px] w-[295px] shrink-0 overflow-hidden rounded-[16px] lg:w-full">
                <div class="relative h-full w-full">
                    <img src="{{ asset('assets/images/section4_8.png') }}" alt="img" class="absolute top-0 left-0 h-full w-full object-cover object-center"/>
                    <div class="absolute h-full w-full bg-gradient-to-t from-black via-transparent to-transparent"></div>
                </div>
                <div class="absolute top-0 bottom-0 flex w-full flex-col justify-between p-[16px]">
                    <div class="w-fit rounded-full bg-white px-[18px] py-[8px]">
                        <div class="text-[14px] font-semibold text-[#0B131D]">Включено в стоимость</div>
                    </div>
                    <div class="flex flex-col p-[14px]">
                        <div class="text-[18px] font-semibold text-white">Детский сад и присмотр</div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- SECTION 5 --}}
    <div
        class="mx-auto w-full max-w-[1240px] px-[16px] md:px-[30px] lg:px-0"
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
        <div class="mb-[50px] md:mb-[70px] lg:mb-[120px]">
            <div class="mb-[16px] lg:mb-[24px] text-[28px] md:text-[40px] lg:text-[50px] font-medium text-[#0B131D]">Смотри сколько ты экономишь</div>
            <div class="mb-[24px] md:mb-[30px] lg:mb-[50px] text-[14px] md:text-[16px] lg:text-[18px] font-medium text-[#0B131D]">
                Укажи сумму и срок — и сразу увидишь, сколько получишь и куда сможешь поехать
            </div>
            <div class="grid grid-cols-1 gap-[10px] lg:gap-[20px] lg:grid-cols-2">
                <div class="order-2 lg:order-1 h-fit w-full rounded-[16px] bg-white p-[20px] md:p-[30px] lg:p-[40px]">
                    <div class="flex flex-col gap-[14px]">
                        <div class="flex h-[51px] md:h-[70px] lg:h-[92px] w-full justify-center rounded-[6px] border bg-[#F7F8F9] px-[20px]" :class="selectedTariff == 1 ? 'border-[#2272DD]' : 'border-[#8B919F]/20'" @click="selectedTariff = 1">
                            <div class="flex w-full items-center justify-between">
                                <div class="flex flex-col justify-center gap-[4px]">
                                    <div class="text-[15px] lg:text-[24px] font-medium" :class="selectedTariff == 1 ? 'text-[#2272DD]' : 'text-[#B6C1CD]'">$250 в месяц</div>
                                    <div class="text-[12px] lg:text-[16px] font-medium hidden md:block" :class="selectedTariff == 1 ? 'text-[#2272DD]' : 'text-[#A4B1C1]'">Premium</div>
                                </div>
                                <div class="flex h-[26px] lg:h-[38px] items-center gap-[6px] lg:gap-[8px] rounded-[5px] px-[10px] lg:px-[14px] font-medium text-white" :class="selectedTariff == 1 ? 'bg-[#2272DD]' : 'bg-[#27313F]'">
                                    <x-icons.king/>
                                    <span>Премиум</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="order-1 lg:order-2 h-fit flex w-full flex-col justify-between rounded-[16px] bg-white p-[20px] md:p-[30px] lg:p-[40px]">
                    <div class="flex w-full flex-col">
                        <div class="mb-[16px] lg:mb-[20px] flex justify-between">
                            <div class="text-[20px] lg:text-[24px] font-medium text-[#0B131D]">Узнай как путешествовать <span class="text-[#2272DD]">выгодно</span></div>
                        </div>
                        <div class="flex flex-col gap-[10px] lg:gap-[16px]">
                            <div class="flex w-full items-center gap-[10px] rounded-[6px] bg-[#F7F8F9] px-[16px] lg:px-[20px] py-[12px] lg:py-[18px] text-[13px] md:text-[15px] lg:text-[18px]">
                                1. Выбери, по сколько копить каждый месяц
                            </div>
                            <div class="flex w-full items-center gap-[10px] rounded-[6px] bg-[#F7F8F9] px-[16px] lg:px-[20px] py-[12px] lg:py-[18px] text-[13px] md:text-[15px] lg:text-[18px]">
                                2. Укажи, сколько месяцев будешь копить
                            </div>
                            <div class="flex w-full items-center gap-[10px] rounded-[6px] bg-[#F7F8F9] px-[16px] lg:px-[20px] py-[12px] lg:py-[18px] text-[13px] md:text-[15px] lg:text-[18px]">
                                3. Сразу увидишь свою выгоду
                            </div>
                            <div class="flex w-full items-center gap-[10px] rounded-[6px] bg-[#F8FBFE] px-[16px] lg:px-[20px] py-[12px] lg:py-[18px] text-[13px] md:text-[15px] lg:text-[18px] text-[#2272DD]">
                                ←  Просто потяни за ползунок
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- SECTION 6 --}}
    <div
        class="mx-auto w-full max-w-[1240px] px-[16px] md:px-[30px] lg:px-0"
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
        <div class="mb-[50px] md:mb-[70px] lg:mb-[120px]">
            <div class="mb-[16px] lg:mb-[24px] text-[28px] md:text-[40px] lg:text-[50px] font-medium text-[#0B131D]">Сравни - как можно начать копить</div>
            <div class="mb-[24px] md:mb-[30px] lg:mb-[50px] text-[14px] md:text-[16px] lg:text-[18px] font-medium text-[#0B131D]">
                Ты копишь сумму — на счёт сразу получаешь
                <span class="text-[#2272DD]">в 2 раза больше бонусов.</span>
                <br/>
                Бонусными баллами покрываешь 50% любого круиза.
            </div>
            <div class="grid grid-cols-1 gap-[10px] lg:gap-[20px] md:grid-cols-2">
                <div class="h-fit w-full rounded-[16px] bg-white p-[16px] md:p-[20px] lg:p-[30px]">
                    <div class="flex flex-col gap-[14px]">
                        <div class="flex h-[51px] md:h-[70px] lg:h-[92px] w-full justify-center rounded-[6px] border bg-[#F7F8F9] px-[20px]" :class="selectedTariff == 1 ? 'border-[#2272DD]' : 'border-[#8B919F]/20'" @click="selectedTariff = 1">
                            <div class="flex w-full items-center justify-between">
                                <div class="flex flex-col justify-center gap-[4px]">
                                    <div class="text-[15px] lg:text-[24px] font-medium" :class="selectedTariff == 1 ? 'text-[#2272DD]' : 'text-[#B6C1CD]'">$250 в месяц</div>
                                    <div class="text-[12px] lg:text-[16px] font-medium hidden md:block" :class="selectedTariff == 1 ? 'text-[#2272DD]' : 'text-[#A4B1C1]'">Premium</div>
                                </div>
                                <div class="flex h-[26px] lg:h-[38px] items-center gap-[6px] lg:gap-[8px] rounded-[5px] px-[10px] lg:px-[14px] font-medium text-white" :class="selectedTariff == 1 ? 'bg-[#2272DD]' : 'bg-[#27313F]'">
                                    <x-icons.king/>
                                    <span>Премиум</span>
                                </div>
                            </div>
                        </div>
                        <div class="flex h-[51px] md:h-[70px] lg:h-[92px] w-full justify-center rounded-[6px] border bg-[#F7F8F9] px-[20px]" :class="selectedTariff == 2 ? 'border-[#2272DD]' : 'border-[#8B919F]/20'" @click="selectedTariff = 2">
                            <div class="flex w-full items-center justify-between">
                                <div class="flex flex-col justify-center gap-[4px]">
                                    <div class="text-[15px] lg:text-[24px] font-medium" :class="selectedTariff == 2 ? 'text-[#2272DD]' : 'text-[#B6C1CD]'">$100 в месяц</div>
                                    <div class="text-[12px] lg:text-[16px] font-medium hidden md:block" :class="selectedTariff == 2 ? 'text-[#2272DD]' : 'text-[#A4B1C1]'">Classic</div>
                                </div>
                                <div class="flex h-[26px] lg:h-[38px] items-center gap-[8px] rounded-[5px] border bg-white px-[10px] lg:px-[14px] font-medium" :class="selectedTariff == 2 ? 'border-[#2272DD] text-[#2272DD]' : 'border-[#B6C1CD] text-[#B6C1CD]'">
                                    Популярный
                                </div>
                            </div>
                        </div>
                        <div class="flex h-[51px] md:h-[70px] lg:h-[92px] w-full justify-center rounded-[6px] border bg-[#F7F8F9] px-[20px]" :class="selectedTariff == 3 ? 'border-[#2272DD]' : 'border-[#8B919F]/20'" @click="selectedTariff = 3">
                            <div class="flex w-full items-center justify-between">
                                <div class="flex md:flex-col items-start md:items-start justify-between md:justify-center gap-[4px] w-full">
                                    <div class="text-[15px] lg:text-[24px] font-medium" :class="selectedTariff == 3 ? 'text-[#2272DD]' : 'text-[#B6C1CD]'">$50 в месяц</div>
                                    <div class="text-[12px] lg:text-[16px] font-medium" :class="selectedTariff == 3 ? 'text-[#2272DD]' : 'text-[#A4B1C1]'">Starter</div>
                                </div>
                            </div>
                        </div>
                        <div class="flex h-[51px] md:h-[70px] lg:h-[92px] w-full justify-center rounded-[6px] border bg-[#F7F8F9] px-[20px]" :class="selectedTariff == 4 ? 'border-[#2272DD]' : 'border-[#8B919F]/20'" @click="selectedTariff = 4">
                            <div class="flex w-full items-center justify-between">
                                <div class="flex md:flex-col items-start md:items-start justify-between md:justify-center gap-[4px] w-full">
                                    <div class="text-[15px] lg:text-[24px] font-medium" :class="selectedTariff == 4 ? 'text-[#2272DD]' : 'text-[#B6C1CD]'">Бесплатный вход</div>
                                    <div class="text-[12px] lg:text-[16px] font-medium" :class="selectedTariff == 4 ? 'text-[#2272DD]' : 'text-[#A4B1C1]'">Без накоплений</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="h-fit flex w-full flex-col justify-between rounded-[16px] bg-white p-[16px] md:p-[20px] lg:p-[30px]">
                    <div class="flex w-full flex-col mb-[28px]">
                        <div class="mb-[16px] lg:mb-[20px] flex justify-between">
                            <div class="text-[20px] lg:text-[30px] font-medium text-[#0B131D]" x-html="dataTariff[selectedTariff - 1]['title']"></div>
                            <div class="rounded-[5px] bg-[#F8FBFE] px-[16px] lg:px-[16px] py-[6px] lg:py-[10px] text-[12px] lg:text-[18px] font-medium text-[#2272DD]" x-html="dataTariff[selectedTariff - 1]['tooltip']"></div>
                        </div>
                        <div class="flex flex-col gap-[10px] lg:gap-[16px]">
                            <template x-for="description in dataTariff[selectedTariff - 1]['description']" :key="description">
                                <div class="flex w-full items-center gap-[10px] rounded-[6px] bg-[#F7F8F9] px-[16px] lg:px-[20px] py-[12px] lg:py-[18px]">
                                    <div class="hidden h-[6px] w-[6px] rounded-full bg-black lg:block"></div>
                                    <div x-html="description" class="text-[13px] md:text-[15px] lg:text-[18px]"></div>
                                </div>
                            </template>
                        </div>
                    </div>
                    <div class="flex w-full flex-col gap-[10px] lg:gap-[20px]">
                        <div class="text-center text-[12px] lg:text-[18px] font-medium text-[#B6C1CD]">ББ — это бонусные баллы. 1 ББ = $1 при оплате круиза.</div>
                        <a href="#">
                            <div class="flex h-[46px] lg:h-[52px] items-center justify-center rounded-[6px] bg-[#2272DD] text-[16px] lg:text-[18px] text-white">Начать копить</div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- SECTION 7 --}}
    <div class="mx-auto mb-[60px] md:mb-[80px] lg:mb-[140px] w-full max-w-[1240px] px-[16px] md:px-[30px] lg:px-0">
        <div class="mb-[30px] md:mb-[40px] lg:mb-[60px] grid grid-cols-1 items-center gap-[20px] lg:grid-cols-12">
            <div class="col-span-7 text-[28px] md:text-[40px] lg:text-[50px] font-medium text-[#0B131D]">
                inCruises – клуб, который
                <span class="text-[#2272DD]">выбирают</span>
                по всему миру
            </div>
            <div class="col-span-5 text-[14px] md:text-[15px] lg:text-[18px] font-medium text-[#5A6472]">inCruises® – эксклюзивный туристический клуб, основанный на членстве и работающий только по приглашению. inCruises — это копилка, где каждый $ превращается в два на отпуск</div>
        </div>
        <div class="grid grid-cols-1 gap-[20px] lg:grid-cols-12">
            <div class="order-2 col-span-1 grid grid-cols-1 gap-[10px] md:gap-[16px] md:grid-cols-2 lg:order-1 lg:col-span-7">
                <div class="rounded-[10px] bg-white p-[20px] md:p-[30px]">
                    <div class="mb-[6px] md:mb-[42px] text-[28px] md:text-[36px] font-medium text-[#0B131D]">С 2016 года</div>
                    <div class="text-[14px] md:text-[16px] font-medium text-[#9EA9B7]">8 лет вдохновляем людей по всему миру на доступные круизы</div>
                </div>
                <div class="rounded-[10px] bg-white p-[20px] md:p-[30px]">
                    <div class="mb-[6px] md:mb-[42px] text-[28px] md:text-[36px] font-medium text-[#0B131D]">190 000 +</div>
                    <div class="text-[14px] md:text-[16px] font-medium text-[#9EA9B7]">Тысячи вариантов размещений — море, города, отели, круизы</div>
                </div>
                <div class="rounded-[10px] bg-white p-[20px] md:p-[30px]">
                    <div class="mb-[6px] md:mb-[42px] text-[28px] md:text-[36px] font-medium text-[#0B131D]">1 816 784</div>
                    <div class="text-[14px] md:text-[16px] font-medium text-[#9EA9B7]">С inCruises путешествуют уже почти два миллиона человек</div>
                </div>
                <div class="rounded-[10px] bg-white p-[20px] md:p-[30px]">
                    <div class="mb-[6px] md:mb-[42px] text-[28px] md:text-[36px] font-medium text-[#0B131D]">208 стран</div>
                    <div class="text-[14px] md:text-[16px] font-medium text-[#9EA9B7]">Люди из сотен стран уже в клубе — и их становится все больше</div>
                </div>
            </div>
            <div class="order-1 col-span-1 lg:order-2 lg:col-span-5">
                <div class="h-full w-full overflow-hidden rounded-[10px]">
                    <img src="{{ asset('assets/images/section7_1.png') }}" alt="img" class="h-full w-full object-cover object-center"/>
                </div>
            </div>
        </div>
    </div>


    {{-- SECTION 8 --}}
    @if($reviews->isNotEmpty())
        <div
            class="mx-auto mb-[120px] w-full max-w-[1240px] px-[16px] md:px-[30px] lg:px-0"
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
            <div class="mb-[16px] lg:mb-[24px] text-[28px] md:text-[40px] lg:text-[50px] font-medium text-[#0B131D]">
                Миллионы участников по всему миру — вот несколько историй
            </div>
            <div class="mb-[20px] md:mb-[30px] lg:mb-[50px] text-[14px] md:text-[16px] lg:text-[18px] font-medium text-[#0B131D]">
                Они уже путешествуют. Возможно, следующая поездка — будет твоя.
            </div>
            <div class="flex w-full flex-col items-center">
                <div class="mb-[20px] md:mb-[38px] lg:mb-[58px] flex w-full items-center gap-[26px]">
                    <div @click="prev" class="hidden lg:flex h-fit min-h-[48px] w-fit min-w-[48px] items-center justify-center rounded-full bg-white">
                        <x-icons.left/>
                    </div>
                    @foreach($reviews as $index => $review)
                        <div x-show="active === {{ $index }}" class="grid h-fit md:h-[493px] w-full grid-cols-1 md:grid-cols-12 gap-[16px] lg:gap-[25px]">
                            <div class="order-2 md:order-1 col-span-7 flex flex-col justify-between rounded-[20px] bg-white p-[24px] lg:p-[40px]">
                                <div>
                                    <div class="mb-[20px] md:mb-[24px] lg:mb-[30px] flex items-center justify-between">
                                        <div class="text-[12px] md:text-[15px] lg:text-[18px] font-medium text-[#9EA9B7]">{{ $review->countries }}</div>
                                        <div class="text-[12px] md:text-[15px] lg:text-[18px] font-medium text-[#9EA9B7]">{{ $review->date->format('d M Y') }}</div>
                                    </div>
                                    <div class="mb-[30px] flex flex-col">
                                        <div class="text-[20px] md:text-[24px] lg:text-[29px] font-medium text-[#0B131D]">{{ $review->title }}</div>
                                        <div class="text-[15px] lg:text-[16px] font-medium text-[#5A6472]">{{ $review->text_review }}</div>
                                    </div>
                                </div>
                                <div class="text-[18px] font-medium text-[#9EA9B7]">Смотреть все отзывы →</div>
                            </div>
                            <div class="order-1 md:order-2 col-span-5 flex flex-col items-end justify-between">
                                <div class="overflow-hidden rounded-[20px] h-[427px] md:h-[315px] lg:h-[493px] w-full">
                                    <img src="{{ $review->image_url }}" alt="img" class="h-full w-full object-cover object-center"/>
                                </div>
                                <div class="hidden md:flex lg:hidden gap-[16px]">
                                    <div @click="prev" class="flex h-fit min-h-[48px] w-fit min-w-[48px] items-center justify-center rounded-full bg-white">
                                        <x-icons.left/>
                                    </div>
                                    <div @click="next" class="flex h-fit min-h-[48px] w-fit min-w-[48px] items-center justify-center rounded-full bg-white">
                                        <div class="rotate-180">
                                            <x-icons.left/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div @click="next" class="hidden lg:flex h-fit min-h-[48px] w-fit min-w-[48px] items-center justify-center rounded-full bg-white">
                        <div class="rotate-180">
                            <x-icons.left/>
                        </div>
                    </div>
                </div>

                <div class="flex md:hidden justify-end gap-[16px] w-full mb-[28px] md:mb-0">
                    <div @click="prev" class="flex h-fit min-h-[48px] w-fit min-w-[48px] items-center justify-center rounded-full bg-white">
                        <x-icons.left/>
                    </div>
                    <div @click="next" class="flex h-fit min-h-[48px] w-fit min-w-[48px] items-center justify-center rounded-full bg-white">
                        <div class="rotate-180">
                            <x-icons.left/>
                        </div>
                    </div>
                </div>

                @if($reviews->count() > 1)
                    <div class="flex gap-[14px]">
                        @foreach($reviews as $index => $review)
                            <div :class="active === {{ $index }} ? 'bg-[#0B131D]' : 'bg-[#0B131D]/16'" class="h-[4px] w-[35px] rounded-full transition-all"></div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    @endif


    {{-- SECTION 9 --}}
    <div class="mx-auto mb-[45px] md:mb-[110px] lg:mb-[170px] w-full max-w-[1240px] px-[16px] md:px-[30px] lg:px-0">
        <div class="mb-[16px] lg:mb-[24px] text-[28px] md:text-[40px] lg:text-[50px] font-medium text-[#0B131D]">
            Твой путь: от звонка - до чемодана
        </div>
        <div class="mb-[20px] md:mb-[50px] text-[18px] font-medium text-[#0B131D]">
            Я расскажу, как устроено. Ты начнёшь копить. И мы вместе дойдём до твоего первого круиза.
        </div>
        <div class="relative">
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-[16px] md:w-[90%] lg:w-full">
                <div class="h-fit w-full bg-white rounded-[10px] p-[20px] md:p-[24px]">
                    <div class="flex gap-[10px] items-center mb-[14px] md:mb-[18px] lg:mb-[20px]">
                        <img src="{{ $user->avatar }}" alt="img" class="rounded-full w-[46px] h-[46px] object-cover object-center">
                        <div class="flex flex-col justify-center gap-[4px]">
                            <div class="text-[17px] font-medium text-[#5A6472]">{{ $user->first_name . ' ' . mb_substr($user->last_name, 0, 1) }}.</div>
                            <div class="text-[12px] text-[#9EA9B7]">Независимый партнер</div>
                        </div>
                    </div>
                    <div class="flex flex-col justify-center gap-[4px]">
                        <div class="text-[16px] font-medium text-[#9EA9B7]">
                            <span class="text-[#5A6472]">Мы созвонимся.</span>
                            <br>
                            Расскажу, как всё устроено, и ты решишь — подходят ли тебе круизы.
                        </div>
                    </div>
                </div>
                <div class="h-fit w-full bg-white rounded-[10px] p-[20px] md:p-[24px]">
                    <div class="flex flex-col justify-center gap-[4px]">
                        <div class="text-[16px] font-medium text-[#9EA9B7]">
                            <span class="text-[#5A6472]">Когда ты начнёшь копить -</span>
                            твои каждые $100 будут конвертироваться в 200 бонусных баллов
                        </div>
                    </div>
                </div>
                <div class="h-fit w-full bg-white rounded-[10px] p-[20px] md:p-[24px]">
                    <div class="flex gap-[10px] items-center mb-[14px] md:mb-[18px] lg:mb-[20px]">
                        <img src="{{ $user->avatar }}" alt="img" class="rounded-full w-[46px] h-[46px] object-cover object-center">
                        <div class="flex flex-col justify-center gap-[4px]">
                            <div class="text-[17px] font-medium text-[#5A6472]">{{ $user->first_name . ' ' . mb_substr($user->last_name, 0, 1) }}.</div>
                            <div class="text-[12px] text-[#9EA9B7]">Независимый партнер</div>
                        </div>
                    </div>
                    <div class="flex flex-col justify-center gap-[4px]">
                        <div class="text-[16px] font-medium text-[#9EA9B7]">
                            <span class="text-[#5A6472]">Поддержу с бронью:</span>
                            <br>
                            Когда бонусов хватит, я порекомендую тебе круиз и поддержу при оформлении.
                        </div>
                    </div>
                </div>
                <div class="h-fit w-full bg-white rounded-[10px] p-[20px] md:p-[24px]">
                    <div class="flex flex-col justify-center gap-[4px]">
                        <div class="text-[16px] font-medium text-[#9EA9B7]">
                            <span class="text-[#5A6472]">Остаётся просто отдыхать:</span>
                            <br>
                            Собираешь чемодан и отправляешься в свое первое круизное путешествие
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- SECTION 10 --}}
    <div class="mx-auto mb-[45px] md:mb-[110px] lg:mb-[170px] w-full max-w-[1240px] px-[16px] md:px-[30px] lg:px-0">
        <div class="mb-[16px] lg:mb-[24px] text-[28px] md:text-[40px] lg:text-[50px] font-medium text-[#0B131D]">
            Рядом с тобой
            <span class="text-[#2272DD]">на каждом шагу</span>
        </div>
        <div class="mb-[30px] md:mb-[40px] lg:mb-[50px] text-[18px] font-medium text-[#989CA1]">
            Я порекомендую маршрут, поддержу с оформлением, расскажу, как накопить бонусы, и буду на связи — от посадки на корабль до возвращения домой.
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-[30px] md:gap-[40px] lg:gap-[70px]">
            <div class="flex flex-col">
                <div class="flex gap-[12px] md:gap-[20px] lg:gap-[24px] items-center mb-[28px] md:mb-[38px] lg:mb-[56px]">
                    <img src="{{ $user->avatar }}" alt="img" class="rounded-full w-[70px] h-[70px] md:w-[110px] md:h-[110px] object-cover object-center">
                    <div class="flex flex-col justify-center gap-[10px] md:gap-[12px]">
                        <div class="text-[20px] md:text-[28px] font-medium text-[#0B131D]">{{ $user->first_name . ' ' . $user->last_name }}</div>
                        <div class="text-[14px] md:text-[15px] text-[#989CA1]">{{ $user->about_me }}</div>
                    </div>
                </div>
                <div class="flex flex-col gap-[12px] md:gap-[18px]">
                    <a href="{{ route('admin.profile.index') }}">
                        <div class="flex items-center gap-[10px] md:gap-[16px]">
                            @include('components.icons.link', ['color' => '#5A6472'])
                            <div class="font-medium text-[14px] md:text-[18px] text-[#5A6472]">Мой профиль</div>
                        </div>
                    </a>
                    <hr class="border-[#DBE1EA]">
                    <a href="{{ route('admin.history.index') }}">
                        <div class="flex items-center gap-[10px] md:gap-[16px]">
                            @include('components.icons.link', ['color' => '#5A6472'])
                            <div class="font-medium text-[14px] md:text-[18px] text-[#5A6472]">Моя история в inCruises</div>
                        </div>
                    </a>
                    <hr class="border-[#DBE1EA]">
                    <a href="{{ route('admin.review.index') }}">
                        <div class="flex items-center gap-[10px] md:gap-[16px]">
                            @include('components.icons.link', ['color' => '#5A6472'])
                            <div class="font-medium text-[14px] md:text-[18px] text-[#5A6472]">Посмотреть отзывы</div>
                        </div>
                    </a>
                    <hr class="border-[#DBE1EA]">
                </div>
            </div>
            <div class="bg-white py-[30px] px-[20px] md:py-[30px] md:px-[30px] lg:py-[40px] lg:px-[36px] rounded-[12px] flex flex-col items-center">
                <div class="text-[24px] font-medium text-[#0B131D] mb-[6px] md:mb-[16px]">Напиши - отвечу лично</div>
                <div class="text-[16px] font-medium text-[#5B6A82]/60 mb-[20px] md:mb-[30px]">Оставь свои данные, и я свяжусь с тобой</div>
                <div class="flex flex-col gap-[20px] md:gap-[30px] w-full">
                    <div class="flex flex-col w-full">
                        <div class="text-[14px] md:text-[17px] font-medium text-[#0B131D] mb-[12px]">Имя</div>
                        <input type="text" class="w-full rounded-[6px] border border-[#DBDFE9] h-[50px] px-[16px]" placeholder="Имя">
                    </div>
                    <div class="flex flex-col w-full">
                        <div class="text-[14px] md:text-[17px] font-medium text-[#0B131D] mb-[12px]">Номер телефона</div>
                        <input type="text" class="w-full rounded-[6px] border border-[#DBDFE9] h-[50px] px-[16px]" placeholder="+7 707 707 77 77">
                    </div>
                    <button class="text-white bg-[#2272DD] rounded-[6px] h-[48px] text-[14px] md:text-[18px]">Оставить заявку</button>
                </div>
            </div>
        </div>
    </div>
@endsection
