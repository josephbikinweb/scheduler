@props ([
    'active' => false,
    'href' => '#'
])

<a
    href="{{ $href }}"
    {{ $attributes->merge([
        'class' => 'block px-2 py-1 rounded transition duration-150 ease-in-out ' .
        ($active
            ? 'bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-white font-semibold'
            : 'dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-gray-900 dark:hover:text-white'
        )
    ]) }}
>
    {{ $slot }}
</a>
