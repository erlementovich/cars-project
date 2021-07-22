<a class="text-orange hover:text-black" href="{{ route('articles.edit', $article) }}">Редактировать новость</a>

<img src="/assets/pictures/car_new_stinger.png" alt="" title="">
<x-tags.wrap :tags="$article->tags"/>
<p>{!! $article->body !!}</p>
