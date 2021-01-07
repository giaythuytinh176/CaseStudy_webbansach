<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class AuthorFrontendController extends Controller
{
    public function showAuthor()
    {
        $authors = Author::paginate(6);
        $categorys = Category::all();
        $book_images = Book::inRandomOrder()->limit(5)->get();
        return view('frontend.authorfrontend.author', compact('authors', 'categorys', 'book_images'));
    }

    public function showAthor(Author $author, Request $request)
    {
        $author_detail = Author::findOrFail($request->id);
        $authors = Author::all();
        $categorys = Category::all();
        $book_images = Book::inRandomOrder()->limit(5)->get();
        return view("frontend.authorfrontend.detail", compact('author_detail', 'authors', 'categorys', 'book_images'));
    }
}
