<?php

namespace App\Livewire\Order\Index;

use Livewire\Form;
use Livewire\Attributes\Url;
use App\Models\Store;

class Filters extends Form
{
    public Store $store;
    #[Url(as: 'products')]
    public $selectedProductIds = [];

    #[Url]
    public Range $range = Range::All_Time;

    public function init($store): void
    {
        $this->store = $store;

        $this->initSelectedProductIds();
    }

    public function initSelectedProductIds(): void
    {
        if (empty($this->selectedProductIds)) {
            $this->selectedProductIds = $this->products()->pluck('id')->toArray();
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

        return $query->whereBetween('ordered_at', $this->range->dates());
    }
}
