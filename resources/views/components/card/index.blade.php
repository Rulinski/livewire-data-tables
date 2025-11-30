@props([
    'heading' => 'Some default heading...',
    'slim' => false,
])

<div
    {{ $attributes->class([
        'grid gap-2 rounded-xl bg-gray-100 max-w-sm',
        'p-4' => $slim,
        'p-8' => ! $slim,
    ]) }}
>
    <div class="pb-2">
        @if ($heading instanceof \Illuminate\View\ComponentSlot)
            {{ $heading }}
        @else
            <h2 class="text-2xl font-bold">{{ $heading }}</h2>
        @endif
    </div>

    <div class="text-sm text-gray-700">
        {{ $slot }}
    </div>
</div>
