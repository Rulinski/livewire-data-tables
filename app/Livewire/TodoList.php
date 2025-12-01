<?php

namespace App\Livewire;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\View\View;
use Livewire\Attributes\Computed;
use Livewire\Component;

class TodoList extends Component
{
    public $draft = '';

    public function add(): void
    {
        $this->query()->create([
            'name' => $this->pull('draft'),
            'position' => $this->query()->count(),
        ]);
    }

    #[Computed]
    public function todos(): Collection
    {
        return $this->query()->orderBy('position')->get();
    }

    public function render(): View
    {
        return view('livewire.todo-list');
    }

    public function query(): HasMany
    {
        return auth()->user()->todos();
    }
}
