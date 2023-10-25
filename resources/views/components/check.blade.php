<div class="col-span-full">
    <label for="{{ $id }}" class="block text-sm font-medium leading-6 text-gray-900">{{ $label ?? '' }}</label>
    @isset($info)
        <p class="mt-3 text-sm leading-6 text-gray-600">{{ $info }} </p>
    @endisset
    <div class="mt-2">
        @foreach ($options as $key => $value)
            <div class="relative flex gap-x-3">
                <div class="flex h-6 items-center">
                    <input id="{{ $key }}" name="{{ $id }}" type="checkbox" value="{{ $key ?? '' }}"
                        {{ $controls ?? '' }}
                        class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                </div>
                <div class="text-sm leading-6">
                    <label for="{{ $key }}" class="font-medium text-gray-900">{{ $value }}</label>
                    @isset($info)
                        <p class="text-gray-500">{{ $info }} </p>
                    @endisset
                </div>
            </div>
        @endforeach
    </div>
    @error($id)
        <small class="text-red-500 mt-2" role="alert">
            <strong>{{ $message }}</strong>
        </small>
    @enderror
</div>
