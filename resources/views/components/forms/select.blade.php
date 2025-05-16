@props([
    'name' => '',
    'title' => '',
    'placeholder' => '',
    'selected' => '',
    'showExample' => true,
    'required' => true,
])

<div class="flex flex-col gap-[10px]">
    <div class="flex flex-col gap-[10px]">
        <div class="font-medium text-[15px] text-[#0B131D]/70">{{ $title }}</div>
        <select name="{{ $name }}" class="border border-[#DBDFE9] h-[46px] rounded-[4px] px-[16px] text-[15px]" {{ $required ? 'required' : '' }}>
            <option class="text-gray-400" value="" disabled selected>{{ $selected }}</option>
            <option>123</option>
        </select>
    </div>

    @if($showExample)
        <x-forms.example/>
    @endif
</div>
