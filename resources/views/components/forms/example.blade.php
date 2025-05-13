@props([
    'image' => ''
])

<div x-data="{ showExample: false }" class="flex flex-col gap-[10px]">
    <div class="flex items-center gap-[10px] cursor-pointer select-none" @click="showExample = !showExample">
        <div :class="{'rotate-90': showExample, 'transition-transform duration-300': true}">
            @include('icons.right')
        </div>
        <div class="font-medium text-[14px] text-[#9EA9B7]">Посмотреть пример</div>
    </div>

    <div x-show="showExample"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 max-h-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0 max-h-0"
         class="overflow-hidden">
        <img src="{{ $image }}" alt="img" class="w-full rounded-[6px]">
    </div>
</div>
