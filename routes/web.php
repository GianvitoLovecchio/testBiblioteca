<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CopyController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PublicController;

Route::get('/', [PublicController::class, 'homepage'])->name('homepage');

Route::get('/user/profile', [UserController::class, 'profile'])->name('user.profile')->middleware('auth');

//rotta alla vista per la creazione di un libro
Route::get('book/create', [BookController::class, 'create'])->name('book.create')->middleware('auth', 'admin');
//rotta per il catalogo dei libri
Route::get('book/index', [BookController::class, 'index'])->name('book.index');
//rotta per dettaglio libro
Route::get('book/{book}', [BookController::class, 'show'])->name('book.show');

//rotta visualizzazione aggiunta copie
Route::get('copy/add', [CopyController::class, 'addCopy'])->name('copy.add')->middleware('auth', 'admin');
// rotta invio copie
Route::post('copy/store', [CopyController::class, 'store'])->name('book.storeCopy')->middleware('auth', 'admin');