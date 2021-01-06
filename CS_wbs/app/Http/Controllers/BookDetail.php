<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookDetail extends Controller
{
    public function showBookDeatail(){
        $bookdetail=Book::all();
        return view('frontend.bookdetail',compact(['bookdetail']));
    }
}
