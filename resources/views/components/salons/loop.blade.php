@props(['salons'])

@if($salons)
    @foreach($salons as $salon)
        <x-salons.card :salon="$salon" :evenLoop="$loop->even"/>
    @endforeach
@endif
