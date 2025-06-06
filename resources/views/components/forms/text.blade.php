@props([
    'name' => '',
    'title' => '',
    'placeholder' => '',
    'showExample' => true,
    'required' => true,
    'value' => null,
])

<div class="flex flex-col gap-[10px]">
    <div class="flex flex-col gap-[10px]">
        <div class="font-medium text-[15px] text-[#0B131D]/70">{{ $title }}</div>
        <input name="{{ $name }}" value="{{ $value }}" type="text" class="border border-[#DBDFE9] h-[46px] rounded-[4px] px-[16px] text-[15px] placeholder:text-[#9EA9B7]" placeholder="{{ $placeholder }}" {{ $required ? 'required' : '' }}>
    </div>

    @if($showExample)
        <x-forms.example/>
    @endif
</div>
