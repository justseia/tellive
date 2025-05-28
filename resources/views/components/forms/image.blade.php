@props([
    'name' => '',
    'title' => '',
    'placeholder' => '',
    'showExample' => true,
    'required' => true,
    'value' => '',
])

<div x-data="{
    file: null,
    previewUrl: '{{ $value }}',
    removedInitial: false,
    handleFileChange(event) {
        const input = event.target;
        if (input.files && input.files[0]) {
            this.file = input.files[0];
            this.previewUrl = URL.createObjectURL(this.file);
        }
    },
    removeFile() {
        this.file = null;
        this.previewUrl = '';
        this.removedInitial = true;
        $refs.fileInput.value = null;
    }
}" class="flex flex-col gap-[10px]">
    <div class="flex flex-col gap-[10px]">
        <div class="font-medium text-[15px] text-[#0B131D]/70">{{ $title }}</div>

        <div x-if="!previewUrl">
            <label>
                <div class="w-full relative cursor-pointer">
                    <div class="border border-[#DBDFE9] h-[46px] rounded-[4px] pl-[42px] pr-[16px] text-[15px] placeholder:text-[#9EA9B7] flex items-center text-[#9EA9B7]">
                        {{ $placeholder }}
                    </div>
                    <div class="absolute top-1/2 -translate-y-1/2 left-[16px]">
                        @include('components.icons.upload')
                    </div>
                </div>
                <input
                    x-ref="fileInput"
                    name="{{ $name }}"
                    type="file"
                    class="hidden"
                    accept=".jpg,.jpeg,.png,.webp"
                    @change="handleFileChange"
                    :required="{{ $required ? 'true' : 'false' }} && removedInitial"
                >
            </label>
        </div>

        <template x-if="previewUrl">
            <div class="relative w-[120px] h-[120px] mt-2">
                <img :src="previewUrl" alt="Preview" class="w-full h-full object-cover rounded-[8px] border border-[#DBDFE9]">
                <button
                    type="button"
                    @click="removeFile"
                    class="absolute top-[-8px] right-[-8px] w-[24px] h-[24px] bg-red-500 text-white rounded-full text-[14px] font-bold flex items-center justify-center hover:bg-red-600"
                    title="Удалить"
                >×
                </button>
            </div>
        </template>
    </div>

    @if($showExample)
        <x-forms.example/>
    @endif
</div>
