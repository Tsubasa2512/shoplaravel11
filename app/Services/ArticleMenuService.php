<?php

namespace App\Services;

use App\Helpers\UploadHelper;
use App\Repositories\ArticleMenuRepository;
use App\Helpers\SlugHelper;

class ArticleMenuService implements BaseServiceInterface
{

    protected $articleMenuRepository;

    public function __construct(ArticleMenuRepository $articleMenuRepository)
    {
        $this->articleMenuRepository = $articleMenuRepository;
    }
    public function getAll()
    {
        return $this->articleMenuRepository->all();
    }
    public function findById($id)
    {
        return $this->articleMenuRepository->findById($id);
    }
    public function uploadImage($file, $slug)
    {
        return UploadHelper::upload($file, 'uploads/article_menu', $slug);
    }

    public function create(array $data, $request = null)
    {
        $data['slug'] = $data['slug'] ?? SlugHelper::generateSlug($data['name'], 'article_menus');

        if ($request && $request->hasFile('image')) {
            $data['image'] = $this->uploadImage($request->file('image'), $data['slug']);
        }
        $data['parent_id'] = $data['parent_id'] == 0  ? null : $data['parent_id'];
        $data['show'] = $data['show'] ?? 0;
        $data['featured'] = $data['featured'] ?? 0;
        $data['index_menu'] = $data['index_menu'] ?? 0;
        return $this->articleMenuRepository->create($data);
    }
    public function update($id, array $data, $request = null)
    {

        $articleMenu = $this->articleMenuRepository->findById($id);
        if (empty($data['parent_id'])) {
            $data['parent_id'] = $request->parent_id;
        }
        $data['parent_id'] = $data['parent_id'] == 0  ? null : $data['parent_id'];
        $data['show'] = $data['show'] ?? 0;
        $data['featured'] = $data['featured'] ?? 0;
        $data['index_menu'] = $data['index_menu'] ?? 0;
        if ($articleMenu) {
            $articleMenu->name = $data["name"];
            $articleMenu->slug = $data["slug"];
            $articleMenu->category_id = $data["category_id"];
            $articleMenu->index_menu = $data["index_menu"];
            $articleMenu->parent_id = $data["parent_id"];
            $articleMenu->description = $data["description"];
            $articleMenu->show = $data["show"];
            $articleMenu->featured = $data["featured"];

            if ($request->hasFile("image") || (isset($data['no_image']) && $data['no_image'] == 'on')) {
                if ($articleMenu->image) {
                    $oldImagePath = public_path('storage/' . $articleMenu->image);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                    $articleMenu->image = null;
                }
                if ($request->hasFile('image')) {
                    $imagePath = $this->uploadImage($request->file('image'), $data['slug']);
                    $articleMenu->image = $imagePath;
                }
            }
            return $articleMenu->save($data);
        }
        return;
    }

    public function delete($id)
    {
        return $this->articleMenuRepository->delete($id);
        // $articleMenu = $this->articleMenuRepository->delete($id);
        // if ($articleMenu) {
        //     return $articleMenu->delete();
        // }
        // return;
    }

    public function getCategory()
    {
        return $this->articleMenuRepository->getCategory();
    }

    public function getArticleMenuIndexMenu()
    {
        $maxIndex = $this->articleMenuRepository->getMaxIndexMenu();
        $nextIndex = $maxIndex ? $maxIndex + 1 : 1;
        return $nextIndex;
    }
    public function getHierarchicalMenus()
    {
        return $this->articleMenuRepository->getHierarchicalMenus();
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
