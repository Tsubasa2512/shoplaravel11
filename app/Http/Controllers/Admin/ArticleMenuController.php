<?php

namespace App\Http\Controllers\Admin;

use App\Services\ArticleMenuService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArticleMenuController extends Controller
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
        $nextIndexMenu = $this->articleMenuSecive->getArticleMenuIndexMenu();
        return view("admin.article_menu_add", compact("category", "nextIndexMenu"));
    }

    public function createArticleMenu(Request $request)
    {
        $data = $request->all();
        $articleMenu = $this->articleMenuSecive->create($data, $request);
        if (!$articleMenu) {
            return redirect()->route("admin.article-menu")->with("error", "Article Menu created failed");
        }
        return redirect()->route("admin.article-menu")->with("success", "Article Menu created successfully");
    }
}
