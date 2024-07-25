<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Information;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\WithPagination;
use Livewire\Attributes\Computed;

class BlogList extends Component
{
    use WithPagination;

    #[Url()]
    public $search = '';

    #[Url()]
    public $category = '';

    #[On('search')]
    public function updateSearch($search)
    {
        $this->search = $search;
        $this->resetPage();
    }

    public function clearFilters()
    {
        $this->search = '';
        $this->category = '';
        $this->resetPage();
    }

    #[Computed()]
    public function blogs()
    {
        return Information::published()
            ->with('author', 'categories')
            ->when($this->activeCategory, function ($query) {
                $query->withCategory($this->category);
            })
            ->search($this->search)
            ->paginate(3);
    }

    #[Computed()]
    public function activeCategory()
    {
        if ($this->category === null || $this->category === '') {
            return null;
        }

        return Category::where('slug', $this->category)->first();
    }
    
    public function render()
    {
        return view('livewire.blog-list');
    }
}
