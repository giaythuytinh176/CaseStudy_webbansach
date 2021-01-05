<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function showlist(){
    $books=Book::all();
    return view('frontend.index',compact('books'));
    }
}
