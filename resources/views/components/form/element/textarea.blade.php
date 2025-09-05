<div>
    <label for="{{ $name }}" class="block text-sm font-medium text-gray-700">{{ $title }}</label>
    <textarea id="{{ $name }}" name="{{ $name }}" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old($name) }}</textarea>
    <x-form.element.error :name="$name"/>
</div>
