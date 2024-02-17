<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Report;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class ReportSearch extends Component
{
    use WithPagination;

    /**
     * @var Report
     */
    public $report = Report::class;

	/**
	 * @var string
	 */
    public string $search = '';

    /**
     * @var int
     */
    public $category;

    /**
     * @var array<string, string[]>
     */
    protected $queryString = [
        'category' => ['except' => '0'],
    ];

	/**
	 * @return void
	 */
    public function updatingCategory(): void
    {
        $this->resetPage();
    }

	/**
	 * @return LengthAwarePaginator
	 */
    private function filterItems(): LengthAwarePaginator
    {
        $query = $this->report::latestReport()
            ->with(['file', 'category']);

        if ($this->category !== null && $this->category != '0') {
            $query
                ->where('category_id', '=', $this->category);
        }

        return $query->paginate(6);
    }

	/**
	 * @return View
	 */
    public function render(): View
    {
        return view('livewire.report-search', [
            'reports' => $this->filterItems(),
            'categories' => Category::usedFor('reports')
                ->select(['id', 'name'])
                ->get(),
        ]);
    }
}
