<div class="block">
    <label for="{{ $for ?? '' }}" class="text-gray-700 font-bold">{{ $label ?? '' }}</label>
    {{ $slot }}
    @if(isset($error))
        <span class="text-xs italic text-red-600">{{ $error }}</span>
    @endif
</div>
