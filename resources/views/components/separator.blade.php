@props([
    'vertical' => false,
])

  <div
    role="separator"
    aria-orientation="{{ $vertical ? 'vertical' : 'horizontal' }}"
    {{ $attributes->class([
        'bg-gray-300',
        'h-full w-[1px]' => $vertical,
        'h-[1px] w-full' => ! $vertical,
    ]) }}
></div>

