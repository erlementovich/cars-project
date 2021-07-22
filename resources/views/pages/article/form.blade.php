@extends('layouts.main')
@section('title', isset($article) ? "Редактирование статьи: $article->title" : 'Создание статьи')

@section('child-content')
    @include('articles.form')
@endsection
