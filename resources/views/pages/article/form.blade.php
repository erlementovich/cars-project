@extends('layouts.app')
@section('title', isset($article) ? "Редактирование статьи: $article->title" : 'Создание статьи')

@section('content')
    <div class="p-4">
        <h1 class="text-black text-3xl font-bold mb-4">@yield('title')</h1>
        @include('articles.form')
    </div>
@endsection
