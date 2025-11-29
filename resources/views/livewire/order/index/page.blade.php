<div class="w-full flex flex-col gap-8">
    <div class="gap-4 flex flex-col items-start justify-start sm:flex-row sm:justify-between sm:items-center">
        <div class="flex flex-col gap-1">
            <h1 class="font-semibold text-3xl text-gray-800">Orders</h1>

            <p class="hidden sm:block text-sm text-gray-500">{{ $store->name }}</p>
        </div>
    </div>

    <livewire:order.index.chart :$store :$filters lazy/>

    <livewire:order.index.table :$store :$filters lazy />
</div>
