<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\ArticleMenuController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\NewsletterController;
use App\Http\Controllers\Admin\GeneralInformationController;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Middleware\Admin\BreadcrumbsMiddleware;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\ProductMenuController;
// -----------------
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\ProductClientController;
use app\Http\Middleware\CheckLoginAdmin;
//--------------------
Route::get('/', [HomeController::class, 'index'])->name('client.home');
Route::get('/product', [ProductClientController::class, 'index'])->name('client.product');
Route::get('/search', [HomeController::class, 'search'])->name('client.search');

//Admin Route
Route::prefix('admin')
    ->middleware([
        BreadcrumbsMiddleware::class,
        // CheckLoginAdmin::class
    ])
    ->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');

        //------------ Categories --------------
        Route::get('/categories', [CategoriesController::class, 'index'])->name('admin.categories');
        Route::get('/categories/add', [CategoriesController::class, 'add'])->name('admin.categories.add');
        Route::post('/categories/add', [CategoriesController::class, 'createCategory']);
        Route::get('/categories/edit', [CategoriesController::class, 'edit'])->name('admin.categories.edit');
        Route::post('/categories/update/{id}', [CategoriesController::class, 'update'])->name('admin.categories.update');
        Route::delete('/categories/delete/{id}', [CategoriesController::class, 'delete'])->name('admin.categories.delete');
        //------------ Article Menu --------------
        Route::get('/article-menu', [ArticleMenuController::class, 'index'])->name('admin.article-menu');
        Route::get('/article-menu/menu-add', [ArticleMenuController::class, 'add'])->name('admin.article-menu.add');
        Route::post('/article-menu/menu-add', [ArticleMenuController::class, 'createArticleMenu']);
        Route::get('/article-menu/menu-edit', [ArticleMenuController::class, 'edit'])->name('admin.article-menu.edit');
        Route::post('/article-menu/menu-update/{id}', [ArticleMenuController::class, 'update'])->name('admin.article-menu.update');
        Route::delete('/article-menu/menu-delete/{id}', [ArticleMenuController::class, 'delete'])->name('admin.article-menu.delete');
        //------------ Article --------------
        Route::get('/article-menu/article', [ArticleController::class, 'index'])->name('admin.article');
        Route::get('/article-menu/article/add', [ArticleController::class, 'add'])->name('admin.article.add');
        //------------ Product Menu --------------
        Route::get('/product-menu', [ProductMenuController::class, 'index'])->name('admin.product-menu');
        Route::get('/product-menu/menu-add', [ProductMenuController::class, 'add'])->name('admin.product-menu.add');
        Route::post('/product-menu/menu-add', [ProductMenuController::class, 'createProductMenu']);
        Route::get('/product-menu/menu-edit', [ProductMenuController::class, 'edit'])->name('admin.product-menu.edit');
        Route::post('/product-menu/menu-update/{id}', [ProductMenuController::class, 'update'])->name('admin.product-menu.update');
        Route::delete('/product-menu/menu-delete/{id}', [ProductMenuController::class, 'delete'])->name('admin.product-menu.delete');
        //------------ Product --------------
        Route::get('/product-menu/product', [ProductController::class, 'index'])->name('admin.product');
        Route::get('/product-menu/product-add', [ProductController::class, 'create'])->name('admin.product.add');
        Route::post('/product-menu/product-add', [ProductController::class, 'createProduct']);
        Route::get('/product-menu/product-edit', [ProductController::class, 'edit'])->name('admin.product.edit');
        Route::post('/product-menu/product-edit/{id}', [ProductController::class, 'update'])->name('admin.product.update');
        Route::delete('/product-menu/product-delete/{id}', [ProductController::class, 'delete'])->name('admin.product.delete');
        //------------ Gallery --------------
        Route::get('/gallery', [GalleryController::class, 'index'])->name('admin.gallery');
        //------------ Order --------------
        Route::get('/order', [OrderController::class, 'index'])->name('admin.order');
        //------------ Newsletter --------------
        Route::get('/newsletter', [NewsletterController::class, 'index'])->name('admin.newsletter');
        //------------ Gerenal Information --------------
        Route::get('/gerenal-information', [GeneralInformationController::class, 'index'])->name('admin.general-information');
        //------------ User --------------
        Route::get('/user-management', [UserManagementController::class, 'index'])->name('admin.user-management');
        Route::get('/user-management/add', [UserManagementController::class, 'add'])->name('admin.user-management.add');
        Route::post('/user-management/add', [UserManagementController::class, 'createUser']);
        Route::get('/user-management/edit', [UserManagementController::class, 'edit'])->name('admin.user-management.edit');
        Route::post('/user-management/update/{id}', [UserManagementController::class, 'update'])->name('admin.user-management.update');
        Route::delete('/user-management/delete/{id}', [UserManagementController::class, 'delete'])->name('admin.user-management.delete');
        // Route::delete('/user-management/delete', [UserManagementController::class, 'deleteList'])->name('admin.user-management.deleteList');
    });
