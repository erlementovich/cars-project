<form method="POST"
      @isset($article)
      action="{{ route('article-update', $article) }}
      @else
          action="{{ route('article-store') }}
@endisset">
@isset($article)
    @method('PUT')
@endisset
@csrf
<div class="mt-8 max-w-md">
    <div class="grid grid-cols-1 gap-6">
        <x-forms.group for="title" label="Название новости">
            <x-forms.text
                :fieldTitle="$article->title ?? null"
                id="title"
                name="title"
                placeholder="Название"/>
        </x-forms.group>
        <x-forms.group for="description" label="Краткое описание новости">
            <x-forms.text
                :fieldTitle="$article->description ?? null"
                id="description"
                name="description"
                placeholder="Краткое описание"/>
        </x-forms.group>

        <x-forms.group for="body" label="Детальное описание">
            <x-forms.textarea
                :fieldTitle="$article->body ?? null"
                id="body"
                name="body"
                placeholder="Описание"/>
        </x-forms.group>

        <x-forms.checkbox
            :isChecked="$article->published_at ?? null"
            name="publish"
            label="Опубликовать"/>

        <x-forms.group>
            <x-forms.button
                class="bg-orange" text="Сохранить"/>
        </x-forms.group>
    </div>
</div>
</form>
