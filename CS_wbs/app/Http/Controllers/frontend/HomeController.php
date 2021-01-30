<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;

class HomeController extends Controller
{
    public function showHome()
    {
        $books = Book::paginate(4);
        return view('frontend.index', compact('books'));
    }
}
