@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 dark:border-indigo-600 text-sm font-medium leading-5 text-blue-800 dark:text-blue-400 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-blue-600 dark:text-blue-300 hover:text-blue-700 dark:hover:text-blue-400 hover:border-blue-400 dark:hover:border-blue-500 focus:outline-none focus:text-blue-700 dark:focus:text-blue-400 focus:border-blue-400 dark:focus:border-blue-500 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>

