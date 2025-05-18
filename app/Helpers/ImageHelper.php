<?php

namespace App\Helpers;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

class ImageHelper
{
    public function upload(UploadedFile $file, string $directory = 'uploads', ?string $disk = 'public'): string
    {
        $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
        return '/storage/' . $file->storeAs($directory, $filename, $disk);
    }
}
