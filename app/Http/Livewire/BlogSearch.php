<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class BlogSearch extends Component
{
    use WithPagination;

    public mixed $model;

    public $search;

    public $category;

    public $thumbName;

    public $routePrefix;

    public $dateOrder = 'DESC';

    protected $queryString = [
        'search' => ['except' => ''],
        'category' => ['except' => ''],
    ];

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function updatingCategory(): void
    {
        $this->resetPage();
    }

    public function toggleButtonDate(): void
    {
        ($this->dateOrder === 'DESC') ? $this->dateOrder = 'ASC' : $this->dateOrder = 'DESC';
    }

    public function render(): View
    {
        return view('livewire.blog-search', [
            'items' => $this->model::published()->where(
                'title', 'like', '%'.$this->search.'%'
            )->where(
                'category_id', '=', $this->category ?? Category::select('id')->first()->id
            )->orderBy(
                'created_at', $this->dateOrder
            )->paginate(4),
            'categories' => Category::select(['id', 'name'])->get(),
        ]);
    }
}
