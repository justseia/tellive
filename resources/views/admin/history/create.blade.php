@extends('layouts.admin.app')

@section('content')
    <div class="flex-1 px-[10px] bg-[#EFF1F4]">
        <div class="flex flex-col items-center py-[20px] md:py-[40px]">
            <div class="max-w-[620px] w-full">
                {{-----------------------------------------------------------------------------------------------------------}}
                <div class="flex items-center justify-between mb-[27px] px-[16px]">
                    <a href="{{ route('admin.history.index') }}">
                        <div class="font-medium text-[15px] text-[#5A6472]">← Назад</div>
                    </a>
                    <button @click="form.submit()" class="hover:cursor-pointer font-medium text-[15px] text-[#2272DD]">
                        Сохранить
                    </button>
                </div>
                <div class="flex flex-col p-[20px] md:p-[30px] bg-white rounded-[10px]">
                    <div class="flex flex-col gap-[10px]">
                        <div class="font-medium text-[20px] md:text-[24px] text-[#0B131D]">Редактор истории</div>
                        <div class="font-medium text-[14px] text-[#9EA9B7]">Этой историей ты вдохновишь других — и укрепишь свой путь.</div>
                    </div>
                    <hr class="border-b border-[#9EA9B7]/20 my-[20px]"/>
                    <div class="flex items-center gap-[7px] mb-[20px]">
                        @include('icons.link', ['color' => '#2272DD'])
                        <div class="font-medium text-[14px] text-[#2272DD]">Посмотреть пример заполнения истории</div>
                    </div>
                    <div class="flex flex-col gap-[20px] mb-[40px]">
                        <div class="font-medium text-[16px] text-[#0B131D]">Основная информация</div>
                        <div class="flex items-center gap-[20px]">
                            <label class="flex items-center gap-[10px]">
                                <input type="radio" name="type" class="appearance-none w-[16px] h-[16px] border border-[#ADB4D2] rounded-full checked:border-4 checked:border-[#2272DD] transition duration-200" checked>
                                <span class="font-normal text-[14px] text-[#272B41]">Публичный</span>
                            </label>
                            <label class="flex items-center gap-[10px]">
                                <input type="radio" name="type" class="appearance-none w-[16px] h-[16px] border border-[#ADB4D2] rounded-full checked:border-4 checked:border-[#2272DD] transition duration-200">
                                <span class="font-normal text-[14px] text-[#272B41]">Личный</span>
                            </label>
                        </div>
                        <div class="font-medium text-[12px] text-[#9EA9B7]">Оставляя историю публичной вы участвуете в еженедельном конкурсе историй и можете выиграть ценные призы!</div>
                    </div>
                    <div class="flex flex-col gap-[40px]">
                        <x-forms.text title="Напишите название вашей истории" placeholder="Название"/>
                        <x-forms.date title="Когда это было?"/>
                        <x-forms.image-multiple title="Загрузите до 5 фото" placeholder="Название"/>
                        <x-forms.select title="Выберите темы истории" selected="Выберите темы"/>
                    </div>
                    <hr class="border-b border-[#9EA9B7]/20 my-[30px]"/>
                    <div class="flex flex-col gap-[40px]">
                        <div class="font-medium text-[16px] text-[#0B131D]">Блок №1</div>
                        <div class="flex flex-col gap-[40px]">
                            <x-forms.textarea title="Опишите вашу историю" placeholder="Поделитесь вашими впечатлениями"/>
                            <x-forms.image-multiple title="Загрузите до 5 фото" placeholder="Название"/>
                            <x-forms.http title="Ссылка на YouTube видео (если есть)" placeholder="Ссылка на видео"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
