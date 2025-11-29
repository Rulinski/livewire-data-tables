<?php

namespace App\Livewire\Order\Index;

use Illuminate\View\View;
use Livewire\Component;
use Livewire\Attributes\Reactive;
use Illuminate\Support\Facades\DB;
use App\Models\Store;

class Chart extends Component
{
    public Store $store;

    #[Reactive]
    public Filters $filters;

    public $dataset = [];

    public function fillDataset(): void
    {
        $results = $this->store->orders()
            ->select(
                DB::raw("strftime('%Y', ordered_at) || '-' || strftime('%m', ordered_at) as increment"),
                DB::raw('SUM(amount) as total'),
            )
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
