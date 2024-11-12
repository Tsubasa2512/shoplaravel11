<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index(){
        return view("admin.categories");
    }
    public function add(){
        return view("admin.categories_add");
    }
    public function edit(){
        return view("admin.categories_edit");
    }
}
