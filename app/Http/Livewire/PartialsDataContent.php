<?php

namespace App\Http\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class PartialsDataContent extends Component
{
    use WithPagination;

    public $model;
    public $search;
    public $thumbName;
    public $routePrefix;
    public $dateOrder = "DESC";

    protected $queryString = [
        'search' => [ 'except' => '' ]
    ];

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function toggleButtonDate(): void
    {
        ($this->dateOrder === "DESC") ? $this->dateOrder = "ASC" : $this->dateOrder = "DESC";
    }
    
    public function render(): View
    {
        return view('livewire.partials-data-content', [
            'items' => $this->model::published()
                ->where('title', 'like', '%' . $this->search . '%')
                ->orderBy('created_at', $this->dateOrder)->paginate(4)
        ]);
    }
}
