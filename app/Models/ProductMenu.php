<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductMenu extends Model
{
    use HasFactory;
    protected $fillable = [
        'image',
        'index_menu',
        'name',
        'category_id',
        'description',
        'parent_id',
        'show',
        'featured',
        'slug',
    ];

    public function category()
    {
        return $this->belongsTo(Categories::class, 'category_id');
    }
    public function parent()
    {
        return $this->belongsTo(ProductMenu::class, 'parent_id');
    }
    public function children()
    {
        return $this->hasMany(ProductMenu::class, 'parent_id');
    }

    public function products()
{
    return $this->hasMany(Product::class, 'menu_id');
}
}
