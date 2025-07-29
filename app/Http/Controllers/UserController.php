<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
    
    public function register()
    {
        return view('auth.register');
    }

    public function index()
    {
        $users = User::all()->where('is_admin', false);
        return view('auth.index', compact('users'));
    }
}
