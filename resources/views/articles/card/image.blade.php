<div class="h-48 lg:h-auto w-32 sm:w-60 lg:w-32 xl:w-48 flex-none text-center overflow-hidden">
    <a class="block w-full h-full hover:opacity-75" href="{{ route('articles.show', $article) }}"><img
            src="{{ $article->image->getUrl() }}"
            class="bg-white bg-opacity-25 w-full h-full object-contain" alt="{{ $article->image->alt }}"></a>
</div>
