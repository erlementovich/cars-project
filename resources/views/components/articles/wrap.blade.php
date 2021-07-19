@if($articles)
    @foreach($articles as $article)
        @include('components.articles.card.wrap')
    @endforeach
    {!! $articles->links() !!}
@endif
