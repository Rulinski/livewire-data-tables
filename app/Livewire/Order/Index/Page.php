<?php

namespace App\Livewire\Order\Index;

use App\Models\Store;
use Illuminate\View\View;
use Livewire\Component;

class Page extends Component
{
    public Store $store;

    public Filters $filters;

    public function mount(): void
    {
        $this->filters->init($this->store);
    }

    public function render(): View
    {
        return view('livewire.order.index.page');
    }
}
