<?php

namespace App\Livewire\Order\Index;

use App\Models\Order;
use App\Models\Store;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\View\View;
use Livewire\Attributes\Reactive;
use Livewire\Attributes\Renderless;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use Searchable, Sortable, WithPagination;

    public Store $store;

    #[Reactive]
    public Filters $filters;

    public $selectedOrderIds = [];

    public $orderIdsOnPage = [];

    /**
     * @throws AuthorizationException
     */
    public function refund(Order $order): void
    {
        $this->authorize('update', $order);

        $order->refund();
    }

    public function archiveSelected(): void
    {
        $orders = $this->store->orders()->whereIn('id', $this->selectedOrderIds)->get();

        foreach ($orders as $order) {
            $this->archive($order);
        }
    }

    public function archive(Order $order): void
    {
        $this->authorize('update', $order);

        $order->archive();
    }

    #[Renderless]
    public function export()
    {
        return $this->store->orders()->toCsv();
    }

    public function render(): View
    {
        $query = $this->store->orders();
        $query = $this->applySearch($query);
        $query = $this->applySorting($query);
        $query = $this->filters->apply($query);
        $orders = $query->paginate(10);

        $this->orderIdsOnPage = $orders->map(fn ($order) => (string) $order->id)->toArray();

        return view('livewire.order.index.table', [
            'orders' => $orders,
        ]);
    }

    public function placeholder(): View
    {
        return view('livewire.order.index.table-placeholder');
    }
}
