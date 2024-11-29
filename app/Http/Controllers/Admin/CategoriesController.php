<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\CategoryService;

class CategoriesController extends Controller
{
    protected $categoryService;
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }
    public function index()
    {
        $categories = $this->categoryService->getAll();
        return view("admin.categories", compact("categories"));
    }
    public function add()
    {
        $categoryTypes = $this->categoryService->getAllCategoryType();
        $nextIndexMenu = $this->categoryService->getCategoryAddIndexMenu();
        return view("admin.categories_add", compact(["categoryTypes", "nextIndexMenu"]));
    }
    public function edit(Request $request)
    {
        $id = $request->query("id");
        $category = $this->categoryService->findById($id);
        $categoryTypes = $this->categoryService->getAllCategoryType();
        if (!$category) {
            return redirect()->route('admin.categories')->with("error", "Category not found !");
        }
        return view("admin.categories_edit", compact('category', 'categoryTypes'));
    }

    public function createCategory(Request $request)
    {
        $data = $request->all();
        $category = $this->categoryService->create($data, $request);
        if (!$category) {
            return redirect()->route('admin.categories')->with('error', 'Category created failed !');
        }
        return redirect()->route('admin.categories')->with('success', 'Category created successfully !');
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $validated = $this->categoryService->validateData($id, $request);
        $updated = $this->categoryService->update($id, $validated, $request);
        if (!$updated) {
            return redirect()->route('admin.categories')->with('error', 'Category update failed!');
        }
        return redirect()->route('admin.categories')->with('success', 'Category updated successfully !');
    }
    public function delete($id)
    {
        $category = $this->categoryService->delete($id);
        if (!$category) {
            return redirect()->route('admin.categories')->with('error', 'Category not found');
        }
        return redirect()->route('admin.categories')->with('success', 'Category deleted successfully !');
    }
}
