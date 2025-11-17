<td class="whitespace-nowrap p-3 text-sm">
    <div class="flex items-center">
        <input type="checkbox" class="rounded border-gray-300 shadow">
    </div>
</td>

<div class="flex gap-2">
    <div class="flex items-center gap-1 text-sm text-gray-600">
        <span>?</span>

        <span>selected</span>
    </div>

    <div class="flex items-center px-3">
        <div class="h-[75%] w-[1px] bg-gray-300"></div>
    </div>

    <form wire:submit="archive">
        <button type="submit" class="flex items-center gap-2 rounded-lg border px-3 py-1.5 bg-white font-medium text-sm text-gray-700 hover:bg-gray-200 disabled:cursor-not-allowed disabled:opacity-75">
            <x-icon.archive-box wire:loading.remove wire:target="archive" />

            <x-icon.spinner wire:loading wire:target="archive" class="text-gray-700" />

            Archive
        </button>
    </form>

    <form wire:submit="refund">
        <button type="submit" class="flex items-center gap-2 rounded-lg border border-blue-600 px-3 py-1.5 bg-blue-500 font-medium text-sm text-white hover:bg-blue-600 disabled:cursor-not-allowed disabled:opacity-75">
            <x-icon.receipt-refund wire:loading.remove wire:target="refund" />

            <x-icon.spinner wire:loading wire:target="refund" class="text-white" />

            Refund
        </button>
    </form>
</div>
