@extends('layouts.app')
@section('title',  'Главная страница')

@section('breadcrumbs')
@endsection
@section('inner-styles')
    <link href="/assets/css/main_page_template_styles.css" rel="stylesheet">
@endsection

@section('wrapper')
    <x-banners.wrap :banners="$banners"/>
    <x-products.week :products="$weekProducts"/>
    <x-latest-news.wrap :articles="$articles"/>
@endsection
