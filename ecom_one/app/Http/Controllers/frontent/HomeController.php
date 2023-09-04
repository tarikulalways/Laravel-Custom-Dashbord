<?php

namespace App\Http\Controllers\frontent;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    // hom contoler
    public function index(){
        // category
        $categoris = Category::where('is_active', 1)->select(['id', 'name', 'cat_img'])->get();

        return view('frontend.pages.home', compact('categoris'));
    }
}
