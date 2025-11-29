<?php

namespace App\Livewire\Order\Index;

use Livewire\Form;
use App\Models\Store;

class Filters extends Form
{
    public Store $store;

    public $selectedProductIds = [];

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
        return $this->applyProducts($query);
    }

    public function applyProducts($query)
    {
        return $query->whereIn('product_id', $this->selectedProductIds);
    }
}
