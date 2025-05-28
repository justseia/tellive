<div x-data="{ open: false }" x-effect="document.body.classList.toggle('overflow-hidden', open)">
    <header class="flex items-center justify-between lg:hidden w-full h-[54px] md:h-[80px] border-b border-[#D7DADF]/30 bg-white px-[16px]">
        @include('components.icons.logo', ['class' => 'h-[36px] w-auto'])
        <div @click="open = true">
            @include('components.icons.three-line')
        </div>
    </header>

    <div
            x-show="open"
            x-transition.opacity
            @click="open = false"
            class="fixed inset-0 bg-black/50 z-40"
    ></div>

    <aside
            x-show="open"
            x-transition:enter="transition transform duration-300"
            x-transition:enter-start="-translate-x-full"
            x-transition:enter-end="translate-x-0"
            x-transition:leave="transition transform duration-300"
            x-transition:leave-start="translate-x-0"
            x-transition:leave-end="-translate-x-full"
            class="fixed top-0 left-0 h-full w-[320px] bg-white shadow-md z-50 flex flex-col"
            @click.away="open = false"
    >
        <div class="flex items-center justify-end h-[48px] pr-[16px]">
            <button @click="open = false">
                @include('components.icons.close')
            </button>
        </div>

        <div class="flex-1 px-[20px] pb-[20px] overflow-y-auto">
            <x-admin.menu/>
        </div>
    </aside>
</div>
