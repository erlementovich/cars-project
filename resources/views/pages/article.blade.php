@extends('layouts.inner')
@section('title', $article->title)

@section('child-content')
    <img src="/assets/pictures/car_new_stinger.png" alt="" title="">
    @include('components.articles.card.tags')
    <p>{!! $article->body !!}</p>
@endsection
@section('after-content')
    @include('components.articles.single.backward')
@endsection
