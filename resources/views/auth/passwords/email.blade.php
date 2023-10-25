@extends('layouts.app')

@section('hearder')
    {{ __('Reset Password') }}
@endsection

@section('content')
    <div class="grid justify-center">
        <div class="grid">
            <div class="min-w-0 flex-1 mb-10">
                <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">
                    {{ __('Reset Password') }}</h2>
            </div>

            <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
                @csrf
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                @include('components.input', [
                    'id' => 'email',
                    'label' => 'Email address',
                    'type' => 'email',
                    'value' => old('email'),
                    'controls' => 'required autofocus',
                    'autocomplete' => 'email',
                ])

                <div class="mt-5">

                    <span class="sm:block">
                        <button type="submit"
                            class="inline-flex items-center rounded-md bg-blue-700 px-3 py-2 text-sm font-semibold text-white shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-900">
                            {{ __('Send Password Reset Link') }}

                        </button>
                    </span>
                </div>
            </form>
        </div>
    </div>
@endsection
