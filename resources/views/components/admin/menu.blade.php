<div>
    <div class="mb-[20px] md:mb-[30px]">
        <div class="mb-[10px] md:mb-[18px]">
            <div class="font-medium text-[15px] text-[#9CA2AA]">Основное:</div>
        </div>
        <div class="flex flex-col gap-[6px] md:gap-[10px]">
            <a href="{{ route('admin.profile.index') }}">
                <div class="flex gap-[14px] items-center pl-[14px] rounded-[6px] h-[48px] {{ Route::is('admin.profile.*') ? 'bg-[#F9F9FB]' : '' }}">
                    <img src="{{ app('user')->avatar }}" alt="img" class="rounded-full w-[24px] h-[24px]">
                    <div class="font-medium text-[15px] text-[#5A6472]">Профиль</div>
                </div>
            </a>
            <a href="{{ route('admin.history.index') }}">
                <div class="flex gap-[14px] items-center pl-[14px] rounded-[6px] h-[48px] {{ Route::is('admin.history.*') ? 'bg-[#F9F9FB]' : '' }}">
                    @include('components.icons.history')
                    <div class="font-medium text-[15px] text-[#5A6472]">Истории</div>
                </div>
            </a>
            <a href="{{ route('admin.video.index') }}">
                <div class="flex gap-[14px] items-center pl-[14px] rounded-[6px] h-[48px] {{ Route::is('admin.video.*') ? 'bg-[#F9F9FB]' : '' }}">
                    @include('components.icons.video')
                    <div class="font-medium text-[15px] text-[#5A6472]">Видео</div>
                </div>
            </a>
            <a href="{{ route('admin.review.index') }}">
                <div class="flex gap-[14px] items-center pl-[14px] rounded-[6px] h-[48px] {{ Route::is('admin.review.*') ? 'bg-[#F9F9FB]' : '' }}">
                    @include('components.icons.review')
                    <div class="font-medium text-[15px] text-[#5A6472]">Отзывы</div>
                </div>
            </a>
        </div>
    </div>
    @auth
        <div class="mb-[30px] md:mb-[90px]">
            <div class="mb-[18px]">
                <div class="font-medium text-[15px] text-[#9CA2AA]">Управление:</div>
            </div>
            <div class="flex flex-col gap-[10px]">
                <a href="{{ route('admin.office.index') }}">
                    <div class="flex gap-[14px] items-center pl-[14px] rounded-[6px] h-[48px] {{ Route::is('admin.office.*') ? 'bg-[#F9F9FB]' : '' }}">
                        @include('components.icons.history')
                        <div class="font-medium text-[15px] text-[#5A6472]">Кабинет</div>
                    </div>
                </a>
                <a href="{{ route('admin.client.index') }}">
                    <div class="flex gap-[14px] items-center pl-[14px] rounded-[6px] h-[48px] {{ Route::is('admin.client.*') ? 'bg-[#F9F9FB]' : '' }}">
                        @include('components.icons.video')
                        <div class="font-medium text-[15px] text-[#5A6472]">Клиенты</div>
                    </div>
                </a>
                <a href="{{ route('admin.editor.index') }}">
                    <div class="flex gap-[14px] items-center pl-[14px] rounded-[6px] h-[48px] {{ Route::is('admin.editor.*') ? 'bg-[#F9F9FB]' : '' }}">
                        @include('components.icons.profile')
                        <div class="font-medium text-[15px] text-[#5A6472]">Редактор</div>
                    </div>
                </a>
            </div>
        </div>
        <a href="#">
            <div class="flex gap-[14px] items-center pl-[14px] rounded-[6px] h-[48px] bg-[#FFF7F7]">
                @include('components.icons.profile', ['color' => '#DD4422'])
                <div class="font-medium text-[15px] text-[#DD4422]">Выход</div>
            </div>
        </a>
    @endauth
</div>
