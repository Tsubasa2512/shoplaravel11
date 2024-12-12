<?php

namespace App\Http\Controllers\Admin;

use App\Services\ProductMenuService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductMenuController extends Controller

{
    protected $productMenuService;
    public function __construct(ProductMenuService $productMenuService)
    {
        $this->productMenuService = $productMenuService;
    }

    public function index()
    {
        $productMenu = $this->productMenuService->getHierarchicalMenus();
        return view("admin.product_menu", compact("productMenu"));
    }

    public function add()
    {
        $category = $this->productMenuService->getCategory();
        $nextIndexMenu = $this->productMenuService->getProductMenuIndexMenu();
        $parents = $this->productMenuService->getHierarchicalMenus();
        return view("admin.product_menu_add", compact("category", "nextIndexMenu", "parents"));
    }
    public function createProductMenu(Request $request)
    {
        $data = $request->all();
        $productMenu = $this->productMenuService->create($data, $request);
        if (!$productMenu) {
            return redirect()->route("admin.product-menu")->with("error", "product Menu created failed");
        }
        return redirect()->route("admin.product-menu")->with("success", "product Menu created successfully");
    }
    public function edit(Request $request)
    {
        $id = $request->query(key: "id");
        $productMenu = $this->productMenuService->findById($id);
        $category = $this->productMenuService->getCategory();
        $parents = $this->productMenuService->getHierarchicalMenus();
        if (!$productMenu) {
            return redirect()->route('admin.product-menu')->with("error", "product Menu not found !");
        }
        return view("admin.product_menu_edit", compact('productMenu', 'category', 'parents'));
    }
    public function update(Request $request, $id)
    {
        return view("admin.product_menu_edit");
    }
    public function delete($id)
    {
        return view("admin.product_menu");
    }
}
