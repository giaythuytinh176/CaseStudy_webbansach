<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;

class BookDetail extends Controller
{
    public function showBookDeatail($id)
    {
        $bookdetail = Book::findOrFail($id);
        return view('frontend.bookdetail', compact(['bookdetail']));
    }
}

