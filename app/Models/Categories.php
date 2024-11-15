<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    protected $fillable = [
        'image',
        'name_en',
        'name_vi',
        'description',
        'type_id',
        'show',
        'featured',
        'slug'
    ];
}
