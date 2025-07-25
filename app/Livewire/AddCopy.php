<?php

namespace App\Livewire;

use App\Models\Book;
use App\Models\Copy;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;

class AddCopy extends Component
{
    public $books;
    #[Validate('required', message: 'Selezionare un libro')]
    public $book_id;
    public $barcode;
    #[Validate('required', message: 'Selezionare la condizione del libro')]
    public $condition;
    #[Validate('min:8', message: 'Testo troppo corto')]
    #[Validate('max:150', message: 'Testo troppo lungo')]
    #[Validate('nullable')]
    public $notes;

    public function generateUniqueBarcode(): string
    {
        do {
            $barcode = strtoupper(Str::random(12));
        } while (Copy::where('barcode', $barcode)->exists());

        return $barcode;
    }

    public function mount()
    {
        // $this->books = Book::all();
        $this->barcode = $this->generateUniqueBarcode();

    }

    public function store()
    {
        $this->validate();

        Copy::create([
            'book_id' => $this->book_id,
            'barcode' => $this->barcode,
            'condition' => $this->condition,
            'status' => 'disponibile', // O un valore di default, se richiesto
            'notes' => $this->notes ? $this->notes : null,
        ]);

        Book::find($this->book_id)->increment('available_copies');

        $this->reset();
        redirect()->route('copy.add')->with('success', 'Copia aggiunta con successo!');
    }
    public function render()
    {
        $this->books = Book::all();
        return view('livewire.add-copy');
    }
}
