<?php

namespace App\Livewire;

use App\Models\Book;
use App\Models\Copy;
use Livewire\Component;
use Livewire\WithPagination;

class BookSearchFilter extends Component
{
    use WithPagination;

    public ?int $tempCategory = null;
    public ?int $tempYear = null;
    public ?string $tempStatus = null;

    public ?int $category = null;
    public ?int $year = null;
    public ?string $status = null;

    protected $paginationTheme = 'tailwind';

    public function applyFilters()
    {
        $this->category = $this->tempCategory;
        $this->year = $this->tempYear;
        $this->status = $this->tempStatus;

        $this->resetPage();
    }

    public function render()
    {
        // Inizializza la query caricando tutte le copie disponibili
        $query = Copy::query();

        //filtro categorie: cerca una copia che ha uno o più libri con la categoria selezionata
        if ($this->category) {
            $query->whereHas('book', function ($q) {
                $q->where('category_id', $this->category);
            });
        }

        //filtro anno: cerca una copia che ha uno o più libri pubblicati nell'anno selezionato
        if ($this->year) {
            $query->whereHas('book', function ($q) {
                $q->whereYear('published_at', $this->year);
            });
        }

        //filtro stato: cerca una copia con lo stato selezionato
        if ($this->status) {
            $query->where('status', $this->status);
        }


        $copies = $query
            ->with(['book.category']) // Carica le relazioni per evitare problemi di query N+1 nella vista
            ->join('books', 'copies.book_id', '=', 'books.id') // join per accedere al titolo
            ->orderBy('books.title') // ordina per titolo libro
            ->select('copies.*') // seleziona solo colonne di copie per evitare conflitti
            ->paginate(6);

        $years = Book::selectRaw('YEAR(published_at) as yr')->distinct()->pluck('yr')->sortDesc();

        return view('livewire.book-search-filter', [
            'years' => $years,
            'copies' => $copies,
        ]);
    }
}
