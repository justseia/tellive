@extends('layouts.admin.app')

@section('content')
    <div class="flex-1 px-[10px] bg-[#EFF1F4]">
        <form action="{{ route('admin.editor.banner.store') }}" method="POST" enctype="multipart/form-data">
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
                                <x-forms.text name="name_banner" title="Назовите баннер" placeholder="Пример: Баннер №4"/>
                                <div class="font-medium text-[14px] text-[#9EA9B7]">Это название видите только вы</div>
                            </div>
                            <x-forms.text name="title" title="Напишите заголовок баннера" placeholder="Заголовок"/>
                            <x-forms.text name="text_banner" title="Напишите описание для баннера" placeholder="Описание баннера"/>
                            <x-forms.image name="image" title="Загрузите фото на обложку" placeholder="Загрузить"/>
                            <x-forms.text name="text_button" title="Напишите текст для кнопки" placeholder="Текст кнопки"/>
                            <x-forms.http name="url_button" title="Ссылка кнопки" placeholder="Вставьте ссылку"/>
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
