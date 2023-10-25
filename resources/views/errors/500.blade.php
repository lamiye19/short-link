@extends('layouts.base')

@section('content')
<main class="grid min-h-full place-items-center bg-white px-6 py-24 sm:py-32 lg:px-8">
    <div class="text-center">
      <p class="text-5xl font-semibold text-red-300 mb-10" >500</p>
      <h1 class="mt-4 text-3xl font-bold tracking-tight text-gray-900 sm:text-5xl"> <i class="bx bx-error mr-3 text-red-600"></i> Internal Server Error</h1>
      <p class="mt-6 text-base leading-7 text-gray-600 my-8">The server has encountered an unexpected condition or configuration problem that prevents it from fulfilling the request made by the browser or client</p>
      <div class="mt-16 flex items-center justify-center gap-x-6">
        <a href="{{ url('/') }}" class="rounded-md bg-blue-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">Go back home</a>
        <a href="{{ URL::previous() }}" class="text-sm font-semibold text-gray-900">Previous Page <span aria-hidden="true">&rarr;</span></a>
      </div>
    </div>
  </main>
@endsection
