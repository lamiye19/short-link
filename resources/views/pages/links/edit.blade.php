<div class="relative z-10 hidden" id="edit{{ $l->id }}" aria-labelledby="modal-title" role="dialog"
    aria-modal="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
            <!--
          Modal panel, show/hide based on modal state.
  
          Entering: "ease-out duration-300"
            From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            To: "opacity-100 translate-y-0 sm:scale-100"
          Leaving: "ease-in duration-200"
            From: "opacity-100 translate-y-0 sm:scale-100"
            To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        -->
            <div
                class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                            
                        <div class="sm:flex sm:justify-between">
                            <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">Edit link
                            </h3>
                            <button class="" onclick="document.querySelector('#edit{{ $l->id }}').classList.add('hidden')">
                                ×
                            </button>
                        </div>
                            <form method="post" action="{{ route('links.update', ['uuid' => $l->uuid]) }}">
                                @csrf
                                <div class="space-y-12">
                                    <div class="border-b border-gray-900/10 pb-12">

                                        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                                            @include('components.input', [
                                                'id' => 'title',
                                                'label' => 'Title',
                                                'type' => 'text',
                                                'value' => old('title'),
                                                'controls' => '',
                                                'value' => $l->title,
                                                'autocomplete' => 'title',
                                            ])

                                            <div class="col-span-full">
                                                @include('components.input-group', [
                                                    'id' => 'uuid',
                                                    'label' => 'Custom back-half (optional)',
                                                    'before_input' => url('/') . '/',
                                                    'type' => 'text',
                                                    'value' => $l->uuid,
                                                    'controls' => '',
                                                    'autocomplete' => 'uuid',
                                                ])
                                            </div>
                                            @include('components.input', [
                                                'id' => 'long',
                                                'label' => 'Destination',
                                                'type' => 'link',
                                                'value' => $l->long,
                                                'controls' => '',
                                                'value' => $l->title,
                                                'autocomplete' => 'long',
                                            ])
                                        </div>
                                    </div>

                                    <div class="pb-12">

                                        <div class="mt-10">
                                            <h3 class="text-base font-semibold leading-7 text-gray-900">QR Code <span
                                                    class="font-light">(optional)</span></h3>
                                            <div
                                                class="mt-5 p-5 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6 bg-gray-300">
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
                                        <button type="reset"
                                            class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
                                        <button type="submit"
                                            class="inline-flex items-center rounded-md bg-blue-700 px-3 py-2 text-sm font-semibold text-white shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-900">Edit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    // JavaScript to show the modal
    const modal{{ $l->id }} = document.querySelector("#edit{{ $l->id }}");
    const openButton{{ $l->id }} = document.querySelector('#openEdit{{ $l->id }}');
    const closeButton{{ $l->id }} = document.querySelector('#closeEdit{{ $l->id }}');

    openButton{{ $l->id }}.addEventListener('click', () => {
        modal{{ $l->id }}.classList.remove('hidden');
    });

    closeButton{{ $l->id }}.addEventListener('click', () => {
        modal{{ $l->id }}.classList.add('hidden');
    });
</script>
