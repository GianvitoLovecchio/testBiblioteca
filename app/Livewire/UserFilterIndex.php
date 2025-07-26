<?php

namespace App\Livewire;

use App\Models\Book;
use App\Models\Copy;
use Livewire\Component;
use Livewire\WithPagination;

class UserFilterIndex extends Component
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
        $query = Copy::query();

        // Se non è admin, forziamo lo stato 'disponibile' sempre
        if (!auth()->user()->is_admin) {
            $query->where('status', 'disponibile');
        }

        // Filtro per categoria
        if ($this->category) {
            $query->whereHas('book', fn($q) =>
                $q->where('category_id', $this->category)
            );
        }

        // Filtro per anno di pubblicazione
        if ($this->year) {
            $query->whereHas('book', fn($q) =>
                $q->whereYear('published_at', $this->year)
            );
        }

        // Solo gli admin possono filtrare per stato
        if ($this->status && auth()->user()->is_admin) {
            $query->where('status', $this->status);
        }

        // Costruzione finale della query
        $copies = $query
            ->with(['book.category']) // per evitare problemi N+1
            ->join('books', 'copies.book_id', '=', 'books.id')
            ->orderBy('books.title')
            ->select('copies.*') // importante per evitare conflitti con join
            ->paginate(6);

        // Recupero anni distinti per i filtri
        $years = Book::selectRaw('YEAR(published_at) as yr')->distinct()->pluck('yr')->sortDesc();

        return view('livewire.user-filter-index', [
            'copies' => $copies,
            'years' => $years,
        ]);
    }
}
