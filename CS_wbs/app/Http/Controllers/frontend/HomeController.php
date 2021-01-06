<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function showHome()
    {
        $books = Book::all();
        $authors = Author::all();
        $categorys = Category::all();
        return view('frontend.index',compact('books','authors','categorys'));
    }
}
