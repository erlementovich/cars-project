@extends('layouts.app')
@section('title',  'Главная страница')

@section('breadcrumbs')
@endsection
@section('inner-styles')
    <link href="{{ mix('assets/css/main.css') }}" rel="stylesheet">
@endsection

@section('wrapper')
    <x-banners.wrap :banners="$banners"/>
    <x-products.week :products="$weekProducts"/>
    <x-latest-news.wrap :articles="$articles"/>
@endsection
