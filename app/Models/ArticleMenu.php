<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleMenu extends Model
{
    use HasFactory;
    protected $fillable = [
        'image',
        'index_menu',
        'name',
        'category_id',
        'description',
        'parent_id',
        'index_menu',
        'show',
        'featured',
        'slug'
    ];
    public function category()
    {
        return $this->belongsTo(Categories::class, 'category_id');
    }
    public function parent()
    {
        return $this->belongsTo(ArticleMenu::class, foreignKey: 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(ArticleMenu::class, 'parent_id');
    }
}
