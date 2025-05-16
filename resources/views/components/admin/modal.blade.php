@props([
    'key'
])

<div
    x-show="{{ $key }}"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    x-cloak
    class="fixed inset-0 z-50 flex items-center justify-center bg-black/50"
    @click.self="{{ $key }} = false"
    @keydown.escape.window="{{ $key }} = false"
>
    <div
        @click.stop
        x-show="{{ $key }}"
        x-transition:enter="transition ease-out duration-300 transform"
        x-transition:enter-start="scale-95 opacity-0"
        x-transition:enter-end="scale-100 opacity-100"
        x-transition:leave="transition ease-in duration-200 transform"
        x-transition:leave-start="scale-100 opacity-100"
        x-transition:leave-end="scale-95 opacity-0"
        class="bg-white rounded-2xl shadow-lg max-w-[500px] w-full p-6"
    >
        <div class="flex justify-end">
            <button @click="{{ $key }} = false" class="text-gray-500 text-xl font-bold hover:text-gray-700">
                @include('icons.close')
            </button>
        </div>
        <div class="mt-2">
            {{ $slot }}
        </div>
    </div>
</div>
