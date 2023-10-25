@extends('layouts.app')

@section('header')
    {{ __('Links') }}
@endsection

@section('header_button')
    <a href="{{ route('links.create') }}" class="inline-flex items-center rounded-md 
    bg-blue-700 px-3 py-2 text-sm font-semibold text-white shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-900">
    <i class="bx bx-plus mr-3"></i>
    New</a>
@endsection

@section('content')
    <div class="space-y-10">
        @foreach ($links as $l)
            @php
                $domain = parse_url($l->long, PHP_URL_HOST);
            @endphp
            <div class="sm:flex sm:justify-between bg-white shadow-lg p-4 m-3">
                <div class="hidden md:mr-4 sm:block">
                    <img class="inline-block h-8 w-8 rounded-full ring-2 ring-white"
                        src="{{ env('GET_FAVICON') . $domain . env('FAVICON_SIZE') }}" alt="{{ 'Favicon for ' . $domain }}" />
                </div>

                <div class="min-w-0 flex-1">
                    <h2 class="font-bold text-md leading-7 text-gray-900 sm:truncate sm:tracking-tight">
                        {{ $l->title ?? 'Untitled ' . $l->created_at }}</h2>
                    <span class="block">
                        <a href="{{ $l->short.'fbd' }}" class="mt-2 inline-flex text-sm" target="_blank">
                            <svg class="-ml-0.5 mr-1.5 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor"
                                aria-hidden="true">
                                <path
                                    d="M12.232 4.232a2.5 2.5 0 013.536 3.536l-1.225 1.224a.75.75 0 001.061 1.06l1.224-1.224a4 4 0 00-5.656-5.656l-3 3a4 4 0 00.225 5.865.75.75 0 00.977-1.138 2.5 2.5 0 01-.142-3.667l3-3z" />
                                <path
                                    d="M11.603 7.963a.75.75 0 00-.977 1.138 2.5 2.5 0 01.142 3.667l-3 3a2.5 2.5 0 01-3.536-3.536l1.225-1.224a.75.75 0 00-1.061-1.06l-1.224 1.224a4 4 0 105.656 5.656l3-3a4 4 0 00-.225-5.865z" />
                            </svg>
                            <span class="text-blue-500">{{ $l->short }}</span>
                        </a>
                    </span>

                    <a href="{{ $l->long }}" class="text-gray-950 mt-1 mb-3 inline-flex text-sm ml-6"
                        target="_blank">{{ $l->long }}</a>

                    <div class="mt-8 flex flex-col sm:mt-0 sm:flex-row sm:flex-wrap sm:space-x-6">
                        <div class="mt-2 flex items-center text-sm text-gray-500">
                            <svg class="mr-1.5 h-5 w-5 flex-shrink-0 text-gray-400" stroke="currentColor"
                                fill="currentColor" stroke-width="0" viewBox="0 0 24 24" role="graphics-document"
                                height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                <title>Total Clicks</title>
                                <path fill="none" d="M0 0h24v24H0z"></path>
                                <path d="M4 9h4v11H4zM16 13h4v7h-4zM10 4h4v16h-4z"></path>
                            </svg>
                            {{ count($l->clicked) }}
                        </div>
                        <div class="mt-2 flex items-center text-sm text-gray-500">
                            <svg class="mr-1.5 h-5 w-5 flex-shrink-0 text-gray-400" viewBox="0 0 20 20" fill="currentColor"
                                aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M5.75 2a.75.75 0 01.75.75V4h7V2.75a.75.75 0 011.5 0V4h.25A2.75 2.75 0 0118 6.75v8.5A2.75 2.75 0 0115.25 18H4.75A2.75 2.75 0 012 15.25v-8.5A2.75 2.75 0 014.75 4H5V2.75A.75.75 0 015.75 2zm-1 5.5c-.69 0-1.25.56-1.25 1.25v6.5c0 .69.56 1.25 1.25 1.25h10.5c.69 0 1.25-.56 1.25-1.25v-6.5c0-.69-.56-1.25-1.25-1.25H4.75z"
                                    clip-rule="evenodd" />
                            </svg>
                            {{ $l->created_at }}
                        </div>
                    </div>
                </div>

                <div class="mt-5 flex md:ml-4 md:mt-0">
                    <span class="w-3/4 sm:block">
                        <button type="button"
                            class="w-full inline-flex items-center rounded-md bg-gray-300 px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                            <svg class="-ml-0.5 mr-1.5 h-5 w-5 text-gray-400" stroke="currentColor" fill="currentColor"
                                stroke-width="0" viewBox="0 0 24 24" role="graphics-document" height="1em" width="1em"
                                xmlns="http://www.w3.org/2000/svg">
                                <title>copy</title>
                                <path fill="none" d="M0 0h24v24H0z"></path>
                                <path
                                    d="M16 1H4c-1.1 0-2 .9-2 2v14h2V3h12V1zm3 4H8c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h11c1.1 0 2-.9 2-2V7c0-1.1-.9-2-2-2zm0 16H8V7h11v14z">
                                </path>
                            </svg>

                            Copy
                        </button>
                    </span>

                    <span class="ml-3 sm:block">
                        <button type="button" id="openEdit{{ $l->id }}"
                            class="inline-flex items-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">

                            <svg class="-ml-0.5 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor"
                                aria-hidden="true">
                                <path
                                    d="M2.695 14.763l-1.262 3.154a.5.5 0 00.65.65l3.155-1.262a4 4 0 001.343-.885L17.5 5.5a2.121 2.121 0 00-3-3L3.58 13.42a4 4 0 00-.885 1.343z" />
                            </svg>
                        </button>
                        @include('pages.links.edit')
                    </span>



                    <!-- Dropdown -->
                    <div class="relative ml-3">
                        <span class="sm:ml-3">
                            <button type="button"
                                class="inline-flex items-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:ring-gray-400"
                                id="mobile-menu-button" aria-expanded="false" aria-haspopup="false">
                                ...
                            </button>
                        </span>

                        <!--
                          Dropdown menu, show/hide based on menu state.
                  
                          Entering: "transition ease-out duration-200"
                            From: "transform opacity-0 scale-95"
                            To: "transform opacity-100 scale-100"
                          Leaving: "transition ease-in duration-75"
                            From: "transform opacity-100 scale-100"
                            To: "transform opacity-0 scale-95"
                        -->
                        <div class="hidden absolute right-0 z-10 -mr-1 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                            role="menu" aria-orientation="vertical" aria-labelledby="mobile-menu-button" tabindex="-1">
                            <!-- Active: "bg-gray-100", Not Active: "" -->
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                                id="mobile-menu-item-0">Edit</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                                id="mobile-menu-item-1">View</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
