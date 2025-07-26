<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function create()
    {
        return view('book.create');
    }
    public function index()
    {
        $books = Book::all();
        return view('book.index', compact('books'));

    }
    public function show(Book $book)
    {
        return view('book.show', compact('book'));
    }

}
