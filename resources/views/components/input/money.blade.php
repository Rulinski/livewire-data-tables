<div
    {{ $attributes->whereStartsWith('class')->class([
        'relative flex border border-slate-300 rounded-lg',
    ]) }}
>
    <div class="absolute top-0 bottom-0 left-0 pl-3 text-gray-600 flex items-center justify-center">$</div>

    <input
        x-data
        x-mask:dynamic="$money($input)"
        type="text"
        class="py-2 pr-3 pl-7 bg-white rounded-lg block w-full text-gray-800"
        {{ $attributes->whereDoesntStartWith('class') }}
    >
</div>
