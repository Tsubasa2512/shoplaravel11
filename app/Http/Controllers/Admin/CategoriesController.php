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
        return view("admin.categories");
    }
    public function add()
    {
        $categoryTypes = CategoryType::all();
        return view("admin.categories_add", compact("categoryTypes"));
    }
    public function edit()
    {
        return view("admin.categories_edit");
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
                'image' => $imagePath,
                'show' => $data['show'] ?? 0,
                'featured' => $data['featured'] ?? 0,
                'description' => $data['description'],
                'created_at' => $data['time'],
            ]
        );
        return redirect()->route('admin.categories')->with('success', 'Category created successfully !');
    }
}
