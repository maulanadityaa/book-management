<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::all();
        return view('authors.index', compact('authors'));
    }

    public function create()
    {
        return view('authors.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'author' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);

        Author::create([
            'author_name'     => $request->author,
            'email'   => $request->email,
            'phone' => $request->phone
        ]);

        return redirect()->route('authors.index')->with('success', 'Author has been created successfully.');
    }

    public function show(Author $author)
    {
        return view('show', compact('author'));
    }

    public function edit(Author $author)
    {
        return view('authors.edit', compact('author'));
    }

    public function update(Request $request, Author $author)
    {
        $request->validate([
            'author' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);

        $author->update([
            'author_name'     => $request->author,
            'email'   => $request->email,
            'phone' => $request->phone
        ]);

        $author->fill($request->post())->save();

        return redirect()->route('authors.index')->with('success', 'Author Has Been updated successfully');
    }

    public function destroy(Author $author)
    {
        $author->delete();
        return redirect()->route('authors.index')->with('success', 'Author has been deleted successfully');
    }
}
