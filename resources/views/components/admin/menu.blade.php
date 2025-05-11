<div>
    <div class="mb-[20px] md:mb-[30px]">
        <div class="mb-[10px] md:mb-[18px]">
            <div class="font-medium text-[15px] text-[#9CA2AA]">Основное:</div>
        </div>
        <div class="flex flex-col gap-[6px] md:gap-[10px]">
            <a href="#">
                <div class="flex gap-[14px] items-center pl-[14px] rounded-[6px] h-[48px] {{ Route::is('admin.profile.*') ? 'bg-[#F9F9FB]' : '' }}">
                    <img src="https://pbs.twimg.com/profile_images/1701878932176351232/AlNU3WTK_400x400.jpg" alt="img" class="rounded-full w-[24px] h-[24px]">
                    <div class="font-medium text-[15px] text-[#5A6472]">Профиль</div>
                </div>
            </a>
            <a href="#">
                <div class="flex gap-[14px] items-center pl-[14px] rounded-[6px] h-[48px] {{ Route::is('admin.profile.*') ? 'bg-[#F9F9FB]' : '' }}">
                    <img src="{{ asset('assets/icons/history.svg') }}" alt="img">
                    <div class="font-medium text-[15px] text-[#5A6472]">Истории</div>
                </div>
            </a>
            <a href="#">
                <div class="flex gap-[14px] items-center pl-[14px] rounded-[6px] h-[48px]">
                    <img src="{{ asset('assets/icons/video.svg') }}" alt="img">
                    <div class="font-medium text-[15px] text-[#5A6472]">Видео</div>
                </div>
            </a>
            <a href="#">
                <div class="flex gap-[14px] items-center pl-[14px] rounded-[6px] h-[48px]">
                    <img src="{{ asset('assets/icons/review.svg') }}" alt="img">
                    <div class="font-medium text-[15px] text-[#5A6472]">Отзывы</div>
                </div>
            </a>
        </div>
    </div>
    <div class="mb-[30px] md:mb-[90px]">
        <div class="mb-[18px]">
            <div class="font-medium text-[15px] text-[#9CA2AA]">Управление:</div>
        </div>
        <div class="flex flex-col gap-[10px]">
            <a href="#">
                <div class="flex gap-[14px] items-center pl-[14px] rounded-[6px] h-[48px]">
                    <img src="{{ asset('assets/icons/history.svg') }}" alt="img">
                    <div class="font-medium text-[15px] text-[#5A6472]">Кабинет</div>
                </div>
            </a>
            <a href="#">
                <div class="flex gap-[14px] items-center pl-[14px] rounded-[6px] h-[48px]">
                    <img src="{{ asset('assets/icons/video.svg') }}" alt="img">
                    <div class="font-medium text-[15px] text-[#5A6472]">Клиенты</div>
                </div>
            </a>
            <a href="#">
                <div class="flex gap-[14px] items-center pl-[14px] rounded-[6px] h-[48px]">
                    <img src="{{ asset('assets/icons/review.svg') }}" alt="img">
                    <div class="font-medium text-[15px] text-[#5A6472]">Подписка</div>
                </div>
            </a>
            <a href="#">
                <div class="flex gap-[14px] items-center pl-[14px] rounded-[6px] h-[48px]">
                    <img src="{{ asset('assets/icons/profile.svg') }}" alt="img">
                    <div class="font-medium text-[15px] text-[#5A6472]">Редактор</div>
                </div>
            </a>
        </div>
    </div>

    <a href="#">
        <div class="flex gap-[14px] items-center pl-[14px] rounded-[6px] h-[48px] bg-[#FFF7F7]">
            @include('icons.profile', ['color' => '#DD4422'])
            <div class="font-medium text-[15px] text-[#DD4422]">Выход</div>
        </div>
    </a>
</div>
