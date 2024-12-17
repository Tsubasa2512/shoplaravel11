<?php

namespace App\Repositories;

use App\Models\Durations;
use App\Models\Locations;
use App\Models\ProductMenu;
use App\Models\Product;
use App\Models\TourTypes;
use App\Repositories\BaseRepositoryInterface;

class ProductRepository  implements BaseRepositoryInterface
{

    protected $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }
    public function all()
    {
        return $this->product->orderBy("id", "asc")->get();
    }

    public function findById($id)
    {
        return $this->product->find($id);
    }

    public function create(array $data)
    {
        return $this->product->create($data);
    }
    public function update($id, array $data)
    {
        $product = $this->findById($id);
        if ($product) {
            return $product->update($data);
        }
        return false;
    }


    public function delete($id)
    {
        $product = $this->findById($id);
        if ($product) {
            return $product->delete();
        }
        return false;
    }
    public function getProductMenu($menu_id = null)
    {
        if ($menu_id) {
            return ProductMenu::where('id', $menu_id)->first();
        }
        return ProductMenu::all();
    }
    public function getTourType()
    {
        return TourTypes::all();
    }
    public function getDuration()
    {
        return Durations::all();
    }
    public function getLocation()
    {
        return Locations::all();
    }
}
