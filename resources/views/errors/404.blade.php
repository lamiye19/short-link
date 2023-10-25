@extends('layouts.base')

@section('content')
    <main class="grid min-h-full place-items-center bg-white px-6 py-24 sm:py-32 lg:px-8">
        <div class="text-center">
            <p class="text-5xl font-semibold text-red-300 mb-10">404</p>
            <h1 class="mt-4 text-3xl font-bold tracking-tight text-gray-900 sm:text-5xl"> Something's wrong here</h1>
            <p class="mt-6 text-base leading-7 text-gray-600 mb-8">Sorry, we couldn’t find the page you’re looking for. You've
                clicked on a bad link or entered an invalid URL</p>
            <div class="mt-16 flex items-center justify-center gap-x-6">
                <a href="@guest {{ url('/') }} @else {{ route('home') }} @endguest"
                    class="rounded-md bg-blue-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">Go
                    back home</a>
                <a href="{{ URL::previous() }}" class="text-sm font-semibold text-gray-900">Previous Page <span
                        aria-hidden="true">&rarr;</span></a>
            </div>
        </div>
    </main>
@endsection