<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Copy;
use App\Models\Book;
use App\Models\User;
use App\Models\Reservation; // o Booking, a seconda di come si chiama
use Illuminate\Support\Str;

class CopySeeder extends Seeder
{
    public function run(): void
    {
        $books = Book::all();
        $users = User::where('is_admin', false)->get(); // recupera i 3 utenti
        $conditions = ['ottimo', 'buono', 'discreto'];
        $statuses = ['disponibile', 'prenotato'];

        foreach ($books as $book) {
            foreach ($statuses as $status) {
                $copy = Copy::create([
                    'book_id' => $book->id,
                    'barcode' => Str::upper(Str::random(10)),
                    'condition' => $conditions[array_rand($conditions)],
                    'status' => $status,
                    'notes' => fake()->boolean(50) ? fake()->sentence() : null,
                ]);

                if ($status === 'prenotato') {
                    // assegna una prenotazione a un utente casuale tra i 3
                    $user = $users->random();

                    Reservation::create([
                        'copy_id' => $copy->id,
                        'user_id' => $user->id,
                        'reserved_at' => now(), // o una data casuale
                        // altri campi prenotazione se necessari
                    ]);
                }
            }
        }
    }
}
