<?php

namespace App\Http\Controllers\Admin;

use App\Services\ArticleMenuService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    protected $articleMenuSecive;
    public function __construct(ArticleMenuService $articleMenuSecive)
    {
        $this->articleMenuSecive = $articleMenuSecive;
    }
    public function index()
    {
        return view("admin.article_menu");
    }
    public function add()
    {
        $category = $this->articleMenuSecive->getCategory();
        return view("admin.article_add", compact("category"));
    }
}
