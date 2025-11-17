<div class="flex justify-between items-center">
    <div class="flex flex-col gap-1">
       <h1 class="font-semibold text-3xl text-gray-800">Orders</h1>

       <p class="text-sm text-gray-500">Your store</p>
    </div>

    <div class="flex gap-2">
        <x-popover>
            <x-popover.button class="flex items-center gap-2 rounded-lg border pl-3 pr-2 py-1 text-gray-600 text-sm">
                <div>All Products</div>

                <x-icon.chevron-down />
            </x-popover.button>

            <x-popover.panel class="border border-gray-100 shadow-xl z-10 w-64 overflow-hidden">
                <div class="flex flex-col divide-y divide-gray-100">
                    <label class="flex items-center px-3 py-2 gap-2 cursor-pointer hover:bg-gray-100">
                        <input value="" type="checkbox" class="rounded border-gray-300">

                        <div class="text-sm text-gray-800">Some product</div>
                    </label>
                </div>
            </x-popover.panel>
        </x-popover>
    </div>
</div>
