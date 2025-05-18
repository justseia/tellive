@props([
    'name' => '',
    'title' => '',
    'placeholder' => '',
    'showExample' => true,
    'required' => true,
    'value' => null,
    'rows' => 2,
])

<div class="flex flex-col gap-[10px]">
    <div class="flex flex-col gap-[10px]">
        <div class="font-medium text-[15px] text-[#0B131D]/70">{{ $title }}</div>
        <textarea name="{{ $name }}" rows="{{ $rows }}" placeholder="{{ $placeholder }}" class="border border-[#DBDFE9] rounded-[4px] px-[16px] text-[15px] placeholder:text-[#9EA9B7]" {{ $required ? 'required' : '' }}>{{ $value }}</textarea>
    </div>

    @if($showExample)
        <x-forms.example/>
    @endif
</div>
