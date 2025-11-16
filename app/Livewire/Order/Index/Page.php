<?php

namespace App\Livewire\Order\Index;

use App\Models\Store;
use Illuminate\View\View;
use Livewire\Component;

class Page extends Component
{
    public Store $store;
    public function render(): View
    {
        return view('livewire.order.index.page', [
            'orders' => $this->store->orders()->simplePaginate(10),
        ]);
    }
}
