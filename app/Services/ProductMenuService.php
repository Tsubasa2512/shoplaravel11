<?php

namespace App\Services;

use App\Helpers\UploadHelper;
use App\Helpers\SlugHelper;
use App\Repositories\ProductMenuRepository;

class ProductMenuService implements BaseServiceInterface
{
    protected  $productMenuRepository;

    public function __construct(ProductMenuRepository $productMenuRepository)
    {
        $this->productMenuRepository = $productMenuRepository;
    }

    public function getAll()
    {
        return $this->productMenuRepository->all();
    }

    public function findById($id)
    {
        return $this->productMenuRepository->findById($id);
    }

    public function uploadImage($file, $slug)
    {
        return UploadHelper::upload($file, 'uploads/product_menu', $slug);
    }

    public function create(array $data, $request = null)
    {
        $data['slug'] = $data['slug'] ?? SlugHelper::generateSlug($data['name'], 'product_menus');
        if ($request && $request->hasFile('image')) {
            $data['image'] = $this->uploadImage($request->file('image'), $data['slug']);
        }

        $data['parent_id'] = $data['parent_id'] == 0  ? null : $data['parent_id'];
        $data['show'] = $data['show'] ?? 0;
        $data['featured'] = $data['featured'] ?? 0;
        $data['index_menu'] = $data['index_menu'] ?? 0;
        return $this->productMenuRepository->create($data);
    }
    public function update($id, array $data, $request = null)
    {
        $productMenu = $this->productMenuRepository->findById($id);

        if (empty($data['parent_id'])) {
            $data['parent_id'] = $request->parent_id;
        }
        $data['parent_id'] = $data['parent_id'] == 0  ? null : $data['parent_id'];
        $data['show'] = $data['show'] ?? 0;
        $data['featured'] = $data['featured'] ?? 0;
        $data['index_menu'] = $data['index_menu'] ?? 0;
        if ($request->hasFile("image") || (isset($data['no_image']) && $data['no_image'] == 'on')) {
            $oldImagePath = public_path('storage/' . $productMenu->image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }
        if ($request->hasFile('image')) {
            $imagePath = $this->uploadImage($request->file('image'), $data['slug']);
            $data['image'] = $imagePath;
        }
        return $this->productMenuRepository->update($id, $data);
    }


    public function delete($id)
    {
        return $this->productMenuRepository->delete($id);
    }
    public function getCategory()
    {
        return $this->productMenuRepository->getCategory();
    }

    public function getProductMenuIndexMenu()
    {
        $maxIndex = $this->productMenuRepository->getMaxIndexMenu();
        $nextIndex = $maxIndex ? $maxIndex + 1 : 1;
        return $nextIndex;
    }
    public function getHierarchicalMenus()
    {
        return $this->productMenuRepository->getHierarchicalMenus();
    }

    public function validateData($id, $request)
    {
        return $request->validate([
            "name" => "required|string|max:255",
            "slug" => "required|string|max:255|unique:categories,slug," . $id,
            "category_id" => "required|exists:categories,id",
            "parent_id' => 'nullable|integer|min:0|exists:article_menus,id|not_in:0",
            "index_menu" => "required|integer",
            "description" => "nullable|string",
            "show" => "nullable|boolean",
            "featured" => "nullable|boolean",
            "image" => "nullable|image",
            "no_image" => "nullable|string",
        ]);
    }
}
