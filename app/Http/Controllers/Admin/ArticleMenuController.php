<?php

namespace App\Http\Controllers\Admin;

use App\Services\ArticleMenuService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArticleMenuController extends Controller
{
    protected $articleMenuService;
    public function __construct(ArticleMenuService $articleMenuService)
    {
        $this->articleMenuService = $articleMenuService;
    }
    public function index()
    {
        // $articleMenu = $this->articleMenuService->getAll();
        // $parents = $this->articleMenuService->getHierarchicalMenus();
        $articleMenu = $this->articleMenuService->getHierarchicalMenus();
        return view("admin.article_menu", compact("articleMenu"));
    }
    public function add()
    {
        $category = $this->articleMenuService->getCategory();
        $nextIndexMenu = $this->articleMenuService->getArticleMenuIndexMenu();
        $parents = $this->articleMenuService->getHierarchicalMenus();
        return view("admin.article_menu_add", compact("category", "nextIndexMenu", "parents"));
    }

    public function createArticleMenu(Request $request)
    {
        $data = $request->all();
        $articleMenu = $this->articleMenuService->create($data, $request);
        if (!$articleMenu) {
            return redirect()->route("admin.article-menu")->with("error", "Article Menu created failed");
        }
        return redirect()->route("admin.article-menu")->with("success", "Article Menu created successfully");
    }
    public function edit(Request $request)
    {
        $id = $request->query("id");
        $articleMenu = $this->articleMenuService->findById($id);
        $category = $this->articleMenuService->getCategory();
        $parents = $this->articleMenuService->getHierarchicalMenus();
        if (!$articleMenu) {
            return redirect()->route('admin.article-menu')->with("error", "Article Menu not found !");
        }
        return view("admin.article_menu_edit", compact('articleMenu', 'category', 'parents'));
    }

    public function update(Request $request, $id)
    {

        $validated = $this->articleMenuService->validateData($id, $request);
        $updated = $this->articleMenuService->update($id, $validated, $request);
        if (!$updated) {
            return redirect()->route('admin.article-menu')->with('error', 'Article Menu update failed!');
        }
        return redirect()->route('admin.article-menu')->with('success', 'Article Menu updated successfully !');
    }
    public function delete($id)
    {
        $articleMenu = $this->articleMenuService->delete($id);
        if (!$articleMenu) {
            return redirect()->route('admin.article-menu')->with("error", "Article Menu not found !");
        }
        return redirect()->route('admin.article-menu')->with("success", "Article Menu deleted successfully !");
    }
}
