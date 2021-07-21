@props([
    'for' => '',
    'label' => ''
])

<div class="block">
    <label for="{{ $for }}" class="text-gray-700 font-bold">{{ $label }}</label>
    {{ $slot }}
</div>
