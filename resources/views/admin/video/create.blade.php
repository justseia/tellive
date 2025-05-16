@extends('layouts.admin.app')

@section('content')
    <div class="flex-1 px-[10px] bg-[#EFF1F4]">
        <form action="{{ route('admin.video.store') }}" method="POST">
            @csrf
            <div class="flex flex-col items-center py-[20px] md:py-[40px]">
                <div class="max-w-[620px] w-full">
                    <div class="flex items-center justify-between mb-[27px] px-[16px]">
                        <a href="{{ route('admin.video.index') }}">
                            <div class="font-medium text-[15px] text-[#5A6472]">← Назад</div>
                        </a>
                        <button class="hover:cursor-pointer font-medium text-[15px] text-[#2272DD]">
                            Сохранить
                        </button>
                    </div>
                    <div class="flex flex-col p-[20px] md:p-[30px] bg-white rounded-[10px]">
                        <div class="flex flex-col gap-[10px]">
                            <div class="font-medium text-[20px] md:text-[24px] text-[#0B131D]">Редактор видео</div>
                        </div>
                        <hr class="border-b border-[#9EA9B733]/20 my-[20px]"/>
                        <div class="flex items-center gap-[7px] mb-[20px]">
                            @include('icons.link', ['color' => '#2272DD'])
                            <div class="font-medium text-[14px] text-[#2272DD]">Посмотреть пример заполнения видео</div>
                        </div>
                        <div class="flex flex-col gap-[40px]">
                            <x-forms.text name="title" title="Напишите краткое описание" placeholder="Краткое описание (до 50 символов)"/>
                            <x-forms.image name="image_url" title="Загрузите фото на обложку" placeholder="Загрузить"/>
                            <x-forms.http name="youtube_url" title="Ссылка на YouTube видео (если есть)" placeholder="Ссылка на видео"/>
                            <button type="submit" class="flex w-full items-center gap-[12px] rounded-[4px] bg-[#2272DD] h-[48px] justify-center text-[14px] font-medium text-white md:text-[15px]">
                                Опубликовать
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
