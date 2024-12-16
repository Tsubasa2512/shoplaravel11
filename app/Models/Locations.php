<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Locations extends Model
{
    public function departureProducts()
    {
        return $this->hasMany(Product::class, 'departure_from');
    }

    public function destinationProducts()
    {
        return $this->hasMany(Product::class, 'destination');
    }
}
