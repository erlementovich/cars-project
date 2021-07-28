@extends('layouts.app')
@section('title', 'Подтвержение почты')

@section('content')
    @if (session('resent'))
        <div class="alert alert-success" role="alert">
            {{ __('A fresh verification link has been sent to your email address.') }}
        </div>
    @endif

    {{ __('Before proceeding, please check your email for a verification link.') }}
    {{ __('If you did not receive the email') }},
    <form method="POST" action="{{ route('verification.resend') }}">
        @csrf
        <div class="mt-8 max-w-md">
            <div class="grid grid-cols-1 gap-6">
                <x-forms.group>
                    <x-forms.button
                        class="bg-orange" text="Отправить запрос на подтверждение"/>
                </x-forms.group>
                .
            </div>
        </div>
    </form>
@endsection
