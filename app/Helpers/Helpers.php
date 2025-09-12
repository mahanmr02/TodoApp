<?php

use Illuminate\Support\Str;
use Morilog\Jalali\Jalalian;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

if (!function_exists('jalaliDate')) {
    function jalaliDate($date, $format = '%A, %d %B %Y H:i')
    {
        return Jalalian::forge($date)->format($format);
    }
}

if (! function_exists('setting')) {
    function setting($key, $default = null)
    {
        // کش همه تنظیمات
        $settings = Cache::rememberForever('settings', function () {
            return \App\Models\Setting::pluck('value', 'key')->all();
        });

        return $settings[$key] ?? $default;
    }
}

if (! function_exists('save_file')) {

    function save_file($file, $folder = 'uploads', $disk = 'public')
    {
        try {
            $extension = $file->getClientOriginalExtension();
            $filename = Str::uuid() . '.' . $extension;

            $filePath = "{$folder}/{$filename}";
            Storage::disk($disk)->putFileAs($folder, $file, $filename);

            return $filePath;
        } catch (\Exception $e) {
            report($e);
            return null;
        }
    }

    if (! function_exists('delete_file')) {
        function delete_file(string $filePath, string $disk = 'public'): bool
        {
            try {
                if (Storage::disk($disk)->exists($filePath)) {
                    return Storage::disk($disk)->delete($filePath);
                }

                return false;
            } catch (\Exception $e) {
                report($e);
                return false;
            }
        }
    }
}
