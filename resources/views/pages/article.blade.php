@extends('layouts.inner')
@section('title', $article->title)

@section('child-content')
    @include('articles.show')
@endsection
@section('after-content')
    <x-article.backward/>
@endsection
