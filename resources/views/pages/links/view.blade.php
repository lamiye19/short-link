@extends('layouts.app')

@section('header')
    @php
        $domain = parse_url($l->long, PHP_URL_HOST);
    @endphp
    <div class="sm:flex sm:justify-between p-4 m-3">
        <div class="hidden md:mr-4 sm:block">
            <img class="inline-block h-8 w-8 rounded-full ring-2 ring-white"
                src="{{ env('GET_FAVICON') . $domain . env('FAVICON_SIZE') }}" alt="{{ 'Favicon for ' . $domain }}" />
        </div>

        <div class="min-w-0 flex-1">
            <h2 class="font-bold text-md leading-7 text-gray-900 sm:truncate sm:tracking-tight">
                {{ $l->title ?? 'Untitled ' . $l->created_at }}</h2>
            <span class="block mb-3">
                <a href="{{ $l->short }}" class="mt-2 inline-flex text-sm" target="_blank">
                    <svg class="-ml-0.5 mr-1.5 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor"
                        aria-hidden="true">
                        <path
                            d="M12.232 4.232a2.5 2.5 0 013.536 3.536l-1.225 1.224a.75.75 0 001.061 1.06l1.224-1.224a4 4 0 00-5.656-5.656l-3 3a4 4 0 00.225 5.865.75.75 0 00.977-1.138 2.5 2.5 0 01-.142-3.667l3-3z" />
                        <path
                            d="M11.603 7.963a.75.75 0 00-.977 1.138 2.5 2.5 0 01.142 3.667l-3 3a2.5 2.5 0 01-3.536-3.536l1.225-1.224a.75.75 0 00-1.061-1.06l-1.224 1.224a4 4 0 105.656 5.656l3-3a4 4 0 00-.225-5.865z" />
                    </svg>
                    <span class="text-blue-500">{{ $l->short }}</span>
                </a>

                <a href="{{ $l->long }}" class="text-gray-950 mt-2 inline-flex text-sm ml-6"
                    target="_blank">{{ $l->long }}</a>
            </span>

            <div class="mt-8 flex flex-col sm:mt-0 sm:flex-row sm:flex-wrap sm:space-x-6">
                <div class="mt-2 flex items-center text-sm text-gray-500">
                    <svg class="mr-1.5 h-5 w-5 flex-shrink-0 text-gray-400" stroke="currentColor" fill="currentColor"
                        stroke-width="0" viewBox="0 0 24 24" role="graphics-document" height="1em" width="1em"
                        xmlns="http://www.w3.org/2000/svg">
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
                <button type="button" onclick="copyToClipboard({{ json_encode($l->short) }})"
                    class="w-full inline-flex items-center rounded-md bg-gray-300 px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                    <i class="bx bxs-copy fs-2 bx-rotate-270 -ml-0.5 mr-1.5 h-5 w-5 text-gray-400"></i>
                    Copy
                </button>
            </span>

            <span class="ml-3 sm:block">
                <button type="button" id="openEdit{{ $l->id }}"
                    class="inline-flex items-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                    <i class="bx bx-edit-alt my-1"></i>

                </button>
                @include('pages.links.edit')
            </span>
        </div>
    </div>
@endsection

@section('header_button')
@endsection

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <div class="space-y-10">
        <div class="sm:flex sm:justify-between bg-white shadow-lg p-4 m-3">
            @if (count($l->clicked) > 0)
                <div class="sm:w-1/2 p-2">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        #
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Date
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Pays
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($l->clicked as $elt)
                                    <tr
                                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $loop->iteration }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $elt->created_at }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $elt->country }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif

            <div class="sm:w-1/2 p-2">
                <h3>Nombre de clics par pays</h3>
                <canvas id="clicksChart" style="height: 300px; width: 100%;"></canvas>
            </div>
        </div>

        <script>
            const clicksData = @json($l->clicked->groupBy('country')->map->count());

            const countries = Object.keys(clicksData);
            const clicks = Object.values(clicksData);

            const ctx = document.getElementById('clicksChart').getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: countries,
                    datasets: [{
                        label: 'Nombre de clics',
                        data: clicks,
                        backgroundColor: 'rgba(75, 192, 192, 0.5)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>

    </div>
@endsection
