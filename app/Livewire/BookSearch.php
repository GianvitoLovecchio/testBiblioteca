<?php

namespace App\Livewire;

use App\Models\Book;
use App\Models\Copy;
use Livewire\Component;
use Livewire\WithPagination;

class BookSearch extends Component
{
    use WithPagination;

    public $search = '';

    protected $paginationTheme = 'tailwind';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $copies = Copy::with('book')
            ->whereHas('book', function ($query) {
                $query->where('title', 'like', "%{$this->search}%")
                    ->orWhere('author', 'like', "%{$this->search}%")
                    ->orWhere('description', 'like', "%{$this->search}%")
                    ->orWhere('isbn', 'like', "%{$this->search}%");
            })
            ->paginate(6);

        return view('livewire.book-search', [
            'copies' => $copies,
        ]);
    }
}
