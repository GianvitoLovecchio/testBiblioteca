<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function homepage()
    {
        return view('homepage');
    }

    public function search()
    {
        return view('search');
    }

    public function searchFilters()
    {
        return view('searchFilters');
    }
}
