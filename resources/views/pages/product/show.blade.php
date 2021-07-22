@extends('layouts.main')

@section('title', $product->name)

@push('head-scripts')
    @include('products.script')
@endpush


@section('child-content')
    @include('products.show')
@endsection
