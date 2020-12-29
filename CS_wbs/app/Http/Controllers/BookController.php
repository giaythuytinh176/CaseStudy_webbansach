<?php

namespace App\Http\Controllers;

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
        return view("backend.book.list", compact(['books']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('backend.book.create', compact(['categories']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $imageName = time() . '.' . $request->img->getClientOriginalExtension();
            $request->img->move(public_path('images'), $imageName);
        }
        catch (\Exception $e) {
            if (file_exists(public_path('images').$imageName)) unlink(public_path('images').$imageName);
            return back()->with('error', 'Your must upload image file.');
        }
        $book = new Book();
        try {
            $book->fill($request->all());
            $book->img = $imageName;
            $book->save();
        }
        catch (\Exception $e) {
            if (file_exists(public_path('images').$imageName)) unlink(public_path('images').$imageName);
            //return back()->with('error', $e->getMessage());
            return back()->with('error', 'There are problem when you add this book.');
        }
        return redirect()->route('book.list');
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
        return view("backend.book.book_detail", compact(['book_detail']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Book $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Book $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Book $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        //
    }
}
