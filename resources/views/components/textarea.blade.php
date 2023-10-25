<div class="col-span-full">
    <label for="{{ $id }}" class="block text-sm font-medium leading-6 text-gray-900">{{ $label }}</label>
    <div class="mt-2">
        <textarea id="{{ $id }}" name="{{ $id }}" rows="3" {{ $controls ?? '' }}
            class="block w-full placeholder:text-gray-400 px-1 py-1.5 shadow-sm ring-1 sm:text-sm @error($id) ring-red-300 @enderror">
        {{ $value ?? '' }}</textarea>
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
