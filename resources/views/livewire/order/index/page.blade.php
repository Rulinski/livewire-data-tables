<div class="flex flex-col gap-8">
    <div class="flex flex-col sm:grid grid-cols-8 gap-2">
        <div class="relative text-sm text-gray-800 col-span-3">
            <div class="absolute pl-2 left-0 top-0 bottom-0 flex items-center pointer-events-none text-gray-500">
                <x-icon.magnifying-glass/>
            </div>

            <input wire:model.live="search" type="text" placeholder="Search email or order #"
                   class="block w-full rounded-lg border-0 py-1.5 pl-10 text-gray-900 ring-1 ring-inset ring-gray-200 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>

        <div class="flex gap-2 justify-end col-span-5">
            <div class="hidden sm:flex">
                <form wire:submit="export">
                    <button type="submit" class="flex items-center gap-2 rounded-lg border px-3 py-1.5 bg-white font-medium text-sm text-gray-700 hover:bg-gray-200">
                        <x-icon.arrow-down-tray wire:loading.remove wire:target="export" />

                        <x-icon.spinner wire:loading wire:target="export" class="text-gray-700" />

                        Export
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div>
        <div class="relative overflow-x-auto">
            {{-- Orders table... --}}
            <table class="min-w-full table-fixed divide-y divide-gray-300 text-gray-800">
                <thead>
                <tr>
                    <th class="p-3 text-left text-sm font-semibold text-gray-900">
                        <x-order.index.sortable column="number" :$sortCol :$sortAsc>
                            <div class="whitespace-nowrap">Order #</div>
                        </x-order.index.sortable>
                    </th>

                    <th class="p-3 text-left text-sm font-semibold text-gray-900">
                        <x-order.index.sortable column="status" :$sortCol :$sortAsc>
                            <div>Status</div>
                        </x-order.index.sortable>
                    </th>

                    <th class="p-3 text-left text-sm font-semibold text-gray-900">
                        <div>Customer</div>
                    </th>

                    <th class="p-3 text-left text-sm font-semibold text-gray-900">
                        <x-order.index.sortable column="date" :$sortCol :$sortAsc>
                            <div>Date</div>
                        </x-order.index.sortable>
                    </th>

                    <th class="p-3 text-left text-sm font-semibold text-gray-900">
                        <x-order.index.sortable column="amount" :$sortCol :$sortAsc class="flex-row-reverse">
                            <div>Amount</div>
                        </x-order.index.sortable>
                    </th>

                    <th>
                        {{-- Dropdown menus... --}}
                    </th>
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white text-gray-700">
                @foreach ($orders as $order)
                    <tr wire:key="{{ $order->id }}">
                        <td class="whitespace-nowrap p-3 text-sm">
                            <div class="flex gap-1">
                                <span class="text-gray-300">#</span>
                                {{ $order->number }}
                            </div>
                        </td>

                        <td class="whitespace-nowrap p-3 text-sm">
                            <div class="rounded-full py-0.5 pl-2 pr-1 inline-flex font-medium items-center gap-1 text-{{ $order->status->color() }}-600 text-xs bg-{{ $order->status->color() }}-200 opacity-75">
                                <div>{{ $order->status->label() }}</div>

                                <x-dynamic-component :component="$order->status->icon()"/>
                            </div>
                        </td>

                        <td class="whitespace-nowrap p-3 text-sm">
                            <div class="flex items-center gap-2">
                                <div class="w-5 h-5 rounded-full overflow-hidden">
                                    <img src="{{ $order->avatar }}" alt="Customer avatar">
                                </div>

                                <div>{{ $order->email }}</div>
                            </div>
                        </td>

                        <td class="whitespace-nowrap p-3 text-sm">
                            {{ $order->dateForHumans() }}
                        </td>

                        <td class="w-auto whitespace-nowrap p-3 text-sm text-gray-800 font-semibold text-right">
                            {{ $order->amountForHumans() }}
                        </td>

                        <td class="whitespace-nowrap p-3 text-sm">
                            <div class="flex items-center justify-end">
                                <x-order.index.row-dropdown :$order />
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            {{-- Table loading spinners... --}}
            <div wire:loading wire:target="sortBy, search, nextPage, previousPage, archive, archiveSelected"
                 class="absolute inset-0 bg-white opacity-50">
                {{--  --}}
            </div>

            <div wire:loading.flex wire:target="sortBy, search, nextPage, previousPage, archive, archiveSelected"
                 class="flex justify-center items-center absolute inset-0">
                <x-icon.spinner size="10" class="text-gray-500"/>
            </div>
        </div>

        {{-- Pagination... --}}
        <div class="mt-4 pt-4 flex justify-between items-center">
            <div class="text-gray-700 text-sm">
                Results: {{ \Illuminate\Support\Number::format($orders->total()) }}
            </div>

            {{ $orders->links('stubs.pagination') }}
        </div>
    </div>
</div>
