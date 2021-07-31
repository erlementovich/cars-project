@extends('layouts.app')

@section('title', $product->name)

@push('head-scripts')
    @include('products.script')
@endpush


@section('content')
    @include('products.show')
@endsection
