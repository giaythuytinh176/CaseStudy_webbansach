<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryFrontendController extends Controller
{
    public function showCategory()
    {
        $categorys = Category::all();
        return view('frontend.header',compact('categorys'));
    }
}
