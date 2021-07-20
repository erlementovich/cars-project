<a class="text-orange hover:text-black" href="{{ route('article-edit', $article) }}">Редактировать новость</a>

<img src="/assets/pictures/car_new_stinger.png" alt="" title="">
@include('articles.card.tags')
<p>{!! $article->body !!}</p>
