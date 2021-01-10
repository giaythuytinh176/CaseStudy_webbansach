<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;

class BookDetail extends Controller
{
    public function showBookDeatail($id)
    {
        $bookdetail = Book::findOrFail($id);
        $categorys = Category::all();
        $book_images = Book::inRandomOrder()->limit(5)->get();
        return view('frontend.bookdetail', compact(['bookdetail', 'categorys', 'book_images']));
    }
}

