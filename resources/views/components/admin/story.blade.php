@props([

])

<div class="border-[1.5px] border-[#2272DD] rounded-[14px] p-[5px] shrink-0">
    <div class="relative rounded-[10px] overflow-hidden">
        <div class="relative h-[110px] w-[110px] md:h-[158px] md:w-[158px]">
            <img src="https://www.k12digest.com/wp-content/uploads/2024/03/1-3-550x330.jpg" alt="img" class="absolute top-0 left-0 w-full h-full object-cover object-center">
            <div class="absolute w-full h-full bg-gradient-to-t from-black via-transparent to-transparent"></div>
        </div>
        <div class="absolute left-0 bottom-0 p-[16px]">
            <div class="text-white font-medium md:text-[14px] text-[11px]">Как выбрать круиз?</div>
        </div>
        <div class="absolute top-[16px] right-[16px]">
            @include('components.icons.link')
        </div>
    </div>
</div>
