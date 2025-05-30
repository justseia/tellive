@extends('layouts.admin.app')

@section('content')
    <div class="md:px-[30px] px-[16px] pt-[40px] pb-[40px]">
        <div class="mb-[30px]">
            <div class="font-medium text-[20px] md:text-[28px] text-[#0B131D]">Подборка историй</div>
        </div>
        <div class="mb-[30px]">
            <form action="{{ route('admin.history.search') }}" method="GET" class="flex items-center gap-[10px]">
                <select name="type" onchange="this.form.submit()" class="border border-[#DEDFE7] rounded-[6px] pl-[16px] md:pl-[20px] pr-[32px] md:pr-[40px] max-w-[105px]">
                    <option onchange="this.form.submit()" value="" disabled selected hidden>Темы</option>
                    @foreach($typeTravelEnum as $key => $typeTravel)
                        <option value="{{ $key }}" {{ request('type') == $key ? 'selected' : '' }}>{{ $typeTravel }}</option>
                    @endforeach
                </select>
                <input name="search" type="search" placeholder="Поиск по названию / партнеру" onchange="this.form.submit()" value="{{ request('search') }}" class="w-full max-w-[458px] border border-[#DEDFE7] rounded-[6px] pl-[16px] md:pl-[20px] pr-[32px] md:pr-[40px]">
            </form>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-[20px] gap-y-[30px] md:gap-y-[50px]">
            @forelse($histories as $history)
                <x-admin.history-card :history="$history" :dropdown="false" width="w-full"/>
            @empty
                <div class="bg-[#F9F9F9] rounded-[6px] h-[48px] md:h-[59px] col-span-full flex items-center justify-center w-full">
                    <div class="font-medium text-[15px] text-[#0B131D]">Нет данных</div>
                </div>
            @endforelse
        </div>
    </div>
@endsection
