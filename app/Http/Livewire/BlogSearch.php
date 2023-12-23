<?php

namespace App\Http\Livewire;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class BlogSearch extends Component
{
    use WithPagination;

    /**
     * @var Blog
     */
    public $blog = Blog::class;

    public string $search = '';

    /**
     * @var int
     */
    public $category;

    public string $dateOrder = 'DESC';

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

    public function toggleButtonDate(): string
    {
        return ($this->dateOrder === 'DESC') ? $this->dateOrder = 'ASC' : $this->dateOrder = 'DESC';
    }

    private function filterItems(): LengthAwarePaginator
    {
        $query = $this->blog::published()->where('title', 'like', '%'.$this->search.'%');

        if ($this->category === 0) {
            $query->where('category_id', $this->category ?? Category::select('id')->value('id'));
        }

        return $query->orderBy('created_at', $this->dateOrder)->paginate(6);
    }

    public function render(): View
    {
        return view('livewire.blog-search', [
            'items' => $this->filterItems(),
            'categories' => Category::select(['id', 'name'])->get(),
        ]);
    }
}
