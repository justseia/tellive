@extends('layouts.admin.app')

@section('content')
    <div class="flex-1 px-[10px] bg-[#EFF1F4]">
        <div class="flex flex-col items-center py-[20px] md:py-[40px]">
            <div class="max-w-[620px] w-full">
                <div class="flex flex-col p-[20px] md:p-[30px] bg-white rounded-[10px]">
                    <div class="flex flex-col gap-[10px]">
                        <div class="font-medium text-[20px] md:text-[24px] text-[#0B131D]">Редактор</div>
                        <div class="font-medium text-[14px] text-[#9EA9B7]">
                            Настройте основные блоки вашего сайта,
                            <br>
                            чтобы сделать его уникальным и привлекательным!
                        </div>
                    </div>
                    <hr class="border-b border-[#9EA9B7]/20 my-[20px]"/>
                    <div class="flex items-center gap-[7px] mb-[20px]">
                        @include('components.icons.link', ['color' => '#2272DD'])
                        <div class="font-medium text-[14px] text-[#2272DD]">Как редактировать свой сайт?</div>
                    </div>
                    <div x-data="{ tab: 'about' }">
                        <div class="mb-[30px] flex items-center h-[38px] border-collapse">
                            <button
                                :class="tab === 'about' ? 'bg-[#F4F8FD] text-[#2272DD] border-[#2272DD]' : 'bg-[#9EA9B7]/5 text-[#9EA9B7] border-[#9EA9B7]'"
                                class="h-full w-full max-w-[130px] font-medium text-[15px] rounded-l-[4px] border focus:outline-none"
                                @click="tab = 'about'"
                            >
                                О себе
                            </button>
                            <button
                                :class="tab === 'reviews' ? 'bg-[#F4F8FD] text-[#2272DD] border-[#2272DD]' : 'bg-[#9EA9B7]/5 text-[#9EA9B7] border-[#9EA9B7]'"
                                class="h-full w-full max-w-[130px] font-medium text-[15px] border focus:outline-none"
                                @click="tab = 'reviews'"
                            >
                                Отзывы
                            </button>
                            <button
                                :class="tab === 'banner' ? 'bg-[#F4F8FD] text-[#2272DD] border-[#2272DD]' : 'bg-[#9EA9B7]/5 text-[#9EA9B7] border-[#9EA9B7]'"
                                class="h-full w-full max-w-[130px] font-medium text-[15px] rounded-r-[4px] border focus:outline-none"
                                @click="tab = 'banner'"
                            >
                                Баннер
                            </button>
                        </div>
                        <div class="">
                            <div x-show="tab === 'about'">
                                <form action="{{ route('admin.editor.update') }}" method="POST">
                                    @csrf
                                    <div class="flex flex-col gap-[30px]">
                                        <x-forms.textarea value="" title="Напишите краткий текст о себе" placeholder="О себе" rows="4"/>
                                        <button type="submit" class="flex w-full h-[48px] justify-center items-center gap-[12px] rounded-[6px] border border-[#2272DD] bg-[#2272DD]/5 px-[20px] py-[8px] text-[15px] font-medium text-[#2272DD]">
                                            Сохранить изменения
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div x-show="tab === 'reviews'" x-cloak>
                                <div class="flex flex-col gap-[20px]">
                                    <div class="text-[16px] font-medium text-[#0B131D]">Мои отзывы</div>
                                    <div class="flex flex-col gap-[10px]">
                                        @forelse($reviews as $review)
                                            <div x-data="{ open: false }" class="relative bg-[#F9F9F9] rounded-[10px] h-[48px] md:h-[59px] flex items-center justify-between w-full pl-[16px] pr-[5px]">
                                                <div class="flex items-center gap-[10px]">
                                                    @include('components.icons.six-dot')
                                                    <div class="font-medium text-[15px] text-[#0B131D]">{{ $review->name_review }}</div>
                                                </div>
                                                <div class="relative">
                                                    <button @click="open = !open" class="focus:outline-none w-[30px] flex justify-center">
                                                        @include('components.icons.three-dot')
                                                    </button>
                                                    <div x-show="open" @click.away="open = false" x-transition class="absolute right-0 mt-2 w-40 bg-white border border-gray-200 rounded-md shadow-lg z-50">
                                                        <a href="{{ route('admin.editor.review.edit', $review) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Редактировать</a>
                                                        <form method="POST" action="{{ route('admin.editor.review.update', $review) }}">
                                                            @csrf
                                                            <input name="type" value="up" type="hidden">
                                                            <button type="submit" class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Вверх</button>
                                                        </form>
                                                        <form method="POST" action="{{ route('admin.editor.review.update', $review) }}">
                                                            @csrf
                                                            <input name="type" value="down" type="hidden">
                                                            <button type="submit" class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Вниз</button>
                                                        </form>
                                                        <form method="POST" action="{{ route('admin.editor.review.delete', $review) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100">Удалить</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <div class="bg-[#F9F9F9] rounded-[10px] h-[48px] md:h-[59px] flex items-center justify-center w-full">
                                                <div class="font-medium text-[15px] text-[#9EA9B7]">У вас пока нет отзывов</div>
                                            </div>
                                        @endforelse
                                    </div>
                                    <a href="{{ route('admin.editor.review.create') }}">
                                        <div class="flex w-full h-[48px] justify-center items-center gap-[12px] rounded-[6px] border border-[#2272DD] bg-[#2272DD]/5 px-[20px] py-[8px]">
                                            @include('components.icons.plus', ['color' => '#2272DD'])
                                            <div class="text-[15px] font-medium text-[#2272DD]">Добавить отзыв</div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div x-show="tab === 'banner'" x-cloak>
                                <div class="flex flex-col gap-[20px]">
                                    <div class="text-[16px] font-medium text-[#0B131D]">Мои баннеры</div>
                                    <div class="flex flex-col gap-[10px]">
                                        @forelse($banners as $banner)
                                            <div x-data="{ open: false }" class="relative bg-[#F9F9F9] rounded-[10px] h-[48px] md:h-[59px] flex items-center justify-between w-full pl-[16px] pr-[5px]">
                                                <div class="flex items-center gap-[10px]">
                                                    @include('components.icons.six-dot')
                                                    <div class="font-medium text-[15px] text-[#0B131D]">{{ $banner->name_banner }}</div>
                                                </div>
                                                <div class="relative">
                                                    <button @click="open = !open" class="focus:outline-none w-[30px] flex justify-center">
                                                        @include('components.icons.three-dot')
                                                    </button>
                                                    <div x-show="open" @click.away="open = false" x-transition class="absolute right-0 mt-2 w-40 bg-white border border-gray-200 rounded-md shadow-lg z-50">
                                                        <a href="{{ route('admin.editor.banner.edit', $banner) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Редактировать</a>
                                                        <form method="POST" action="{{ route('admin.editor.banner.update', $banner) }}">
                                                            @csrf
                                                            <input name="type" value="up" type="hidden">
                                                            <button type="submit" class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Вверх</button>
                                                        </form>
                                                        <form method="POST" action="{{ route('admin.editor.banner.update', $banner) }}">
                                                            @csrf
                                                            <input name="type" value="down" type="hidden">
                                                            <button type="submit" class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Вниз</button>
                                                        </form>
                                                        <form method="POST" action="{{ route('admin.editor.banner.delete', $banner) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100">Удалить</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <div class="bg-[#F9F9F9] rounded-[10px] h-[48px] md:h-[59px] flex items-center justify-center w-full">
                                                <div class="font-medium text-[15px] text-[#9EA9B7]">У вас пока нет баннеров</div>
                                            </div>
                                        @endforelse
                                    </div>
                                    <a href="{{ route('admin.editor.banner.create') }}">
                                        <div class="flex w-full h-[48px] justify-center items-center gap-[12px] rounded-[6px] border border-[#2272DD] bg-[#2272DD]/5 px-[20px] py-[8px]">
                                            @include('components.icons.plus', ['color' => '#2272DD'])
                                            <div class="text-[15px] font-medium text-[#2272DD]">Добавить баннер</div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
