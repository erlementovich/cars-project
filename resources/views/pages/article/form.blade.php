@extends('layouts.app')
@section('title', isset($article) ? "Редактирование статьи: $article->title" : 'Создание статьи')

@section('content')
    @include('articles.form')
@endsection
