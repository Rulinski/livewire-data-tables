<?php

namespace App\Livewire\Order\Index;

use App\Models\Store;
use Illuminate\View\View;
use Livewire\Attributes\Lazy;
use Livewire\Component;

#[Lazy]
class Page extends Component
{
    public Store $store;

    public function render(): View
    {
        return view('livewire.order.index.page');
    }
}
