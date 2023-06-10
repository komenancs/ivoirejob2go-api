<?php

namespace App\Utils;

use Illuminate\Support\Str;

class Utils
{
    const API_VERSION = "v1.0.1";

    public static function slugify(mixed $str){
        return Str::slug($str);
    }
}
