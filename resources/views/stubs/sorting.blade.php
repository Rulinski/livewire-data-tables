@if ($sortCol === 'number')
    <div class="text-gray-400">
        @if ($sortAsc)
            <x-icon.arrow-long-up />
        @else
            <x-icon.arrow-long-down />
        @endif
    </div>
@else
    <div class="text-gray-400">
        <x-icon.arrows-up-down />
    </div>
@endif
