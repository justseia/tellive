@props([
    'title' => '',
])

<div class="flex w-fit items-center gap-[12px] rounded-[6px] border border-[#E8E8E8] bg-[#F9F9F9] px-[20px] py-[8px]">
    @include('icons.plus', ['color' => '#0B131D'])
    <div class="text-[14px] font-medium text-[#0B131D] md:text-[15px]">Добавить отзыв</div>
</div>
