@extends('layouts.inner', ['wrapperClass' => 'max-w-4xl'])
@section('title', 'Салоны')

@section('content')
    <x-salons.loop :salons="$salons"/>
    <hr class="text-orange">

    <p class="text-black text-2xl font-bold mb-4">Салоны на карте</p>

    <div class="bg-gray-200">
        Карта с салонами
    </div>
@endsection
