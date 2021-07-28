@extends('layouts.auth')
@section('title', 'Подтверждение пароля')
@section('content')
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="mt-8 max-w-md">
            <div class="grid grid-cols-1 gap-6">
                <x-forms.group for="password" label="Пароль">
                    <x-forms.password
                        id="password"
                        name="password"
                    />
                </x-forms.group>

                <x-forms.group>
                    <x-forms.button
                        class="bg-orange" text="Зарегистрироваться"/>
                </x-forms.group>

                @if (route('password.request'))
                    <a class="text-orange hover:text-black" href="{{ route('password.request') }}">
                        Забыли пароль?
                    </a>
                @endif
            </div>
        </div>
    </form>
@endsection
