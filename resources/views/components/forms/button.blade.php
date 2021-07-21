@props([
    'class' => '',
    'text' => 'Подробнее',
])
<button type="submit"
        class="inline-block {{ $class }} hover:bg-opacity-70 focus:outline-none text-white font-bold py-2 px-4 rounded">
    {{ $text }}
</button>
