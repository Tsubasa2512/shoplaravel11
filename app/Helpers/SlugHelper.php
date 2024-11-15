<?php

namespace App\Helpers;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class SlugHelper
{
    public static function generateSlug($name, $table, $slugField = 'slug')
    {
        $slug = Str::slug($name);
        $slugExists = DB::table($table)->where($slugField, $slug)->exists();
        if ($slugExists) {
            $i = 2;
            while (DB::table($table)->where($slugField, $slug . $i)->exists()) {
                $i++;
            }
            $slug = $slug . $i;
        }
        return $slug;
    }
}
