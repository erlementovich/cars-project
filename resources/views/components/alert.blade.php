@switch($type)
    @case('error')
    @php $typeClass = 'text-red-700 bg-red-100'; @endphp
    @break
    @case('success')
    @php $typeClass = 'text-green-700 bg-green-100'; @endphp
    @break
@endswitch

<div class="my-4">
    <div class="px-4 py-3 leading-normal rounded-lg {{ $typeClass  }}" role="alert">
        <p>{{ $message ?? 'Введите текст' }}</p>
    </div>
</div>
