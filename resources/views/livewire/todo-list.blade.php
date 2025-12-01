<div class="flex flex-col gap-5">
    {{-- Add todo --}}
    <form wire:submit="add">
        <div class="flex gap-2">
            <input wire:model="draft" type="text" class="grow rounded-full shadow shadow-slate-300 px-5 py-3">
        </div>
    </form>

    {{-- Todo list --}}
    <div class="grid gap-3 min-w-[20rem]">
        @foreach($this->todos as $todo)
            <div class="group p-1.5 bg-white rounded-full shadow shadow-slate-300">
                <div class="px-3 py-1 text-sm text-slate-600">{{$todo->name}}</div>
            </div>
        @endforeach
    </div>
</div>
