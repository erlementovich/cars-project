@extends('layouts.app')
@section('title', 'Страница авторизации')

@section('content')
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="mt-8 max-w-md">
            <div class="grid grid-cols-1 gap-6">
                <x-forms.group for="email" label="Ваш Email">
                    <x-forms.email
                        id="email"
                        name="email"
                    />
                </x-forms.group>

                <x-forms.group for="password" label="Ваш пароль">
                    <x-forms.password
                        id="password"
                        name="password"
                    />
                </x-forms.group>
                <x-forms.checkbox
                    name="remember"
                    label="Запомнить меня"/>

                <x-forms.group>
                    <x-forms.button
                        class="bg-orange" text="Войти"/>
                </x-forms.group>
            </div>
        </div>
    </form>
@endsection
