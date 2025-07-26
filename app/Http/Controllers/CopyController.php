<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class CopyController extends Controller
{
    public function addCopy()
    {
        $books = Book::all()->sortBy('title');   
        return view('copy.add', compact('books'));
        // return view('copy.add');
    }

    public function index()
    {
        return view('copy.index');
    }

}
