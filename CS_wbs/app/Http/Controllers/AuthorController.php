<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequest_Author;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $author = Author::all();
        return view('backend.author.list', compact('author'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.author.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormRequest_Author $request, Author $author)
    {
        if ($request->hasFile('image')) {
            try {
                $imageName = time() . '.' . $request->image->getClientOriginalExtension();
                $request->image->move(public_path('images'), $imageName);
            } catch (\Exception $e) {
                if (file_exists(public_path('images') . "/" . $imageName)) {
                    unlink(public_path('images') . "/" . $imageName);
                }
                return back()->with('error', 'Your must upload image file.');
            }
            $author->fill($request->all());
            $author->image = $imageName;
            $author->save();
            return redirect()->route('author.list');
        }
        return back()->with('error', 'You must select image file to upload.');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Author $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author, Request $request)
    {
        $author = Author::findOrFail($request->id);
        return view("backend.author.detail", compact(['author']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Author $author
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author, Request $request)
    {
        $author = Author::findOrFail($request->id);
        return view('backend.author.edit', compact('author'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Author $author
     * @return \Illuminate\Http\Response
     */
    public function update(FormRequest_Author $request, Author $author)
    {
        $author = $author::findOrFail($request->id);
        $author->fill($request->all());
        if (!$request->hasFile('image') && file_exists(public_path('images') . "/" . $request->imgName)) {
            $author->image = $request->imgName;
        } else {
            if (file_exists(public_path('images') . "/" . $request->imgName)) {
                unlink(public_path('images') . "/" . $request->imgName);
            }
            $imageName = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('images'), $imageName);
            $author->image = $imageName;
        }
        $author->save();
        return redirect()->route('author.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Author $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author, Request $request)
    {
        $author = Author::findOrFail($request->id);
        $author->delete();
        return redirect()->route('author.list');
    }
}
