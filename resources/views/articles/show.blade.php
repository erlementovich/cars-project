@admin
<a class="text-orange hover:text-black" href="{{ route('articles.edit', $article) }}">Редактировать новость</a>
@endadmin

@isset($article->image)
    <img src="{{ $article->image->getUrl() }}" alt="{{ $article->image->alt }}" title="{{ $article->name }}">
@endisset
<x-tags.wrap :tags="$article->tags"/>
<p>{!! $article->body !!}</p>
