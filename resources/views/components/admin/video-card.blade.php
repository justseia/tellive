@props([
    'width' => 'w-[273px] md:w-[343px]',
    'height' => 'h-[153px] md:h-[193px]',
    'video' => null,
])

<div class="{{ $width }} shrink-0">
    <div class="{{ $height }} relative rounded-[10px] overflow-hidden mb-[10px]">
        <img src="{{ $video->image_url }}" alt="img" class="absolute top-0 left-0 w-full h-full object-cover object-center">
        <div class="absolute w-full h-full bg-black/30"></div>
        <div class="absolute top-1/2 left-1/2 -translate-1/2 bg-white/80 w-[40px] h-[40px] rounded-full flex items-center justify-center">
            @include('components.icons.play')
        </div>
    </div>
    <div class="w-full">
        <div class="font-medium text-[14px] md:text-[16px] text-black">
            {{ $video->title }}
        </div>
    </div>
</div>
