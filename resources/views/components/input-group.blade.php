<div class="col-span-full">
    <label for="{{ $id }}" class="block text-sm font-medium leading-6 text-gray-900">{{ $label }}</label>
    <div class="mt-2">
        <div
            class="flex shadow-sm ring-1 ring-inset focus-within:ring-2 focus-within:ring-inset sm:max-w-md @error($id) ring-red-300 @enderror">
            @isset($before_input)
                <span class="flex select-none items-center pl-3 pr-4 text-gray-500 sm:text-sm">{!! $before_input !!}</span>
            @endisset
            <input id="{{ $id }}" name="{{ $id }}" type="{{ $type ?? 'text' }}"
                autocomplete="{{ $autocomplete ?? '' }}" value="{{ $value ?? '' }}" {{ $controls ?? '' }}
                class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6 @error($id) ring-red-300 @enderror">
            @isset($after_input)
                <span class="flex select-none items-center pl-3 text-gray-500 sm:text-sm">{{ $after_input }}</span>
            @endisset
        </div>
    </div>
    @isset($info)
        <p class="mt-3 text-sm leading-6 text-gray-600">{{ $info }} </p>
    @endisset

    @error($id)
        <small class="text-red-500 mt-2" role="alert">
            <strong>{{ $message }}</strong>
        </small>
    @enderror
</div>
