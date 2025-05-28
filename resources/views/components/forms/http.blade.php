@props([
    'name' => '',
    'title' => '',
    'placeholder' => '',
    'showExample' => true,
    'required' => true,
])

<div class="flex flex-col gap-[10px]">
    <div class="flex flex-col gap-[10px]">
        <div class="font-medium text-[15px] text-[#0B131D]/70">{{ $title }}</div>
        <div class="relative w-full">
            <input name="{{ $name }}" type="url" class="border border-[#DBDFE9] h-[46px] rounded-[4px] pl-[42px] pr-[16px] text-[15px] placeholder:text-[#9EA9B7] w-full" placeholder="{{ $placeholder }}" {{ $required ? 'required' : '' }}>
            <div class="absolute top-1/2 -translate-y-1/2 left-[16px]">
                @include('components.icons.url')
            </div>
        </div>
    </div>

    @if($showExample)
        <x-forms.example/>
    @endif
</div>
