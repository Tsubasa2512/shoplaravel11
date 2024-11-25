<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleMenu extends Model
{
    use HasFactory;
    protected $fillable = [
        'image',
        'name_en',
        'name_vi',
        'description',
        'category_id',
        'index_menu',
        'show',
        'featured',
        'slug'
    ];
    public function category()
    {
        return $this->belongsTo(Categories::class, 'category_id');
    }
}
