@props(['label', 'name', 'type' => 'text'])

<label class="block text-sm font-medium text-gray-700 mb-1">{{ $label }}</label>
@if ($type === 'textarea')
    <textarea name="{{ $name }}" {{ $attributes->merge(['class' => 'w-full rounded-lg border border-gray-300 px-3 py-2 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none']) }}></textarea>
@else
    <input type="{{ $type }}" name="{{ $name }}" {{ $attributes->merge(['class' => 'w-full rounded-lg border border-gray-300 px-3 py-2 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none']) }}>
@endif
