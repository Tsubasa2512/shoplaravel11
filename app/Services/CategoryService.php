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
        if ($request && $request->hasFile("image")) {
            if (isset($data['image']) && $data['image']) {
                if (!empty($request['image_old'])) {
                    $oldImagePath = public_path('storage/' .   $request['image_old']);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }
            }
            $data['image'] = $this->uploadImage($request->file('image'), $data['slug']);
        }
        return $this->categoryRepository->update($id, $data);
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
