@include('alerts.wrap')
@admin
<a class="text-orange  hover:text-black" href="{{ route('articles.create') }}">Создать новость</a>
@endadmin
@if($articles)
    @foreach($articles as $article)
        @include('articles.card.wrap')
    @endforeach
    {!! $articles->links() !!}
@endif
