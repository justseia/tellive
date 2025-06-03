<div x-data="{ aside: false, dropdown: false }" x-effect="document.body.classList.toggle('overflow-hidden', open)">
    <header class="flex items-center justify-between w-full max-w-[1320px] mx-auto h-[54px] md:h-[78px] px-[20px]">
        @include('components.icons.logo', ['class' => 'h-[36px] w-auto'])

        <div class="items-center gap-[40px] hidden lg:flex">
            <a href="{{ route('landing.index') }}" class="font-medium text-[15px] text-[#0B131D]">Главная</a>
            <a href="{{ route('admin.profile.index') }}" class="font-medium text-[15px] text-[#0B131D]">Мой профиль</a>
            <a href="{{ route('admin.history.index') }}" class="font-medium text-[15px] text-[#0B131D]">Моя история</a>
            <a href="{{ route('admin.review.index') }}" class="font-medium text-[15px] text-[#0B131D]">Отзывы</a>
        </div>

        <div @click="aside = true" class="lg:hidden">
            @include('components.icons.three-line')
        </div>

        <div @click="dropdown = !dropdown" class="cursor-pointer relative hidden lg:block">
            <div class="flex items-center gap-[12px]">
                <img src="{{ app('user')->avatar }}" alt="img" class="w-[40px] h-[40px] rounded-full object-center object-cover">
                <div class="font-medium text-[15px] text-[#212121]">{{ app('user')->first_name . ' ' . mb_substr(app('user')->last_name, 0, 1) }}.</div>
                @include('components.icons.down')
            </div>

            <div
                x-show="dropdown"
                x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 translate-y-2"
                x-transition:enter-end="opacity-100 translate-y-0"
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100 translate-y-0"
                x-transition:leave-end="opacity-0 translate-y-2"
                @click.away="dropdown = false"
                @keydown.escape.window="dropdown = false"
                class="absolute right-0 mt-2 w-[180px] bg-white border border-gray-200 rounded-[4px] overflow-hidden shadow-lg z-50"
                x-cloak
            >
                <a href="{{ route('landing.index') }}" class="block px-[22px] py-[10px] text-sm text-gray-700 hover:bg-gray-100">Мой сайт</a>
                <a href="{{ route('admin.profile.index') }}" class="block px-[22px] py-[10px] text-sm text-gray-700 hover:bg-gray-100">Профиль</a>
                <a href="{{ route('admin.office.index') }}" class="block px-[22px] py-[10px] text-sm text-gray-700 hover:bg-gray-100">Кабинет</a>
                <form method="POST" action="{{ route('admin.auth.logout') }}" class="w-full">
                    @csrf
                    <button type="submit" class="block px-[22px] py-[10px] text-sm text-[#DD2238] bg-[#FDF6F2] hover:bg-red-200 w-full text-start">Выход</button>
                </form>
            </div>
        </div>
    </header>

    <div
        x-show="aside"
        x-transition.opacity
        @click="aside = false"
        class="fixed inset-0 bg-black/50 z-40"
    ></div>

    <aside
        x-show="aside"
        x-transition:enter="transition transform duration-300"
        x-transition:enter-start="-translate-x-full"
        x-transition:enter-end="translate-x-0"
        x-transition:leave="transition transform duration-300"
        x-transition:leave-start="translate-x-0"
        x-transition:leave-end="-translate-x-full"
        class="fixed top-0 left-0 h-full w-[320px] bg-white shadow-md z-50 flex flex-col"
        @click.away="aside = false"
    >
        <div class="flex items-center justify-end h-[48px] pr-[16px]">
            <button @click="aside = false">
                @include('components.icons.close')
            </button>
        </div>

        <div class="flex-1 px-[20px] pb-[20px] overflow-y-auto">
            <x-admin.menu/>
        </div>
    </aside>
</div>
