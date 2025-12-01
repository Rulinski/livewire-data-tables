<div class="flex flex-col gap-5">
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/sort@3.x.x/dist/cdn.min.js"></script>

    {{-- Add todo --}}
    <form wire:submit="add">
        <div class="flex gap-2">
            <input wire:model="draft" type="text" class="grow rounded-full shadow shadow-slate-300 px-5 py-3">
        </div>
    </form>

    {{-- Todo list --}}
    <div class="grid gap-3 min-w-[20rem]" x-sort="$wire.sort($item, $position)">
        @foreach($this->todos as $todo)
            <div x-sort:item="{{$todo->id}}" wire:key="{{$todo->id}}" class="group p-1.5 bg-white rounded-full shadow shadow-slate-300">
                <div class="px-3 py-1 text-sm text-slate-600">{{$todo->name}}</div>
            </div>
        @endforeach
    </div>
</div>
