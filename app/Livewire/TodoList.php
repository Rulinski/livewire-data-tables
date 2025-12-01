<?php

namespace App\Livewire;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;
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

    /**
     * @throws \Throwable
     */
    public function sort($key, $position): void
    {
        $todo = $this->query()->findOrFail($key);

        DB::transaction(function () use ($todo, $position) {
            $current = $todo->position;
            $after = $position;

            if ($current == $after) {
                return;
            }

            // move the target _todo out of the position stack
            $todo->update(['position' => -1]);

            $block = $this->query()->whereBetween('position', [
                min($current, $after),
                max($current, $after),
            ]);

            $needToShiftBlockBecauseDraggingTargetDown = $current < $after;

            $needToShiftBlockBecauseDraggingTargetDown
                ? $block->decrement('position')
                : $block->increment('position');

            $todo->update(['position' => $after]);
        });
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
