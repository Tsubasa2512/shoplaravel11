<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\NewsletterController;
use App\Http\Controllers\Admin\GeneralInformationController;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Middleware\admin\BreadcrumbsMiddleware;

use App\Http\Controllers\Admin\CategoriesController;
use app\Http\Middleware\CheckLoginAdmin;

Route::get('/', function () {
    return view('welcome');
});

//Admin Route
Route::prefix('admin')
    ->middleware([BreadcrumbsMiddleware::class,
    // CheckLoginAdmin::class
    ])
    ->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('/article', [ArticleController::class, 'index'])->name('admin.article');
        Route::get('/article/add', [ArticleController::class, 'add'])->name('admin.article.add');
        Route::get('/categories', [CategoriesController::class,'index'])->name('admin.categories');
        Route::get('/categories/add', [CategoriesController::class,'add'])->name('admin.categories.add');
        Route::post('/categories/add', [CategoriesController::class,'createCategory']);
        Route::get('/categories/edit', [CategoriesController::class,'edit'])->name('admin.edit');
        Route::get('/product', [ProductController::class, 'index'])->name('admin.product');
        Route::get('/gallery', [GalleryController::class, 'index'])->name('admin.gallery');
        Route::get('/order', [OrderController::class, 'index'])->name('admin.order');
        Route::get('/newsletter', [NewsletterController::class, 'index'])->name('admin.newsletter');
        Route::get('/gerenal-information', [GeneralInformationController::class, 'index'])->name('admin.general-information');
        Route::get('/user-management',[UserManagementController::class,'index'])->name('admin.user-management');
    });
