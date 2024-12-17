<?php

namespace App\Services;

use App\Helpers\SlugHelper;
use App\Helpers\UploadHelper;
use App\Repositories\ProductRepository;

class ProductService implements BaseServiceInterface
{

    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }
    public function getAll()
    {
        return $this->productRepository->all();
    }
    public function findById($id)
    {
        return $this->productRepository->findById($id);
    }

    public function uploadImage($file, $slug)
    {
        return UploadHelper::upload($file, 'uploads/product', $slug);
    }

    public function create(array $data, $request = null)
    {
        $data['price'] = !empty($data['price']) ? (int) str_replace('.', '', $data['price']) : 0;
        $data['sale_price'] = !empty($data['sale_price']) ? (int) str_replace('.', '', $data['sale_price']) : 0;
        $data['slug'] = $data['slug'] ?? SlugHelper::generateSlug($data['name'], 'products');
        if ($request && $request->hasFile('image')) {
            $data['image'] = $this->uploadImage($request->file('image'), slug: $data['slug']);
        }
        $data['show'] = $data['show'] ?? 0;
        $data['featured'] = $data['featured'] ?? 0;
        return $this->productRepository->create($data);
    }

    public function update($id, array $data, $request = null)
    {
        $data['show'] = $request->has('show') ? 1 : 0;
        $data['featured'] = $request->has('featured') ? 1 : 0;
        if ($request && $request->hasFile("image")) {
            if (!empty($request['image_old'])) {
                $oldImagePath = public_path('storage/' .   $request['image_old']);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            $data['image'] = $this->uploadImage($request->file('image'), $data['slug']);
        }
        return $this->productRepository->update($id, $data);
    }
    public function productMenu($menu_id = null)
    {
        return $this->productRepository->getProductMenu();
    }
    public function delete($id)
    {
        return $this->productRepository->delete($id);
    }
    public function getTourType()
    {
        return $this->productRepository->getTourType();
    }
    public function getDuration()
    {
        return $this->productRepository->getDuration();
    }
    public function getLocation()
    {
        return $this->productRepository->getLocation();
    }
}
