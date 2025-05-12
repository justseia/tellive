@extends('layouts.admin.app')

@section('content')
    <div class="md:px-[30px] px-[16px] pt-[40px] pb-[40px]">
        <div class="mb-[14px]">
            <div class="font-medium text-[20px] md:text-[28px] text-[#0B131D]">Видео</div>
        </div>
        <div class="mb-[30px]">
            <div class="font-medium text-[14px] text-[#717171]/60">Короткие видео, которые объясняют всё: как начать, куда нажать и что делать.
                <br/>
                Посмотри — за минуту разберешься, как устроен клуб.
            </div>
        </div>
        <div class="mb-[30px]">
            <a href="" class="inline-block">
                <div class="flex items-center w-fit gap-[12px] rounded-[6px] border border-[#E8E8E8] bg-[#F9F9F9] py-[8px] px-[20px]">
                    @include('icons.plus', ['color' => '#0B131D'])
                    <div class="font-medium text-[14px] md:text-[15px] text-[#0B131D]">Добавить видео</div>
                </div>
            </a>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
            @forelse(range(1, 5) as $story)
                <a href="">
                    <x-admin.video-card/>
                </a>
            @empty
                <div class="bg-[#F9F9F9] rounded-[6px] h-[48px] md:h-[59px] flex items-center justify-center w-full">
                    <div class="font-medium text-[15px] text-[#0B131D]">Начните с добавления первого видео</div>
                </div>
            @endforelse
        </div>
    </div>
@endsection
