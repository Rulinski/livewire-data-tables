<?php

namespace App\Livewire\Order\Index;

use App\Models\Order;
use App\Models\Store;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\View\View;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class Page extends Component
{
    use WithPagination;

    public Store $store;

    public string $search = '';

    #[Url]
    public string $sortCol = 'number';

    #[Url]
    public bool $sortAsc = false;

    public function sortBy($column): void
    {
        if ($this->sortCol === $column) {
            $this->sortAsc = !$this->sortAsc;
        } else {
            $this->sortCol = $column;
            $this->sortAsc = false;
        }
    }

    protected function applySorting($query)
    {
        if ($this->sortCol) {
            $column = match ($this->sortCol) {
                'number' => 'number',
                'status' => 'status',
                'date' => 'ordered_at',
                'amount' => 'amount',
            };

            $query->orderBy($column, $this->sortAsc ? 'asc' : 'desc');
        }

        return $query;
    }

    public function updatedSearch(): void
    {
        $this->resetPage();
    }

    protected function applySearch($query)
    {
        return $this->search === ''
            ? $query
            : $query
                ->where('email', 'like', '%'.$this->search.'%')
                ->orWhere('number', 'like', '%'.$this->search.'%');
    }

    /**
     * @throws AuthorizationException
     */
    public function refund(Order $order): void
    {
        $this->authorize('update', $order);

        $order->refund();
    }

    public function archive(Order $order): void
    {
        $this->authorize('update', $order);

        $order->archive();
    }

    public function render(): View
    {
        $query = $this->store->orders();
        $query = $this->applySearch($query);
        $query = $this->applySorting($query);

        return view('livewire.order.index.page', [
            'orders' => $query->paginate(10),
        ]);
    }
}
