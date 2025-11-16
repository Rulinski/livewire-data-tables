@props(['order'])

<x-menu>
    <x-menu.button class="rounded hover:bg-gray-100 p-1">
        <x-icon.ellipsis-vertical />
    </x-menu.button>

    <x-menu.items>
        <x-menu.close>
            <x-menu.item
                wire:click="refund({{ $order->id }})"
                wire:confirm="Are you sure you want to refund this order?"
            >
                Refund
            </x-menu.item>
        </x-menu.close>

        <x-menu.close>
            <x-menu.item
                wire:click="archive({{ $order->id }})"
                wire:confirm="Are you sure you want to archive this order?"
            >
                Archive
            </x-menu.item>
        </x-menu.close>
    </x-menu.items>
</x-menu>
