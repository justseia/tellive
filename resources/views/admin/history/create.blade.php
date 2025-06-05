@extends('layouts.admin.app')

@section('content')
    <div class="flex-1 px-[10px] bg-[#EFF1F4]">
        <div class="flex flex-col items-center py-[20px] md:py-[40px]">
            <div class="max-w-[620px] w-full">
                <div class="flex items-center justify-between mb-[27px] px-[16px]">
                    <a href="{{ route('admin.history.index') }}">
                        <div class="font-medium text-[15px] text-[#5A6472]">← Назад</div>
                    </a>
                    <button type="button" class="hover:cursor-pointer font-medium text-[15px] text-[#2272DD]">
                        Сохранить
                    </button>
                </div>
                <form action="{{ route('admin.history.store') }}" method="POST" x-data="{ blocks: [1], addBlock() { this.blocks.push(this.blocks.length + 1) }, removeBlock(index) { this.blocks.splice(index, 1) }  }" enctype="multipart/form-data">
                    @csrf
                    <div class="flex flex-col p-[20px] md:p-[30px] bg-white rounded-[10px]">
                        <div class="flex flex-col gap-[10px]">
                            <div class="font-medium text-[20px] md:text-[24px] text-[#0B131D]">Редактор истории</div>
                            <div class="font-medium text-[14px] text-[#9EA9B7]">Этой историей ты вдохновишь других — и укрепишь свой путь.</div>
                        </div>
                        <hr class="border-b border-[#9EA9B7]/20 my-[20px]"/>
                        <div class="flex items-center gap-[7px] mb-[20px]">
                            @include('components.icons.link', ['color' => '#2272DD'])
                            <div class="font-medium text-[14px] text-[#2272DD]">Посмотреть пример заполнения истории</div>
                        </div>
                        <div class="flex flex-col gap-[20px] mb-[40px]">
                            <div class="font-medium text-[16px] text-[#0B131D]">Основная информация</div>
                            <input type="hidden" name="archived" value="0">
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
                            <x-forms.text name="title" title="Напишите название вашей истории" placeholder="Название"/>
                            <x-forms.date name="date" title="Когда это было?"/>
                            <x-forms.image name="image" title="Загрузите фото на обложку" placeholder="Загрузить"/>
                            <x-forms.select name="type_of_history" title="Выберите темы истории" selected="Выберите темы">
                                @foreach($typeTravelEnum as $key => $typeTravel)
                                    <option value="{{ $key }}" {{ request('type') == $key ? 'selected' : '' }}>{{ $typeTravel }}</option>
                                @endforeach
                            </x-forms.select>
                        </div>
                        <hr class="border-b border-[#9EA9B7]/20 my-[30px]"/>
                        <div id="blocks" class="flex flex-col">
                            <template x-for="(block, index) in blocks" :key="block">
                                <div class="relative">
                                    <button type="button"
                                            @click="removeBlock(index)"
                                            x-show="index != 0"
                                            class="absolute top-0 right-0 p-[8px] hover:opacity-80 transition">
                                        <x-icons.delete/>
                                    </button>

                                    <div class="flex flex-col gap-[40px]">
                                        <div class="font-medium text-[16px] text-[#0B131D]">
                                            Блок №
                                            <span x-text="index + 1"></span>
                                        </div>
                                        <div class="flex flex-col gap-[40px]">
                                            <div class="flex flex-col gap-[10px]">
                                                <div class="flex flex-col gap-[10px]">
                                                    <div class="font-medium text-[15px] text-[#0B131D]/70">Опишите вашу историю</div>
                                                    <textarea :name="`blocks[${index}][text]`" rows="4" placeholder="Поделитесь вашими впечатлениями" class="border border-[#DBDFE9] rounded-[4px] px-[16px] text-[15px] placeholder:text-[#9EA9B7]" required></textarea>
                                                </div>
                                                <x-forms.example/>
                                            </div>
                                            <div
                                                x-data="{
                                                    files: [],
                                                    handleFiles(event) {
                                                        const selected = Array.from(event.target.files);
                                                        const allowed = 5 - this.files.length;
                                                        const valid = selected.slice(0, allowed);

                                                        valid.forEach(file => {
                                                            const url = URL.createObjectURL(file);
                                                            this.files.push({ file, url });
                                                        });
                                                    },
                                                    remove(index) {
                                                        if (this.files[index].file) {
                                                            URL.revokeObjectURL(this.files[index].url);
                                                        }
                                                        this.files.splice(index, 1);
                                                    }
                                                }"
                                                class="flex flex-col gap-[10px]"
                                            >
                                                <div class="flex flex-col gap-[10px]">
                                                    <div class="font-medium text-[15px] text-[#0B131D]/70">Загрузите до 5 фото</div>
                                                    <label x-show="files.length < 5" class="block">
                                                        <div class="w-full relative cursor-pointer">
                                                            <div class="border border-[#DBDFE9] h-[46px] rounded-[4px] pl-[42px] pr-[16px] text-[15px] placeholder:text-[#9EA9B7] flex items-center text-[#9EA9B7]">
                                                                Загрузить
                                                            </div>
                                                            <div class="absolute top-1/2 -translate-y-1/2 left-[16px]">
                                                                <x-icons.upload/>
                                                            </div>
                                                        </div>
                                                        <input
                                                            :name="`blocks[${index}][images][]`"
                                                            type="file"
                                                            class="hidden"
                                                            accept=".jpg,.jpeg,.png,.webp"
                                                            @change="handleFiles"
                                                            multiple
                                                            required
                                                        >
                                                    </label>
                                                    <template x-if="files.length">
                                                        <div class="flex flex-wrap gap-[10px] mt-2">
                                                            <template x-for="(item, index) in files" :key="item.url">
                                                                <div class="relative w-[100px] h-[100px]">
                                                                    <img :src="item.url" class="w-full h-full object-cover rounded-[6px] border border-[#DBDFE9]">
                                                                    <button
                                                                        type="button"
                                                                        @click="remove(index)"
                                                                        class="absolute top-[-8px] right-[-8px] w-[20px] h-[20px] bg-red-500 text-white rounded-full text-[13px] font-bold flex items-center justify-center hover:bg-red-600"
                                                                        title="Удалить"
                                                                    >×
                                                                    </button>
                                                                </div>
                                                            </template>
                                                        </div>
                                                    </template>
                                                </div>
                                                <x-forms.example/>
                                            </div>
                                            <div class="flex flex-col gap-[10px]">
                                                <div class="flex flex-col gap-[10px]">
                                                    <div class="font-medium text-[15px] text-[#0B131D]/70">Ссылка на YouTube видео (если есть)</div>
                                                    <div class="relative w-full">
                                                        <input :name="`blocks[${index}][youtube_url]`" type="url" class="border border-[#DBDFE9] h-[46px] rounded-[4px] pl-[42px] pr-[16px] text-[15px] placeholder:text-[#9EA9B7] w-full" placeholder="Ссылка на видео">
                                                        <div class="absolute top-1/2 -translate-y-1/2 left-[16px]">
                                                            @include('components.icons.url')
                                                        </div>
                                                    </div>
                                                </div>
                                                <x-forms.example/>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="border-b border-[#9EA9B7]/20 my-[30px]"/>
                                </div>
                            </template>
                        </div>
                        <button @click.prevent="addBlock" class="flex h-[48px] w-full items-center justify-center rounded-[4px] border border-[#2272DD] bg-[#2272DD]/5 mb-[20px] md:mb-[30px]">
                            <div class="mr-[10px]">
                                @include('components.icons.plus')
                            </div>
                            <div class="text-[15px] font-medium text-[#2272DD]">Добавить блок</div>
                        </button>
                        <div class="flex gap-[10px]">
                            <button type="submit" class="flex h-[48px] w-full items-center justify-center rounded-[4px] border border-[#E8E8E8] bg-[#F9F9F9]">
                                <div class="text-[15px] font-medium text-[#0B131D]">Сохранить в черновик</div>
                            </button>
                            <button type="submit" class="flex h-[48px] w-full items-center justify-center rounded-[4px] bg-[#2272DD]">
                                <div class="text-[15px] font-medium text-white">Опубликовать</div>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
