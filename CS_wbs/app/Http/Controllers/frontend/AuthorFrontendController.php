<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorFrontendController extends Controller
{
    public function showAuthor()
    {
        $authors = Author::all();
        return view('frontend.author',compact('authors'));
    }
}
