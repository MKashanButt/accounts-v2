@props(['disabled' => false])

<input @disabled($disabled)
    {{ $attributes->merge(['class' => 'border-gray-300 focus:border-green-800 focus:ring-green-600 rounded-sm shadow-sm']) }}>
