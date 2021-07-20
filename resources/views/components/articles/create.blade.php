@if(session()->has('success'))
    <x-alert.success message="{{ session()->get('success') }}"/>
@elseif(session()->has('error'))
    <x-alert.error message="{{ session()->get('error') }}"/>
@endif

<form method="POST" action="{{ route('article-store') }}">
    @csrf
    <div class="mt-8 max-w-md">
        <div class="grid grid-cols-1 gap-6">
            <x-input.group for="title" label="Название новости">
                <x-input.text id="title" name="title" placeholder="Название"/>
            </x-input.group>
            <x-input.group for="description" label="Краткое описание новости">
                <x-input.text id="description" name="description" placeholder="Краткое описание"/>
            </x-input.group>

            <x-input.group for="body" label="Детальное описание">
                <x-input.textarea id="body" name="body" placeholder="Описание"/>
            </x-input.group>

            <x-input.checkbox name="publish" label="Опубликовать"/>

            <x-input.group>
                <x-input.button class="bg-orange" text="Сохранить"/>
            </x-input.group>

            {{--Email--}}
            {{--            <x-input.group for="title" label="Поле Email">--}}
            {{--                <x-input.email id="email" name="email"/>--}}
            {{--            </x-input.group>--}}

            {{--Select--}}
            {{--            <x-input.group for="select" label="Селект">--}}
            {{--                <x-input.select id="select" name="select" :options="['раз', 'два', 'три', 'четыре']"/>--}}
            {{--            </x-input.group>--}}

            {{--Date--}}
            {{--            <x-input.group for="date" label="Дата публикации">--}}
            {{--                <x-input.date id="date" name="date"/>--}}
            {{--            </x-input.group>--}}
        </div>
    </div>
</form>
