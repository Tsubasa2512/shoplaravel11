<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view("client.home");
    }

    public function search(Request $request){
        $data = $request->all();
        return view("client.search", compact("data"));

    }


}
