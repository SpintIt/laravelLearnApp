<div class="flex items-center">
    <input type="checkbox" {{ $attributes->merge(['checked' => !!old($name) ]) }} id="{{ $name }}" name="{{ $name }}" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
    <label for="{{ $name }}" class="ml-2 block text-sm text-gray-900">{{ $title }}</label>
    <x-form.element.error :name="$name"/>
</div>
