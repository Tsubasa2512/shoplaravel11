<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(){
        return view("admin.article");
    }
    public function add(){
        return view("admin.article_add");
    }
}
