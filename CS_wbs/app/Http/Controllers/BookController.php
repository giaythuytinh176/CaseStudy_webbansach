<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequest_Book;
use App\Http\Requests\FormRequest_EditBook;
use App\Models\Author;
use App\Models\AuthorBook;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        $categories = Category::all();
        $authors = Author::all();
        return view("backend.book.list", compact(['books', 'categories', 'authors']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $authors = Author::all();
        return view('backend.book.create', compact(['categories', 'authors']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormRequest_Book $request, Book $book)
    {
        if ($request->hasFile('img')) {
            try {
                $imageName = time() . '.' . $request->img->getClientOriginalExtension();
                $request->img->move(public_path('images'), $imageName);
            } catch (\Exception $e) {
                if (file_exists(public_path('images') . "/" . $imageName)) {
                    unlink(public_path('images') . "/" . $imageName);
                }
                //return back()->with('error', 'Your must upload image file.');
            }
            try {
                $book->fill($request->all());
                $book->img = $imageName;
                $book->save();

                $last_inserrt_book_id = $book->id;
                foreach ($request->author as $auths) {
                    $AuthorBook = new AuthorBook();
                    $AuthorBook->author_id = $auths;
                    $AuthorBook->book_id = $last_inserrt_book_id;
                    $AuthorBook->save();
                }

            } catch (\Exception $e) {
                if (file_exists(public_path('images') . "/" . $imageName)) {
                    unlink(public_path('images') . "/" . $imageName);
                }
                //return back()->with('error', $e->getMessage());
                //return back()->with('error', 'There are problems when you are adding this book.');
            }
            return redirect()->route('book.list');
        }
        return back()->with('error', 'You must select image file to upload.');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Book $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book, Request $request)
    {
        $book_detail = Book::findOrFail($request->id);
        $category_detail = Category::findOrFail($book_detail->category_id);
        return view("backend.book.detail", compact(['book_detail', 'category_detail']));
    }

    public function showListBookFromCategory(Book $book, Category $category, Request $request)
    {
        $book_detail = Book::findOrFail($request->id);
        $category_detail = Category::findOrFail($book_detail->category_id);
        return view("backend.book.detail", compact(['book_detail', 'category_detail']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Book $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book, $id)
    {
        $authors = Author::all();
        $book_detail = Book::findOrFail($id);
        $category_detail = Category::findOrFail($book_detail->category_id);
        $categories = Category::all();
        return view("backend.book.edit", compact(['book_detail', 'category_detail', 'categories', 'authors']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Book $book
     * @return \Illuminate\Http\Response
     */
    public function update(FormRequest_EditBook $request, Book $book)
    {
        $book = Book::findOrFail($request->id);
        $book->fill($request->all());
        if (!$request->hasFile('img') && file_exists(public_path('images') . "/" . $request->imgName)) {
            $book->img = $request->imgName;
        } else {
            if (file_exists(public_path('images') . "/" . $request->imgName)) {
                unlink(public_path('images') . "/" . $request->imgName);
            }
            $imageName = time() . '.' . $request->img->getClientOriginalExtension();
            $request->img->move(public_path('images'), $imageName);
            $book->img = $imageName;
        }
        $book->save();

//        dd($book->authors()->get()->toArray());
//
//        foreach ($request->author as $auth) {
//            $book = Book::find($request->id);
//            $book->authors()->attach($auth);
//        }

        return redirect()->route('book.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Book $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book, Request $request)
    {
        $book = $book::findOrFail($request->id);
        if (file_exists(public_path('images') . "/" . $book->img)) {
            unlink(public_path('images') . "/" . $book->img);
        }
        $book->delete();
        return redirect()->route('book.list');
    }
}
