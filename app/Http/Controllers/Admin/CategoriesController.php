<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\SlugHelper;
use App\Http\Controllers\Controller;
use App\Models\Categories;
use Illuminate\Http\Request;
use App\Models\CategoryType;
use App\Helpers\UploadHelper;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Categories::all();

        return view("admin.categories", compact("categories"));
    }
    public function add()
    {
        $categoryTypes = CategoryType::all();
        $maxIndexMenu = Categories::max('index_menu');
        $nextIndexMenu = $maxIndexMenu ? $maxIndexMenu + 1 : 1;
        return view("admin.categories_add", compact(["categoryTypes", "nextIndexMenu"]));
    }
    public function edit(Request $request)
    {
        $id = $request->query("id");
        $category = Categories::find($id);
        if (!$category) {
            return redirect()->route('admin.categories')->with("error", "Category not found !");
        }
        $categoryTypes = CategoryType::all();
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
        $categories = Categories::create(
            [
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
            ]
        );
        return redirect()->route('admin.categories')->with('success', 'Category created successfully !');
    }

    public function update(Request $request, $id)
    {
        $category = Categories::findOrFail($id);
        $data = $request->all();
        $category->name_vi  = $data['name'];
        $category->name_en  = $data['name'];
        $category->slug     = $data['slug'];
        $category->type_id = $data['type_id'];
        $category->index_menu = $data['index_menu'];
        $category->description = $data['description'];
        $category->show = isset($data['show']) ? 1 : 0;;
        $category->featured = isset($data['featured']) ? 1 : 0;
        if ($request->hasFile('image') || isset($data['no_image']) && $data['no_image'] == 'on') {
            if ($category->image) {
                $oldImagePath = public_path('storage/' . $category->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
                $category->image = null;
            }
            if ($request->hasFile('image')) {
                $imagePath = UploadHelper::upload($request->file('image'), 'uploads/categories', $request->slug);
                $category->image = $imagePath;
            }
        }

        $category->save();
        return redirect()->route('admin.categories')->with('success', 'Category updated successfully !');
    }
    public function delete($id)
    {
        $category = Categories::find($id);
        if (!$category) {
            return redirect()->route('admin.categories')->with('error', 'Category not found');
        }
        $category->delete();
        return redirect()->route('admin.categories')->with('success', 'Category deleted successfully !');
    }
}
