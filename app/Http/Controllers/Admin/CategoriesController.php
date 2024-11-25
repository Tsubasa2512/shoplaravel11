<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\SlugHelper;
use App\Http\Controllers\Controller;
use App\Models\Categories;
use Illuminate\Http\Request;
use App\Models\CategoryType;
use App\Helpers\UploadHelper;
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
        $category = $this->categoryService->create($data,$request);
        if (!$category) {
            return redirect()->route('admin.categories')->with('error', 'Category created failed !');
        }
        return redirect()->route('admin.categories')->with('success', 'Category created successfully !');
    }

    public function update(Request $request, $id)
    {
        $request->merge([
            'show' => $request->has('show') ? 1 : 0,
            'featured' => $request->has('featured') ? 1 : 0,
        ]);

        $validated = $request->validate([
            "name" => "required|string|max:255",
            "slug" => "required|string|max:255|unique:categories,slug," . $id,
            "type_id" => "required|exists:category_types,id",
            "index_menu" => "required|integer",
            "description" => "nullable|string",
            "show" => "nullable|boolean",
            "featured" => "nullable|boolean",
            "image" => "nullable|image",
            "no_image" => "nullable|string",
        ]);

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
