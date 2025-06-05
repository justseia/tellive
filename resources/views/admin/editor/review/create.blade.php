@extends('layouts.admin.app')

@section('content')
    <div class="flex-1 px-[10px] bg-[#EFF1F4]">
        <form action="{{ route('admin.editor.review.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="flex flex-col items-center py-[20px] md:py-[40px]">
                <div class="max-w-[620px] w-full">
                    <div class="flex items-center justify-between mb-[27px] px-[16px]">
                        <a href="{{ route('admin.editor.index') }}">
                            <div class="font-medium text-[15px] text-[#5A6472]">← Назад</div>
                        </a>
                        <button class="hover:cursor-pointer font-medium text-[15px] text-[#2272DD]">
                            Сохранить
                        </button>
                    </div>
                    <div class="flex flex-col p-[20px] md:p-[30px] bg-white rounded-[10px]">
                        <div class="flex flex-col gap-[40px]">
                            <div class="flex flex-col gap-[10px]">
                                <x-forms.text name="name_review" title="Назовите отзыв" placeholder="Пример: Баннер №4" :showExample="false"/>
                                <div class="font-medium text-[14px] text-[#9EA9B7]">Это название видите только вы</div>
                            </div>
                            <x-forms.text name="title" title="Напишите заголовок отзыва" placeholder="Заголовок"/>
                            <x-forms.text name="text_review" title="Напишите текст для отзыва" placeholder="Текст отзыва"/>
                            <x-forms.text name="countries" title="В каких странах были клиенты?" placeholder="Пример: Франция • Италия • Испания"/>
                            <x-forms.image name="image" title="Загрузите фото с отдыха" placeholder="Загрузить"/>
                            <x-forms.date name="date" title="Введите дату поездки"/>
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
