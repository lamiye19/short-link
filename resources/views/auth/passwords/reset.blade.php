@extends('layouts.app')

@section('hearder')
    {{ __('Reset Password') }}
@endsection

@section('content')
    <div class="grid justify-center">
        <div class="grid">
            <div class="min-w-0 flex-1 mb-10">
                <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">
                    {{ __('Login') }}</h2>
            </div>

            <form method="POST" action="{{ route('password.update') }}" class="space-y-5">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">

                @include('components.input', [
                    'id' => 'email',
                    'label' => 'Email address',
                    'type' => 'email',
                    'value' => $email ?? old('email'),
                    'controls' => 'required autofocus',
                    'autocomplete' => 'email',
                ])
                @include('components.input', [
                    'id' => 'password',
                    'label' => 'Password',
                    'type' => 'password',
                    'value' => '',
                    'controls' => 'required',
                    'autocomplete' => 'new-password',
                ])
                @include('components.input', [
                    'id' => 'password_confirmation',
                    'label' => 'Confirm Password',
                    'type' => 'password',
                    'value' => '',
                    'controls' => 'required',
                    'autocomplete' => 'new-password',
                ])

                <div class="mt-5">

                    <span class="sm:block">
                        <button type="submit"
                            class="inline-flex items-center rounded-md bg-blue-700 px-3 py-2 text-sm font-semibold text-white shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-900">
                            {{ __('Reset Password') }}

                        </button>
                    </span>
                </div>
            </form>
        </div>
    </div>
@endsection
