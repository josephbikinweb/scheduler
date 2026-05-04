<a
    {{ $attributes->merge(['class' => 'inline-flex items-center px-4 py-2 rounded-md text-xs tracking-widest transition ease-in-out duration-150 self-end h-10 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800']) }}
>
    {{ $slot }}
</a>
