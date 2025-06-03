@extends('layouts.admin.app')

@section('content')
    <div class="px-[16px] pt-[30px] pb-[20px] md:px-[30px] md:pt-[40px] md:pb-[30px]">
        <div class="mb-[14px]">
            <div class="text-[20px] font-medium text-[#0B131D] md:text-[28px]">Моя галерея отзывов</div>
        </div>
        <div class="mb-[30px]">
            <div class="text-[14px] font-medium text-[#717171]/60">
                Мои моменты жизни — первые шаги, маленькие победы, страхи и успехи.
                <br/>
                Истории, которые покажут тебе, как пройти свой путь в inCruises: что делать, чего избегать, куда идти.
            </div>
        </div>
        @subdomain
            <a href="{{ route('admin.review.create') }}" class="inline-block">
                <div class="flex w-fit items-center gap-[12px] rounded-[6px] border border-[#E8E8E8] bg-[#F9F9F9] px-[20px] py-[8px]">
                    @include('components.icons.plus', ['color' => '#0B131D'])
                    <div class="text-[14px] font-medium text-[#0B131D] md:text-[15px]">Добавить отзыв</div>
                </div>
            </a>
        @endsubdomain
    </div>
    <div class="pb-[30px] md:pb-[40px]">
        <div class="hide-scrollbar w-full overflow-x-auto">
            <div class="flex min-w-max gap-[20px] px-[16px] md:px-[30px]">
                @forelse($reviews as $review)
                    <a href="{{ $review->youtube_url }}">
                        <x-admin.review-card :review="$review" :typeTravelEnum="$typeTravelEnum"/>
                    </a>
                @empty
                    <div class="bg-[#F9F9F9] rounded-[6px] h-[48px] md:h-[59px] col-span-full flex items-center justify-center w-full">
                        <div class="font-medium text-[15px] text-[#0B131D]">Начните с добавления первого отзыво</div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection
