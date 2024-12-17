<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    protected $productService;
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }
    public function index()
    {
        $product = $this->productService->getAll();
        return view("admin.product", compact("product"));
    }
    public function create()
    {
        $menu_id = request('menu');
        $productMenu = $this->productService->productMenu($menu_id);
        $duration = $this->productService->getDuration();
        $typeTour = $this->productService->getTourType();
        $location = $this->productService->getLocation();
        return view("admin.product_add", compact("productMenu", "duration", "typeTour", "location"));
    }

    public function createProduct(Request $request)
    {
        $data = $request->all();
        $product = $this->productService->create($data, $request);
        if (!$product) {
            return redirect()->route("admin.product")->with("error", "Product created failed");
        }
        return redirect()->route("admin.product")->with("success", "Product created successfully");
    }



    public function edit(Request $request)
    {
        $id = $request->query(key: "id");

        $menu_id = request('menu');
        $productMenu = $this->productService->productMenu($menu_id);
        $duration = $this->productService->getDuration();
        $typeTour = $this->productService->getTourType();
        $location = $this->productService->getLocation();
        return view("admin.product_edit", compact("productMenu", "duration", "typeTour", "location"));
    }
}
