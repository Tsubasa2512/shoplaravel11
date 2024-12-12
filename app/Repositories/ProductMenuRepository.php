<?php

namespace App\Repositories;

use App\Models\ProductMenu;
use App\Models\Categories;
use App\Repositories\BaseRepositoryInterface;

class ProductMenuRepository implements BaseRepositoryInterface
{
    protected $productMenu;
    public function __construct(ProductMenu $productMenu)
    {
        $this->productMenu = $productMenu;
    }
    public function all()
    {
        return $this->productMenu->all();
    }

    public function findById($id)
    {
        return $this->productMenu->find($id);
    }
    public function create(array $data)
    {
        return $this->productMenu->create($data);
    }
    public function update($id, array $data){
        $productMenu = $this->productMenu->find($id);
        if($productMenu){
            return $productMenu->update($data);
        }
        return false;
    }
    public function delete($id){
        $productMenu = $this->productMenu->find($id);
        if($productMenu){
            return $productMenu->delete($id);
        }
        return false;
    }
    public function getMaxIndexMenu(){
        return ProductMenu::max("index_menu");
    }

    public function getHierarchicalMenus(){
        return ProductMenu::whereNull("parent_id")->with("children")->orderBy("index_menu")->get();
    }

    public function getCategory(){
        return Categories::where('type_id',2)->get();
    }
}
