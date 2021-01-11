<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;

use App\Models\Author;
use App\Models\Book;


use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
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

}




