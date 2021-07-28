@extends('layouts.app')
@section('title',  'Главная страница')

@push('head-styles')
    <link href="/assets/css/main_page_template_styles.css" rel="stylesheet">
@endpush

@section('content')
    <x-banners.wrap :banners="$banners"/>
    <x-products.week :products="$weekProducts"/>
    <x-latest-news.wrap :articles="$articles"/>
@endsection
