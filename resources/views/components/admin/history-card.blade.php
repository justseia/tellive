@props([
    'history' => null,
    'dropdown' => true,
    'width' => 'w-[276px] md:w-[356px]',
])

<div
    class="{{ $width }} shrink-0"
    x-data="{
        liked: {{ $history->is_favorited ? 'true' : 'false' }},
        async toggleLike() {
            try {
                const response = await fetch('{{ route('admin.history.like', $history->id) }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({})
                });
                const result = await response.json();
                if (result.status === 'liked') {
                    this.liked = true;
                } else if (result.status === 'disliked') {
                    this.liked = false;
                }
            } catch (error) {
                console.error('Ошибка запроса:', error);
            }
        }
    }"
>
    <div class="relative">
        <img src="{{ $history->image_url }}" alt="img" class="rounded-[16px] h-[155px] md:h-[200px] top-0 left-0 w-full mb-[10px] object-cover object-center">
        <button @click.prevent="toggleLike" type="button"
                class="absolute top-[10px] right-[10px] rounded-full bg-[#0A0908]/60 flex items-center justify-center w-[26px] h-[26px]">
            <x-icons.heart fill="liked"/>
        </button>
    </div>
    <div class="w-full rounded-[16px] bg-[#F9F9F9] pb-[30px] p-[20px]">
        <div class="flex justify-between mb-[16px]">
            <div class="font-medium text-[13px] md:text-[14px] text-[#9EA9B7]">{{ $history->date->format('d M Y') }}</div>
            <div class="flex gap-[26px] items-center">
                <div class="flex gap-[8px] items-center">
                    @include('components.icons.views')
                    <div class="font-medium text-[13px] md:text-[14px] text-[#9EA9B7]">{{ $history->views }}</div>
                </div>
                @if($dropdown)
                    <x-icons.three-dot/>
                @endif
            </div>
        </div>
        <div class="flex flex-col">
            <div class="mb-[12px] md:mb-[20px]">
                <div class="font-medium text-[16px] md:text-[18px] text-[#0B131D]">{{ $history->title }}</div>
            </div>
            <div class="mb-[16px]">
                <div class="font-medium text-[14px] md:text-[15px] text-[#5A6472]">Впервые в жизни мы с мужем поехали за границу, вместе с друзьями. Детей оставили дома, хотели сначала увидеть все сами...</div>
            </div>
            <a href="{{ route('admin.history.show', $history->id) }}">
                <div class="font-medium text-[14px] md:text-[16px] text-[#9EA9B7]">Читать историю</div>
            </a>
        </div>
    </div>
</div>
