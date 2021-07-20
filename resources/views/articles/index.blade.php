@include('alerts.wrap')
<a class="text-orange  hover:text-black" href="{{ route('article-create') }}">Создать новость</a>
@if($articles)
    @foreach($articles as $article)
        @include('articles.card.wrap')
    @endforeach
    {!! $articles->links() !!}
@endif
