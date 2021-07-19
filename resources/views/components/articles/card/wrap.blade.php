<div class="w-full flex">
    @include('components.articles.card.image')
    <div class="px-4 leading-normal">
        <div class="mb-8 space-y-2">
            @include('components.articles.card.title')
            @include('components.articles.card.description')
            @include('components.articles.card.tags')
            @include('components.articles.card.date')
        </div>
    </div>
</div>
