<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookDetail extends Controller
{
    public function showBookDeatail($id){
        $bookdetail=Book::findOrFail($id);
        $categorys = Category::all();
        return view('frontend.bookdetail',compact(['bookdetail', 'categorys']));
    }
}
