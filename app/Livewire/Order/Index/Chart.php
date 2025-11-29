<?php

namespace App\Livewire\Order\Index;

use App\Models\Store;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Livewire\Attributes\Reactive;
use Livewire\Component;

class Chart extends Component
{
    public Store $store;

    #[Reactive]
    public Filters $filters;

    public $dataset = [];

    public function fillDataset(): void
    {
        $increment = match ($this->filters->range) {
            Range::Today => DB::raw("strftime('%H', ordered_at) as increment"),
            Range::All_Time, Range::Year => DB::raw("strftime('%Y', ordered_at) || '-' || strftime('%m', ordered_at) as increment"),
            default => DB::raw('DATE(ordered_at) as increment'),
        };

        $results = $this->store->orders()
            ->select($increment, DB::raw('SUM(amount) as total'))
            ->tap(function ($query) {
                $this->filters->apply($query);
            })
            ->groupBy('increment')
            ->get();

        $this->dataset['values'] = $results->pluck('total')->toArray();
        $this->dataset['labels'] = $results->pluck('increment')->toArray();
    }

    public function render(): View
    {
        $this->fillDataset();

        return view('livewire.order.index.chart');
    }

    public function placeholder(): View
    {
        return view('livewire.order.index.chart-placeholder');
    }
}
