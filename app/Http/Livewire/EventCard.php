<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Event;
use Livewire\Component;
use Livewire\WithPagination;


class EventCard extends Component
{
    public $search = '';
    public $filter = '';

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.event-card', [
            'events' => Event::with('category')
                ->where('title', 'like', '%' . $this->search . '%')
                ->where('category_id', 'like', '%' . $this->filter . '%')
                ->where('status', 1)
                ->latest()
                ->simplePaginate(2),
            'categories' => Category::all()
        ]);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingFilter()
    {
        $this->resetPage();
    }
}
