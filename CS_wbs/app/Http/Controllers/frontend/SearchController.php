<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
<<<<<<< HEAD
use App\Models\Author;
use App\Models\Book;
=======
>>>>>>> 3e355a71d215ea416b5b3bfb188ede0d1a690b68
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
<<<<<<< HEAD
public function search(Request $request){
    $search=$request->search_frontend;
    $books=DB::table('books')->where('name','LIKE', "%$search%")->get();
    $categorys=Category::all();
    $authors = Author::all();
    return view("frontend.search", compact(['books', 'categorys', 'authors']));
}
=======
    public function search(Request $request)
    {
        $search = $request->title;
        $data = DB::table('books')
            ->join('categories', 'books.category_id', '=', 'categories.id')
            ->select('books.id as booksid', 'books.name as BooksName', 'categories.name as CategoriesName', 'books.price', 'books.img', 'books.description')
            ->where('books.name', 'LIKE', "%$search%")
            ->orWhere('categories.name', 'LIKE', "%$search%")
            ->orWhere('books.description', 'LIKE', "%$search%")
            ->orWhere('books.price', 'LIKE', "%$search%")
            ->get();
        return view('frontend.search', compact(['search', 'data']));
    }
>>>>>>> 3e355a71d215ea416b5b3bfb188ede0d1a690b68
}
