<?php

namespace App\Services;

use App\Repositories\CategoryRepository;
use App\Services\BaseServiceInterface;

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

    public function create(array $data)
    {
        return $this->categoryRepository->create($data);
    }
    public function update($id, array $data, $request = null)
    {
        $category = $this->categoryRepository->findById($id);
        if ($category) {
            $category->name_en = $data["name"];
            $category->name_vi = $data["name"];
            $category->slug = $data["slug"];
            $category->type_id = $data["type_id"];
            $category->index_menu = $data["index_menu"];
            $category->description = $data["description"];
            $category->show = isset($data["show"]) ? 1 : 0;
            $category->featured = isset($data["featured"]) ? 1 : 0;

            if ($request->hasFile("image") || (isset($data['no_image']) && $data['no_image'] == 'on')) {
                if ($category->image) {
                    $oldImagePath = public_path('storage/' . $category->image);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                    $category->image = null;
                }
                if ($request->hasFile('image')) {
                    $imagePath = $this->categoryRepository->uploadImage($request->file('image'), $data['slug']);

                    $category->image = $imagePath;
                }
            }
            // dd($category);
            return $category->update($data);
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
}
