<?php

namespace App\Livewire;

use Illuminate\View\View;
use Livewire\Attributes\Computed;
use Livewire\Component;

class TodoList extends Component
{
    public $draft = '';

    public function add(): void
    {
        auth()->user()->todos()->create([
            'name' => $this->pull('draft'),
        ]);
    }

    #[Computed]
    public function todos()
    {
        return auth()->user()->todos;
    }

    public function render(): View
    {
        return view('livewire.todo-list');
    }
}
