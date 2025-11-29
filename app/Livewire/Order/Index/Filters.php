<?php

namespace App\Livewire\Order\Index;

use Livewire\Form;
use Livewire\Attributes\Url;
use Illuminate\Support\Carbon;
use App\Models\Store;

class Filters extends Form
{
    public Store $store;
    #[Url(as: 'products')]
    public $selectedProductIds = [];

    #[Url]
    public Range $range = Range::All_Time;

    #[Url]
    public $start;

    #[Url]
    public $end;

    public function init($store): void
    {
        $this->store = $store;

        $this->initSelectedProductIds();
        $this->initRange();
    }

    public function initSelectedProductIds(): void
    {
        if (empty($this->selectedProductIds)) {
            $this->selectedProductIds = $this->products()->pluck('id')->toArray();
        }
    }

    public function initRange(): void
    {
        if ($this->range !== Range::Custom) {
            $this->start = null;
            $this->end = null;
        }
    }

    public function products()
    {
        return $this->store->products;
    }

    public function apply($query)
    {
        $query = $this->applyProducts($query);
        $query = $this->applyRange($query);

        return $query;
    }

    public function applyProducts($query)
    {
        return $query->whereIn('product_id', $this->selectedProductIds);
    }

    public function applyRange($query)
    {
        if ($this->range === Range::All_Time) {
            return $query;
        }

        if ($this->range === Range::Custom) {
            $start = Carbon::createFromFormat('Y-m-d', $this->start);
            $end = Carbon::createFromFormat('Y-m-d', $this->end);

            return $query->whereBetween('ordered_at', [$start, $end]);
        }

        return $query->whereBetween('ordered_at', $this->range->dates());
    }
}
