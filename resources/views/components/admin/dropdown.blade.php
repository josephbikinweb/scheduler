@props (['title', 'active' => false])

<div x-data="{ open: {{ $active ? 'true' : 'false' }} }">
    <!-- HEADER -->
    <button
        @click="open = !open"
        class="w-full flex justify-between items-center py-2 text-left font-semibold dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-200
        {{ $active
            ? 'text-white dark:text-white'
            : 'text-gray-400 hover:text-gray-900 dark:hover:text-gray-200'
        }}
        "
    >
        <span>{{ $title }}</span>

        <svg
            :class="{ 'rotate-180': open }"
            class="w-4 h-4 transition-transform"
            fill="none"
            stroke="currentColor"
            viewBox="0 0 24 24"
        >
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
    </button>

    <!-- ITEMS -->
    <div x-show="open" x-transition class="pl-3 space-y-2">{{ $slot }}</div>
</div>
