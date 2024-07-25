<?php

namespace App\Livewire;

use App\Models\Program;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\WithPagination;
use Livewire\Attributes\Computed;

class ProgramList extends Component
{
    use WithPagination;

    #[Url()]
    public $search = '';

    #[On('search')]
    public function updateSearch($search)
    {
        $this->search = $search;
        $this->resetPage();
    }

    public function clearFilters()
    {
        $this->search = '';
        $this->resetPage();
    }

    #[Computed()]
    public function programs()
    {
        return Program::search($this->search)
            ->paginate(3);
    }

    public function render()
    {
        return view('livewire.program-list');
    }
}
