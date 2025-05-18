@props([
    'name' => '',
    'title' => '',
    'placeholder' => '',
    'showExample' => true,
    'required' => true,
])

<div
    x-data="{
        files: [],
        handleFiles(event) {
            const selected = Array.from(event.target.files);
            const allowed = 5 - this.files.length;
            const valid = selected.slice(0, allowed);

            valid.forEach(file => {
                const url = URL.createObjectURL(file);
                this.files.push({ file, url });
            });

            $refs.fileInput.value = null;
        },
        remove(index) {
            URL.revokeObjectURL(this.files[index].url);
            this.files.splice(index, 1);
        }
    }"
    class="flex flex-col gap-[10px]"
>
    <div class="flex flex-col gap-[10px]">
        <div class="font-medium text-[15px] text-[#0B131D]/70">{{ $title }}</div>

        <label x-show="files.length < 5" class="block">
            <div class="w-full relative cursor-pointer">
                <div class="border border-[#DBDFE9] h-[46px] rounded-[4px] pl-[42px] pr-[16px] text-[15px] placeholder:text-[#9EA9B7] flex items-center text-[#9EA9B7]">
                    {{ $placeholder }}
                </div>
                <div class="absolute top-1/2 -translate-y-1/2 left-[16px]">
                    @include('icons.upload')
                </div>
            </div>
            <input
                name="{{ $name }}[]"
                x-ref="fileInput"
                type="file"
                class="hidden"
                accept=".jpg,.jpeg,.png,.webp"
                @change="handleFiles"
                multiple
                {{ $required ? 'required' : '' }}
            >
        </label>

        <template x-if="files.length">
            <div class="flex flex-wrap gap-[10px] mt-2">
                <template x-for="(item, index) in files" :key="item.url">
                    <div class="relative w-[100px] h-[100px]">
                        <img :src="item.url" class="w-full h-full object-cover rounded-[6px] border border-[#DBDFE9]">
                        <button
                            type="button"
                            @click="remove(index)"
                            class="absolute top-[-8px] right-[-8px] w-[20px] h-[20px] bg-red-500 text-white rounded-full text-[13px] font-bold flex items-center justify-center hover:bg-red-600"
                            title="Удалить"
                        >×</button>
                    </div>
                </template>
            </div>
        </template>
    </div>

    @if($showExample)
        <x-forms.example/>
    @endif
</div>
