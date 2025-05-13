@props([
    'title' => '',
    'placeholder' => '',
    'showExample' => true,
    'required' => true,
])

<div class="flex flex-col gap-[10px]">
    <div class="flex flex-col gap-[10px]">
        <div class="font-medium text-[15px] text-[#0B131D]/70">{{ $title }}</div>
        <input type="date" class="border border-[#DBDFE9] h-[46px] rounded-[4px] px-[16px] text-[15px] placeholder:text-[#9EA9B7] appearance-none" value="{{ now()->format('Y-m-d') }}" {{ $required ? 'required' : '' }}>
    </div>

    @if($showExample)
        <x-forms.example/>
    @endif
</div>
