<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    protected $fillable = [
        'image',
        'name',
        'description',
        'type_id',
        'index_menu',
        'show',
        'featured',
        'slug'
    ];

    //get Name Category Type  form Id_Type at Categories table
    public function categoryType()
    {
        return $this->belongsTo(CategoryType::class, 'type_id');
    }
}
