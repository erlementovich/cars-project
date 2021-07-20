@if($article->published_at)
    <div class="flex items-center">
        <p class="text-sm text-gray-400 italic">{{ $article->published_at->format('d M Y') }}</p>
    </div>
@endif
