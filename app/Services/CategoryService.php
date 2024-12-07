<?php

namespace App\Services;

use App\Repositories\CategoryRepository;
use App\Services\BaseServiceInterface;
use App\Helpers\SlugHelper;
use App\Helpers\UploadHelper;

class CategoryService implements BaseServiceInterface
{

    protected $categoryRepository;
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }
    public function getAll()
    {
        return $this->categoryRepository->all();
    }
    public function findById($id)
    {
        return $this->categoryRepository->findById($id);
    }
    public function uploadImage($file, $slug)
    {
        return UploadHelper::upload($file, 'uploads/categories', $slug);
    }
    public function create(array $data, $request = null)
    {
        $data['slug'] = $data['slug'] ?? SlugHelper::generateSlug($data['name'], 'categories');

        if ($request && $request->hasFile('image')) {
            $data['image'] = $this->uploadImage($request->file('image'), $data['slug']);
        }
        $data['show'] = $data['show'] ?? 0;
        $data['featured'] = $data['featured'] ?? 0;
        $data['index_menu'] = $data['index_menu'] ?? 0;
        return $this->categoryRepository->create($data);
    }
    public function update($id, array $data, $request = null)
    {
        $data['show'] = $request->has('show') ? 1 : 0;
        $data['featured'] = $request->has('featured') ? 1 : 0;
        $category = $this->categoryRepository->findById($id);
        if ($category) {
            $category->name = $data["name"];
            $category->slug = $data["slug"];
            $category->type_id = $data["type_id"];
            $category->index_menu = $data["index_menu"];
            $category->description = $data["description"];
            $category->show = $data["show"];
            $category->featured = $data["featured"];

            if ($request->hasFile("image") || (isset($data['no_image']) && $data['no_image'] == 'on')) {
                if ($category->image) {
                    $oldImagePath = public_path('storage/' . $category->image);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                    $category->image = null;
                }
                if ($request->hasFile('image')) {
                    $imagePath = $this->uploadImage($request->file('image'), $data['slug']);
                    $category->image = $imagePath;
                }
            }
            return $category->save($data);
        }
        return;
    }
    public function delete($id)
    {
        $category = $this->categoryRepository->findById($id);
        if ($category) {
            return $category->delete();
        }
        return;
    }
    public function getAllCategoryType()
    {
        return $this->categoryRepository->getAllCategoryType();
    }

    public function getCategoryAddIndexMenu()
    {
        $maxIndex = $this->categoryRepository->getMaxIndexMenu();
        $nextIndex = $maxIndex ? $maxIndex + 1 : 1;
        return $nextIndex;
    }

    public function validateData($id, $request)
    {
        return $request->validate([
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
    }
}
