<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Copy;
use Illuminate\Http\Request;

class CopyController extends Controller
{
    public function addCopy()
    {
        $books = Book::all()->sortBy('title');   
        return view('copy.add', compact('books'));
        // return view('copy.add');
    }
    public function selectedCopy($copyId)
    {
        $copy = Copy::findOrFail($copyId);
        $book = $copy->book;
        return view('reservation.reservation', ['copy' => $copy, 'book' => $book]);
    }

    public function index()
    {
        return view('copy.index');
    }

}
