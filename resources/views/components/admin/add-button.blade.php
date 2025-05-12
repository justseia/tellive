@props([
    'title' => null
])

<div class="flex h-[48px] w-full items-center justify-center rounded-[10px] border border-[#2272DD] md:h-[59px]">
    <div class="mr-[10px]">
        @include('icons.plus')
    </div>
    <div class="text-[15px] font-medium text-[#2272DD]">{{ $title }}</div>
</div>
