<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    use HasFactory;
    protected $fillable = [
        'image',
        'name',
        'description',
        'slug',
        'menu_id',
        'show',
        'featured',
        'keywords',
        'schedule',
        'price',
        'sale_price',
        'departure_from',
        'destination',
        'duration',
        'departure_date',
        'transportation',
        'attractions',
        'tour_type'
    ];
    public function productMenu()
    {
        return $this->belongsTo(ProductMenu::class, 'menu_id');
    }
    public function departure_from()
    {
        return $this->belongsTo(Locations::class, 'departure_from');
    }
    public function destination()
    {
        return $this->belongsTo(Locations::class, 'destination');
    }
    public function tourType()
    {
        return $this->belongsTo(TourTypes::class, 'tour_type');
    }
    public function duration()
    {
        return $this->belongsTo(Durations::class, 'duration');
    }
}
