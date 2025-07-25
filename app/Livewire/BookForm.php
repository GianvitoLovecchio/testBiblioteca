<?php

namespace App\Livewire;

use App\Models\Book;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Log;

class BookForm extends Component
{
    use WithFileUploads;
    public $book;

    #[Validate('required', message: 'Il titolo è obbligatorio')]
    #[Validate('min:3', message: 'Il titolo deve avere almeno 3 caratteri')]
    #[Validate('max:100', message: 'Il titolo non può superare i 100 caratteri')]
    public $title;

    #[Validate('required', message: 'L\'autore è obbligatorio')]
    #[Validate('min:3', message: 'L\'autore deve avere almeno 3 caratteri')]
    #[Validate('max:100', message: 'L\'autore non può superare i 100 caratteri')]
    public $author;

    #[Validate('required', message: 'Il codice ISBN è obbligatorio')]
    #[Validate('size:13', message: 'Il codice ISBN deve essere di 13 caratteri')]
    public $isbn;

    #[Validate('required', message: 'La categoria è obbligatoria')]
    public $category_id;

    #[Validate('required', message: 'La descrizione è obbligatoria')]
    #[Validate('min:10', message: 'La descrizione deve avere almeno 10 caratteri')]
    #[Validate('max:500', message: 'La descrizione non può superare i 500 caratteri')]
    public $description;

    #[Validate('image', message: 'Il file deve essere un\'immagine')]
    #[Validate('max:2048', message: 'L\'immagine non può superare 2MB')]
    public $cover_image;

    #[Validate('date', message: 'La data di pubblicazione deve essere una data valida')]
    #[Validate('required', message: 'La data di pubblicazione è obbligatoria')]
    #[Validate('before_or_equal:today', message: 'La data di pubblicazione non può essere futura')]
    public $published_at;
    public $path;



    public function store()
    {
        $this->validate();
        $path = null;
        //genera il nome dell'immagine "cover_image_titolo_del_libro.estensione" e la salva nella cartella covers in public
        if ($this->cover_image) {
            $filename = 'cover_image_' . Str::slug($this->title) . '.' . $this->cover_image->getClientOriginalExtension();
            $path = $this->cover_image->storeAs(Str::slug($this->title), $filename, 'public');
        } else {
            $path = null;
        }
        $this->book = Book::create([
            'title' => $this->title,
            'author' => $this->author,
            'isbn' => $this->isbn,
            'category_id' => $this->category_id,
            'description' => $this->description,
            'cover_image' => $path,
            'published_at' => $this->published_at,
        ]);

        return redirect()->route('homepage')->with('success', 'Libro aggiunto con successo!');
    }

    public function updated($property)
    {
        $this->validateOnly($property);
    }


    public function render()
    {
        return view('livewire.book-form');
    }
}
