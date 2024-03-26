<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Publisher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function index()
    {
        // $books = Book::join('authors', 'books.author_id', '=', 'authors.id')->join('publishers', 'publishers.id', '=', 'books.publisher_id');
        $books = DB::table('books')
            ->join('authors', 'books.author_id', '=', 'authors.id')
            ->join('publishers', 'books.publisher_id', '=', 'publishers.id')
            ->select('books.id', 'books.title', 'books.year', 'books.isbn', 'authors.author_name', 'publishers.publisher_name')
            ->get();
        // dd($books);
        return view('home', compact('books'));
    }

    public function create()
    {
        $authors = Author::all();
        $publishers = Publisher::all();
        return view('books.create', compact('authors', 'publishers'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'title' => 'required',
            'author_id' => 'required',
            'publisher_id' => 'required',
            'year' => 'required',
            'isbn' => 'required'
        ]);

        Book::create([
            'title'     => $request->title,
            'author_id'   => $request->author_id,
            'publisher_id' => $request->publisher_id,
            'year' => $request->year,
            'isbn' => $request->isbn
        ]);

        return redirect()->route('books.index')->with('success', 'Book has been created successfully.');
    }

    public function show(Book $book)
    {
        return view('show', compact('book'));
    }

    public function edit(Book $book)
    {
        $authors = Author::all();
        $publishers = Publisher::all();
        return view('books.edit', compact('book', 'authors', 'publishers'));
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required',
            'author_id' => 'required',
            'publisher_id' => 'required',
            'year' => 'required',
            'isbn' => 'required'
        ]);

        if ($request->hasFile('cover')) {

            //upload new cover
            $cover = $request->file('cover');
            $cover->storeAs('public/books/cover', $cover->hashName());

            //delete old cover
            Storage::delete('public/books/cover' . $book->cover);

            //update book with new cover
            $book->update([
                'cover'     => $cover->hashName(),
                'title'     => $request->title,
                'author_id'   => $request->author_id,
                'publisher_id' => $request->publisher_id,
                'year' => $request->year,
                'isbn' => $request->isbn
            ]);
        } else {

            //update book without image
            $book->update([
                'title'     => $request->title,
                'author_id'   => $request->author_id,
                'publisher_id' => $request->publisher_id,
                'year' => $request->year,
                'isbn' => $request->isbn
            ]);
        }

        $book->fill($request->post())->save();

        return redirect()->route('books.index')->with('success', 'Book Has Been updated successfully');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Book has been deleted successfully');
    }
}
