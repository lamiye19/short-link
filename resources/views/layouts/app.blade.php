@extends('layouts.base')

@section('header_content')
    <header class="bg-white shadow sm:flex sm:justify-arround">
        <div class="min-w-0 flex-1 mx-auto px-4 py-6 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900">
                @yield('header')
            </h1>
        </div>
        <div class="px-4 py-6 sm:px-6 lg:px-8">
            @yield('header_button')

        </div>
    </header>
@endsection
