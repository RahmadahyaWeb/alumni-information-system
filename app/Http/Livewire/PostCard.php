<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class PostCard extends Component
{
    public $search = '';

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.post-card', [
            'posts' => Post::where('title', 'like', '%' . $this->search . '%')
                ->latest()->simplePaginate(4),
        ]);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
