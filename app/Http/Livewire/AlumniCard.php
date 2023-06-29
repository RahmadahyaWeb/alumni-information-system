<?php

namespace App\Http\Livewire;

use App\Models\Alumnus;
use App\Models\Departement;
use App\Models\Liaison;
use App\Models\Study;
use Livewire\Component;
use Livewire\WithPagination;

class AlumniCard extends Component
{
    public $search = '';
    public $departement = '';
    public $study = '';
    public $class = '';

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.alumni-card', [
            'alumni' => Alumnus::where('name', 'like', '%' . $this->search . '%')
                ->where('departement_id', 'like', '%' . $this->departement . '%')
                ->where('study_id', 'like', '%' . $this->study . '%')
                ->where('liaison_id', 'like', '%' . $this->class . '%')
                ->simplePaginate(3),
            'departements' => Departement::all(),
            'studies' => Study::where('departement_id', $this->departement)->get(),
            'liaisons' => Liaison::all()
        ]);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingDepartement()
    {
        $this->resetPage();
    }
}
