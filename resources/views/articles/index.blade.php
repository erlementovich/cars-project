@if($articles)
    @foreach($articles as $article)
        @include('articles.card.wrap')
    @endforeach
    {!! $articles->links() !!}
@endif
