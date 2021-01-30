<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function showCategory(Category $category, Request $request)
    {
        $category_detail = Category::findOrFail($request->id);
        return view('frontend.showCategory', compact('category_detail'  ));
    }
}
