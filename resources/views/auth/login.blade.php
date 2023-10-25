@extends('layouts.app')

@section('header')
{{ __('Login') }}
@endsection

@section('content')
    <div class="grid justify-center">
        <div class="grid">
            <div class="min-w-0 flex-1 mb-10">
                <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">
                    {{ __('Login') }}</h2>
            </div>

            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf
                @include('components.input', [
                    'id' => 'email',
                    'label' => 'Email address',
                    'type' => 'email',
                    'value' => old('email'),
                    'controls' => 'required autofocus',
                    'autocomplete' => 'email',
                ])
                @include('components.input', [
                    'id' => 'password',
                    'label' => 'Password',
                    'type' => 'password',
                    'value' => old('password'),
                    'controls' => 'required',
                    'autocomplete' => 'new-password',
                ])
                @include('components.check', [
                    'id' => 'remember',
                    'options' => ['Remember Me'],
                    'controls' => 'required '.old('remember') ? 'checked' : '',
                ])

                <div class="mt-5">

                    <span class="sm:block">
                        <button type="submit"
                        class="inline-flex items-center rounded-md bg-blue-700 px-3 py-2 text-sm font-semibold text-white shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-900">
                            {{ __('Login') }}

                        </button>
                    </span>

                    @if (Route::has('password.request'))
                        <span class="ml-3 sm:block mt-3">
                            <a href="{{ route('password.request') }}" class="">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        </span>
                    @endif
                </div>
            </form>
        </div>
    </div>
@endsection
