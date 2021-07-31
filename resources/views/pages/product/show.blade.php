@extends('layouts.app')

@section('title', $product->name)

@push('head-scripts')
    <script src="{{ mix('assets/js/product.js') }}"></script>
@endpush


@section('content')
    @include('products.show')
@endsection
