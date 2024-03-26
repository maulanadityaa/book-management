<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $books = DB::table('books')
            ->join('authors', 'books.author_id', '=', 'authors.id')
            ->join('publishers', 'books.publisher_id', '=', 'publishers.id')
            ->select('books.id', 'books.title', 'books.year', 'books.isbn', 'authors.author_name', 'publishers.publisher_name')
            ->get();
        return redirect()->route('books.index', compact('books'));
    }
}
