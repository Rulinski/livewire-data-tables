<div
    x-data="{ value: 0 }"
    x-modelable="value"
    {{ $attributes->class(['flex gap-2']) }}
>
    <button x-on:click="value--" type="button" class="border border-gray-600 rounded-full h-8 w-8 flex justify-center items-center hover:bg-gray-100">-</button>

    <button x-on:click="value++" type="button" class="border border-gray-600 rounded-full h-8 w-8 flex justify-center items-center hover:bg-gray-100">+</button>
</div>
