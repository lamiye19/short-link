<div class="col-span-full">
    <label for="{{ $id }}" class="block text-sm font-medium leading-6 text-gray-900">{{ $label ?? '' }}</label>
    @isset($info)
        <p class="mt-3 text-sm leading-6 text-gray-600">{{ $info }} </p>
    @endisset
    <div class="mt-2">
        @foreach ($options as $key => $value)
            <div class="flex items-center gap-x-3">
                <input id="{{ $key }}" name="{{ $id }}" value="{{ $key }}" type="radio"
                    class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                <label for="{{ $key }}"
                    class="block text-sm font-medium leading-6 text-gray-900">{{ $value }}</label>
            </div>
        @endforeach
    </div>
    @error($id)
        <small class="text-red-500 mt-2" role="alert">
            <strong>{{ $message }}</strong>
        </small>
    @enderror
</div>
