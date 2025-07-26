<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CopyController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ReservationController;

Route::get('/', [PublicController::class, 'homepage'])->name('homepage');

Route::get('/user/profile', [UserController::class, 'profile'])->name('user.profile')->middleware('auth');
//rotta visualizzazione utenti
Route::get('user/index', [UserController::class, 'index'])->name('user.index')->middleware('auth', 'admin');

//rotta alla vista per la creazione di un libro
Route::get('book/create', [BookController::class, 'create'])->name('book.create')->middleware('auth', 'admin');
//rotta per il catalogo dei libri
Route::get('book/index', [BookController::class, 'index'])->name('book.index');
//rotta per dettaglio libro
Route::get('book/{book}', [BookController::class, 'show'])->name('book.show');

//pagina ricerca testuale
Route::get('/search', [PublicController::class, 'search'])->name('search');
//rotta ricerca filtri
Route::get('search/filters', [PublicController::class, 'searchFilters'])->name('search.filters');

//rotta visualizzazione aggiunta copie
Route::get('copy/add', [CopyController::class, 'addCopy'])->name('copy.add')->middleware('auth', 'admin');
//rotta visualizzazione copie CON FILTRI PER UTENTI NON ADMIN
Route::get('copy/index', [CopyController::class, 'index'])->name('copy.index')->middleware('auth');

//rotta vista di prenotzzione
Route::get('copy/reservation/{book}', [ReservationController::class, 'reservation'])->name('reservation.view')->middleware('auth');
//rotta per l'invio della prenotazione
Route::post('copy/reservation/store', [ReservationController::class, 'store'])->name('reservation.store')->middleware('auth');
//rotta per mostrare tutte le prenotazioni
Route::get('reservation/index', [ReservationController::class, 'index'])->name('reservation.index')->middleware('auth', 'admin');