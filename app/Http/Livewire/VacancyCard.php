<?php

namespace App\Http\Livewire;

use App\Models\Vacancy;
use Livewire\Component;
use Livewire\WithPagination;

class VacancyCard extends Component
{
    public $search = '';
    public $filter = '';

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.vacancy-card', [
            'vacancies' => Vacancy::where(
                [
                    // ['company', 'like', '%' . $this->search . '%'],
                    ['job_type', 'like', '%' . $this->filter . '%'],
                ]
            )
                ->latest()
                ->simplePaginate(3)
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
