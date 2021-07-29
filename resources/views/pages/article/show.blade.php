@extends('layouts.inner')
@section('title', $article->title)

@section('content')
    @include('articles.show')
@endsection
@section('after')
    <x-article.backward/>
@endsection
