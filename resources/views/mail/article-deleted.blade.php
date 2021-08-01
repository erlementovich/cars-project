@component('mail::message')
# Статья удалена: {{ $article->title }}

@component('mail::button', ['url' => route('articles.index')])
Все статьи
@endcomponent

@endcomponent
