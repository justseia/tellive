@props([
    'title' => null
])

<div class="h-[48px] md:h-[59px] w-full rounded-[10px] border border-[#2272DD] flex items-center justify-center">
    <img src="{{ asset('assets/icons/plus.svg') }}" alt="img" class="mr-[10px]">
    <div class="text-[#2272DD] font-medium text-[15px]">{{ $title }}</div>
</div>
