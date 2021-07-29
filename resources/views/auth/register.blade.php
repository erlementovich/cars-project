@extends('layouts.app')
@section('title', 'Страница регистрации')

@section('content')
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="mt-8 max-w-md">
            <div class="grid grid-cols-1 gap-6">
                <x-forms.group for="name" label="Имя">
                    <x-forms.text
                        name="name"
                        id="name"
                        placeholder="Иван Иванов"
                    />
                </x-forms.group>
                <x-forms.group for="email" label="Email">
                    <x-forms.email
                        id="email"
                        name="email"
                    />
                </x-forms.group>

                <x-forms.group for="password" label="Пароль">
                    <x-forms.password
                        id="password"
                        name="password"
                    />
                </x-forms.group>

                <x-forms.group for="password_confirmation" label="Подвердите пароль">
                    <x-forms.password
                        placeholder="Подтвердите пароль"
                        id="password_confirmation"
                        name="password_confirmation"
                    />
                </x-forms.group>

                <x-forms.group>
                    <x-forms.button
                        class="bg-orange" text="Зарегистрироваться"/>
                </x-forms.group>
            </div>
        </div>
    </form>

@endsection
