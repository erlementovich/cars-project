<div class="w-full flex">
    @include('articles.card.image')
    <div class="px-4 leading-normal">
        <div class="mb-8 space-y-2">
            @include('articles.card.title')
            @include('articles.card.description')
            @include('articles.card.tags')
            @include('articles.card.date')
        </div>
    </div>
</div>
