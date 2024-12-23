<?php

namespace App\Repositories;

use App\Models\ArticleMenu;
use App\Models\Categories;
use App\Repositories\BaseRepositoryInterface;

class ArticleMenuRepository implements BaseRepositoryInterface
{

    protected $articleMenu;
    public function __construct(ArticleMenu $articleMenu)
    {
        $this->articleMenu = $articleMenu;
    }
    public function all()
    {
        return $this->articleMenu->all();
    }
    public function findById($id)
    {
        return $this->articleMenu->find($id);
    }
    public function create(array $data)
    {
        return $this->articleMenu->create($data);
    }
    public function update($id, array $data)
    {
        $articleMenu = $this->findById($id); {
            if ($articleMenu) {
                return $articleMenu->update($data);
            }
            return;
        }
    }

    public function delete($id)
    {
        $artcleMenu = $this->findById($id);
        if ($artcleMenu) {
            return $artcleMenu->delete();
        }
        return;
    }
    public function getMaxIndexMenu()
    {
        return ArticleMenu::max("index_menu");
    }
    public function getHierarchicalMenus()
    {
        return ArticleMenu::whereNull('parent_id')->with('children')->orderBy('index_menu')->get();
    }
    public function getCategory()
    {
        return Categories::where("type_id", 1)->get();
    }
}
