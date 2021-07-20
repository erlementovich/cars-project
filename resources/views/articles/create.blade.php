@if(session()->has('success'))
    <x-alerts.success message="{{ session()->get('success') }}"/>
@elseif(session()->has('error'))
    <x-alerts.error message="{{ session()->get('error') }}"/>
@endif

<form method="POST" action="{{ route('article-store') }}">
    @csrf
    <div class="mt-8 max-w-md">
        <div class="grid grid-cols-1 gap-6">
            <x-forms.group for="title" label="Название новости">
                <x-forms.text id="title" name="title" placeholder="Название"/>
            </x-forms.group>
            <x-forms.group for="description" label="Краткое описание новости">
                <x-forms.text id="description" name="description" placeholder="Краткое описание"/>
            </x-forms.group>

            <x-forms.group for="body" label="Детальное описание">
                <x-forms.textarea id="body" name="body" placeholder="Описание"/>
            </x-forms.group>

            <x-forms.checkbox name="publish" label="Опубликовать"/>

            <x-forms.group>
                <x-forms.button class="bg-orange" text="Сохранить"/>
            </x-forms.group>

            {{--Email--}}
            {{--            <x-forms.group for="title" label="Поле Email">--}}
            {{--                <x-forms.email id="email" name="email"/>--}}
            {{--            </x-forms.group>--}}

            {{--Select--}}
            {{--            <x-forms.group for="select" label="Селект">--}}
            {{--                <x-forms.select id="select" name="select" :options="['раз', 'два', 'три', 'четыре']"/>--}}
            {{--            </x-forms.group>--}}

            {{--Date--}}
            {{--            <x-forms.group for="date" label="Дата публикации">--}}
            {{--                <x-forms.date id="date" name="date"/>--}}
            {{--            </x-forms.group>--}}
        </div>
    </div>
</form>
