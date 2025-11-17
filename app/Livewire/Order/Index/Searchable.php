<?php

namespace App\Livewire\Order\Index;

trait Searchable
{
    public string $search = '';

    public function updatedSearchable($property): void
    {
        if ($property === 'search') {
            $this->resetPage();
        }
    }

    protected function applySearch($query)
    {
        return $this->search === ''
            ? $query
            : $query
                ->where('email', 'like', '%'.$this->search.'%')
                ->orWhere('number', 'like', '%'.$this->search.'%');
    }
}
