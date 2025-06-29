@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block w-full ps-3 pe-4 py-2 border-l-4 border-gray-600 text-start text-base font-medium text-gray-900 bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-100 focus:border-gray-700 transition duration-150 ease-in-out'
            : 'block w-full ps-3 pe-4 py-2 border-l-4 border-transparent text-start text-base font-medium text-gray-600 hover:text-gray-900 hover:bg-gray-50 hover:border-gray-400 focus:outline-none focus:text-gray-900 focus:bg-gray-50 focus:border-gray-400 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
