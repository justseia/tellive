@props([
    'review' => null,
])

<div class="relative h-[360px] w-[262px] rounded-[10px] overflow-hidden shrink-0">
    <div class="relative w-full h-full">
        <img src="{{ $review->image_url }}" alt="img" class="absolute top-0 left-0 w-full h-full object-cover object-center">
        <div class="absolute w-full h-full bg-gradient-to-t from-black via-transparent to-transparent"></div>
    </div>
    <div class="absolute top-0 bottom-0 w-full p-[20px] flex flex-col justify-between">
        <div class="px-[10px] py-[8px] rounded-[6px] bg-[#0A0908]/60 w-fit">
            <div class="font-normal text-[14px] text-white">{{ $review->type_of_travel }}</div>
        </div>
        <div class="flex flex-col">
            <div class="mb-[10px]">
                <div class="font-medium text-[17px] text-white">{{ $review->title }}</div>
            </div>
            <div class="font-normal text-[14px] text-white">{{ $review->description }}</div>
        </div>
    </div>
</div>
