@extends('layouts.admin.app')

@section('content')
    <div class="flex-1 px-[10px] bg-[#EFF1F4]">
        <form action="{{ route('admin.editor.review.update', $review) }}" method="POST" enctype="multipart/form-data">
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
                            <x-forms.text value="{{ $review->name_review }}" name="name_review" title="Назовите отзыв" placeholder="Пример: Баннер №4"/>
                            <x-forms.text value="{{ $review->title }}" name="title" title="Напишите заголовок отзыва" placeholder="Заголовок"/>
                            <x-forms.text value="{{ $review->text_review }}" name="text_review" title="Напишите текст для отзыва" placeholder="Текст отзыва"/>
                            <x-forms.text value="{{ $review->countries }}" name="countries" title="В каких странах были клиенты?" placeholder="Пример: Франция • Италия • Испания"/>
                            <x-forms.image value="{{ $review->image_url }}" name="image" title="Загрузите фото с отдыха" placeholder="Загрузить"/>
                            <x-forms.date value="{{ $review->date }}" name="date" title="Введите дату поездки"/>
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
