@props([
    'type' => 'text',
    'name' => 'username',
    'id' => 'username',
    'placeholder' => 'Add value',
    'label' => 'Username',
    'span' => null,
])
<div class="mt-5 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
    <div class="sm:col-span-4">
        <label for="{{ $name }}" class="block text-sm/6 font-medium text-gray-900">{{ $label }}</label>
        <div class="mt-2">
            <div
                class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                <input
                    {{ $attributes->merge(['autocomplete' => $name, 'type' => $type, 'name' => $name, 'id' => $id, 'placeholder' => $placeholder]) }}
                    class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm/6">
                  @if (!($span==null))
                  <span class="flex select-none items-center px-3 text-gray-500 sm:text-sm"> {{ $span }}</span>
                  @endif  
            </div>
            @error($id)
                <p class="font-semibold text-xs text-red-500"> {{ $message }}</p>
            @enderror
        </div>
    </div>
</div>
