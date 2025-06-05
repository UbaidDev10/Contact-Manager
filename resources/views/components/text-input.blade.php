@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-gray-300 bg-white text-gray-900 focus:border-gray-500 focus:ring-gray-500 rounded-md shadow-sm']) }}>
