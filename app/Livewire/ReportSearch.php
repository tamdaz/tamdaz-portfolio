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

    public string $search = '';

    /**
     * @var int
     */
    public $category;

    protected $queryString = [
        'category' => ['except' => '0'],
    ];

    private function filterItems(): LengthAwarePaginator
    {
        $query = $this->report::latestReport()
            ->with(['file', 'category']);

        if ($this->category !== null && $this->category != '0') {
            $query
                ->where('category_id', '=', $this->category);
        }

        return $query->paginate(1);
    }

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
