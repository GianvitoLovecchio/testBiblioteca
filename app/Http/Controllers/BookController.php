<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Livewire\WithPagination;

class BookController extends Controller
{
     use WithPagination;
    protected $paginationTheme = 'tailwind';
    
    public function create()
    {
        return view('book.create');
    }
    public function index()
    {
        $books = Book::paginate(8);
        return view('book.index', compact('books'));

    }
    public function show(Book $book)
    {
        return view('book.show', compact('book'));
    }

}
