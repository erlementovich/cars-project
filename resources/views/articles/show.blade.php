<a class="text-orange hover:text-black" href="{{ route('articles.edit', $article) }}">Редактировать новость</a>

<img src="{{ $article->image->getUrl() }}" alt="{{ $article->image->alt }}" title="{{ $article->name }}">
<x-tags.wrap :tags="$article->tags"/>
<p>{!! $article->body !!}</p>
