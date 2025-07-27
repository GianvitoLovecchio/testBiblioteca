<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Copy;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
{
    public function reservation($bookId)
    {
        $book = Book::find($bookId);
        $copy = Copy::where('book_id', $book->id)
            ->where('status', 'disponibile')
            ->orderByRaw("FIELD(`condition`, 'ottimo','buono','discreto')")
            ->first();
        return view('reservation.reservation', ['book' => $book, 'copy' => $copy]);
    }


    public function store(Request $request)
    {
        $copy = Copy::findOrFail($request->copy_id);

        if ($copy->status !== 'disponibile') {
            return back()->with('error', 'La copia non è disponibile.');
        }

        $book = $copy->book;

        DB::transaction(function () use ($copy, $book) {
            $copy->status = 'prenotato';
            $copy->save();

            $book->save();
        });

        Reservation::create([
            'user_id'     => auth()->user()->id,
            'copy_id'     => $copy->id,
            'reserved_at' => now(),
        ]);

        return redirect()->route('book.index')->with('success', 'Prenotazione effettuata con successo.');
    }

    public function index()
    {
        $reservations = Reservation::with('user', 'copy.book')->orderBy('reserved_at', 'desc')->get();
        return view('reservation.index', ['reservations' => $reservations]);
    }
}
