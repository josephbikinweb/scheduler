@props ([
    'active' => false,
    'href' => '#'
])

<div class="py-3">
    <a
        href="{{ $href }}"
        {{ $attributes->merge([
        'class' => 'block rounded transition duration-150 ease-in-out '
        . ($active
            ? 'text-orange-400 font-semibold'
            : 'dark:text-gray-400 hover:text-gray-200 dark:hover:text-white'
        )
    ]) }}
    >
        {{ $slot }}
    </a>
</div>
