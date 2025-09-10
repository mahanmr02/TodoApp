<?php

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Morilog\Jalali\Jalalian;

if (!function_exists('jalaliDate')) {
    function jalaliDate($date, $format = '%A, %d %B %Y H:i')
    {
        return Jalalian::forge($date)->format($format);
    }
}