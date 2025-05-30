<div x-data="{ open: false }" class="relative border-b border-[#D7DADF]/30 bg-white">
    <header class="flex items-center justify-between w-full max-w-[1320px] mx-auto h-[54px] md:h-[78px] px-[20px]">
        @include('components.icons.logo', ['class' => 'h-[36px] w-auto'])

        <div class="items-center gap-[40px] hidden md:flex">
            <a href="{{ route('landing.index') }}" class="font-medium text-[15px] text-[#0B131D]">Главная</a>
            <a href="{{ route('admin.profile.index') }}" class="font-medium text-[15px] text-[#0B131D]">Мой профиль</a>
            <a href="{{ route('admin.history.index') }}" class="font-medium text-[15px] text-[#0B131D]">Моя история</a>
            <a href="{{ route('admin.review.index') }}" class="font-medium text-[15px] text-[#0B131D]">Отзывы</a>
        </div>

        <div @click="open = !open" class="cursor-pointer relative">
            <div class="flex items-center gap-[12px]">
                <img src="{{ app('user')->avatar }}" alt="img" class="w-[40px] h-[40px] rounded-full object-center object-cover">
                <div class="font-medium text-[15px] text-[#212121]">Жулдыз К.</div>
                @include('components.icons.down')
            </div>

            <div
                    x-show="open"
                    x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0 translate-y-2"
                    x-transition:enter-end="opacity-100 translate-y-0"
                    x-transition:leave="transition ease-in duration-150"
                    x-transition:leave-start="opacity-100 translate-y-0"
                    x-transition:leave-end="opacity-0 translate-y-2"
                    @click.away="open = false"
                    @keydown.escape.window="open = false"
                    class="absolute right-0 mt-2 w-[180px] bg-white border border-gray-200 rounded-[4px] shadow-lg z-50"
                    x-cloak
            >
                <a href="{{ route('admin.profile.index') }}" class="block px-[22px] py-[10px] text-sm text-gray-700 hover:bg-gray-100">Мой сайт</a>
                <a href="{{ route('admin.profile.index') }}" class="block px-[22px] py-[10px] text-sm text-gray-700 hover:bg-gray-100">Профиль</a>
                <a href="{{ route('admin.profile.index') }}" class="block px-[22px] py-[10px] text-sm text-gray-700 hover:bg-gray-100">Кабинет</a>
                <a href="{{ route('admin.profile.index') }}" class="block px-[22px] py-[10px] text-sm text-[#DD2238] bg-[#FDF6F2] hover:bg-red-200">Выход</a>
            </div>
        </div>
    </header>
</div>
