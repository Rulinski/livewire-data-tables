@props([
    'icon' => false,
])

<button type="button"
        class="flex items-center justify-center gap-2 relative font-medium disabled:cursor-not-allowed disabled:opacity-75 py-2   px-6 text-base rounded-lg bg-gray-800 text-white border border-gray-800 hover:bg-gray-900 hover:text-white hover:border hover:border-gray-900">
    @if ($icon)
        <x-dynamic-component :component="'icon.'.$icon"/>
    @endif

    {{ $slot }}
</button>
