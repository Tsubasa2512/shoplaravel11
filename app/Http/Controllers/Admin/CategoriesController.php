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
        // $categories = Categories::all();
        $categories = $this->categoryService->getAll();
        return view("admin.categories", compact("categories"));
    }
    public function add()
    {
        // $categoryTypes = CategoryType::all();
        // $maxIndexMenu = Categories::max('index_menu');
        // $nextIndexMenu = $maxIndexMenu ? $maxIndexMenu + 1 : 1;
        $categoryTypes = $this->categoryService->getAllCategoryType();
        $nextIndexMenu = $this->categoryService->getCategoryAddIndexMenu();
        return view("admin.categories_add", compact(["categoryTypes", "nextIndexMenu"]));
    }
    public function edit(Request $request)
    {
        $id = $request->query("id");
        // $category = Categories::find($id);
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
        $slug = $data["slug"];
        if (!$slug) {
            $slug = SlugHelper::generateSlug($data["name"], 'categories');
        }
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = UploadHelper::upload($request->file('image'), 'uploads/categories', $request->slug);
        }
        // $categories = Categories::create(
        //     [
        //         'name_en' => $data['name'],
        //         'name_vi' => $data['name'],
        //         'slug' => $slug,
        //         'type_id' => $data['type_id'],
        //         'index_menu' => $data['index_menu'] + 0,
        //         'image' => $imagePath,
        //         'show' => $data['show'] ?? 0,
        //         'featured' => $data['featured'] ?? 0,
        //         'description' => $data['description'],
        //         'created_at' => $data['time'],
        //     ]
        // );
        $category = $this->categoryService->create([
            'name_en' => $data['name'],
            'name_vi' => $data['name'],
            'slug' => $slug,
            'type_id' => $data['type_id'],
            'index_menu' => $data['index_menu'] + 0,
            'image' => $imagePath,
            'show' => $data['show'] ?? 0,
            'featured' => $data['featured'] ?? 0,
            'description' => $data['description'],
            'created_at' => $data['time'],
        ]);
        if (!$category) {
            return redirect()->route('admin.categories')->with('error', 'Category created failed !');
        }
        return redirect()->route('admin.categories')->with('success', 'Category created successfully !');
    }

    public function update(Request $request, $id)
    {
        // $category = Categories::findOrFail($id);
        // $category = $this->categoryService

        // $data = $request->all();
        // $category->name_vi  = $data['name'];
        // $category->name_en  = $data['name'];
        // $category->slug     = $data['slug'];
        // $category->type_id = $data['type_id'];
        // $category->index_menu = $data['index_menu'];
        // $category->description = $data['description'];
        // $category->show = isset($data['show']) ? 1 : 0;;
        // $category->featured = isset($data['featured']) ? 1 : 0;

        $request->merge([
            'show' => $request->has('active') ? 1 : 0,
            'featured' => $request->has('featured') ? 1 :0,
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
