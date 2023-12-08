@props(['active'])

@php
$classes = ($active ?? false)
            ? 'uppercase inline-flex items-center px-1 pt-1 border-b-3 border-[#ED1C24] dark:border-[#ED1C24] text-sm font-normal leading-5 text-[#ED1C24] dark:text-gray-100 focus:outline-none focus:border-[#ED1C24] transition duration-150 ease-in-out'
            : 'uppercase inline-flex items-center px-1 pt-1 border-b-3 border-transparent text-sm font-normal leading-5 text-[#ED1C24] dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 hover:border-gray-300 dark:hover:border-gray-700 focus:outline-none focus:text-gray-700 dark:focus:text-gray-300 focus:border-gray-300 dark:focus:border-gray-700 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
