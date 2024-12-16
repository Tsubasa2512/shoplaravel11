<?php

namespace App\Repositories;

use App\Models\Categories;
use App\Models\CategoryType;
use App\Repositories\BaseRepositoryInterface;

class CategoryRepository implements BaseRepositoryInterface
{
    protected $category;
    public function __construct(Categories $category)
    {
        $this->category = $category;
    }

    public function all()
    {
        return $this->category->orderBy("index_menu", "asc")->get();
    }
    public function findById($id)
    {
        return $this->category->find($id);
    }
    public function create(array $data)
    {
        return $this->category->create($data);
    }
    public function update($id, array $data)
    {
        $category = $this->findById($id);
        if ($category) {
            return $category->update($data);
        }
        return;
    }
    public function delete($id)
    {
        $category = $this->findById($id);
        if ($category) {
            return $category->delete();
        }
        return;
    }

    public function getAllCategoryType()
    {
        return CategoryType::all();
    }

    public function getMaxIndexMenu()
    {
        return Categories::max("index_menu");
    }
}
