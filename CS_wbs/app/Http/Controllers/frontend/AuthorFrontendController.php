<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Category;
use Illuminate\Http\Request;

class AuthorFrontendController extends Controller
{
    public function showAuthor()
    {
        $authors = Author::all();
        $categorys = Category::all();
        return view('frontend.author',compact('authors','categorys'));
    }
}
