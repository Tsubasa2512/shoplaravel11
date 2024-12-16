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
        dd($menu_id);
        return view("admin.product_add", compact("productMenu"));
    }
}
