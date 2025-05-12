@extends('layouts.admin.app')

@section('content')
    <div class="flex flex-col items-center py-[40px] bg-[#EFF1F4] h-full">
        <div class="max-w-[620px] w-full">
            {{-----------------------------------------------------------------------------------------------------------}}
            <div class="flex items-center justify-between mb-[27px] px-[16px]">
                <a href="{{ route('admin.history.index') }}">
                    <div class="font-medium text-[15px] text-[#5A6472]">← Назад</div>
                </a>
                <button @click="form.submit()" class="hover:cursor-pointer font-medium text-[15px] text-[#2272DD]">
                    Сохранить
                </button>
            </div>
            <div class="flex flex-col p-[30px] bg-white rounded-[10px]">

            </div>
        </div>
    </div>
@endsection
