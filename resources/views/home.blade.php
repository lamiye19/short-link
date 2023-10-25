@extends('layouts.app')

@section('header')
    {{ __('Dashbord') }}
@endsection

@section('content')
    <div class="space-y-10">
        <div class="p-3 my-6 shadow">


            {{ __('Welcome ') }} <span class="font-medium">{{ Auth::user()->name}}</span>
    
        </div>
        <div class="p-3 my-6 shadow">
    
    
            <h1 class="font-semibold mb-8">Usage </h1>

            <ol class="space-y-6">
                <div class="">
                    <li class="sm:flex sm:justify-between">
                        <span>Short links</span>
                        <span> {{ count(Auth::user()->links) }} of 100 used</span>
                    </li>
                    <div class="w-full h-1 bg-gray-300 mt-2">
                        <div class="h-full bg-blue-500" style="width: {{ count(Auth::user()->links) }}%;"></div>
                      </div>
                </div>
                  
                <div class="">
                    <li class="sm:flex sm:justify-between">
                    <span>Qr Code</span>
                    <span> {{ '0' }} of 100 used</span>
                </li>
                <div class="w-full h-1 bg-gray-300 mt-2">
                    <div class="h-full bg-blue-500" style="width: {{ count([]) }}%;"></div>
                  </div>
            </div>
            </ol>
    
        </div>
    </div>
@endsection
