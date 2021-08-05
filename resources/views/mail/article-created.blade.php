@component('mail::message')
# Создана новая статья: {{ $article->title }}

{{ $article->body }}

@component('mail::button', ['url' => route('articles.show', $article)])
Перейти
@endcomponent

@endcomponent
