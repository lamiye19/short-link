@extends('layouts.app')

@section('header')
    Create new link
@endsection

@section('content')
    <div class="">
        <form method="post" action="{{ route('links.store') }}">
            @csrf
            <div class="space-y-12">
                <div class="border-b border-gray-900/10 pb-12">
                    <h2 class="text-base font-semibold leading-7 text-gray-900">Create new</h2>
                    <p class="mt-1 text-sm leading-6 text-gray-600">create a new short link</p>

                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                        @include('components.input', [
                            'id' => 'long',
                            'label' => 'Destination',
                            'type' => 'link',
                            'value' => old('long'),
                            'controls' => 'required autofocus placeholder=https://exemple.com/page',
                            'autocomplete' => 'long',
                        ])

                        @include('components.input', [
                            'id' => 'title',
                            'label' => 'Title',
                            'type' => 'text',
                            'value' => old('title'),
                            'controls' => '',
                            'autocomplete' => 'title',
                        ])
                    </div>
                </div>

                <div class="border-b border-gray-900/10 pb-12">
                    <h2 class="text-base font-semibold leading-7 text-gray-900">Ways to share</h2>
                    <p class="mt-1 text-sm leading-6 text-gray-600"></p>


                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <h3 class="text-base font-semibold leading-7 text-gray-900">Short link</h3>
                        <div class="col-span-full">
                            @include('components.input-group', [
                                'id' => 'uuid',
                                'label' => 'Custom back-half (optional)',
                                'before_input' => url('/') . '/',
                                'type' => 'text',
                                'value' => old('uuid'),
                                'controls' => '',
                                'autocomplete' => 'uuid',
                            ])
                        </div>
                    </div>

                    <div class="mt-10 hidden">
                        <h3 class="text-base font-semibold leading-7 text-gray-900">QR Code <span
                                class="font-light">(optional)</span></h3>
                        <div class="mt-5 p-5 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6 bg-gray-300">
                            <div class="sm:col-span-3 space-y-5">
                                <div class="w-10">
                                    @include('components.input', [
                                        'id' => 'color',
                                        'label' => 'Foreground color',
                                        'type' => 'color',
                                        'value' => old('color'),
                                        'controls' => '',
                                    ])
                                </div>
                                @include('components.input', [
                                    'id' => 'logo',
                                    'label' => 'Logo',
                                    'type' => 'file',
                                    'value' => old('logo'),
                                    'controls' => '',
                                ])
                            </div>
                            <div class="sm:col-span-3">
                                <img src="" alt="">
                            </div>

                        </div>

                    </div>

                </div>

                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <button type="reset" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
                    <button type="submit"
                        class="inline-flex items-center rounded-md bg-blue-700 px-3 py-2 text-sm font-semibold text-white shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-900">Create</button>
                </div>
            </div>
        </form>
    </div>
@endsection
