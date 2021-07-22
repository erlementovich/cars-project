@isset($article)
    <form class="mt-4" action="{{ route('articles.destroy', $article) }}" method="POST">
        @csrf
        @method('DELETE')
        <x-forms.group>
            <x-forms.button
                class="bg-gray-400" text="Удалить"/>
        </x-forms.group>
    </form>
@endif
