<a class="text-orange hover:text-black" href="{{ route('articles.edit', $article) }}">Редактировать новость</a>

<img src="{{ asset($article->image->path) }}" alt="{{ $article->image->alt }}" title="{{ $article->name }}">
<x-tags.wrap :tags="$article->tags"/>
<p>{!! $article->body !!}</p>
