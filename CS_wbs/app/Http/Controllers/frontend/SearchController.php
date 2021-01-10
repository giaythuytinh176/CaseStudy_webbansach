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
public function search(Request $request){
    $search=$request->search_frontend;
    $books=DB::table('books')->where('name','LIKE', "%$search%")->get();
    $categorys=Category::all();
    $authors = Author::all();
    return view("frontend.search", compact(['books', 'categorys', 'authors']));
}
}
