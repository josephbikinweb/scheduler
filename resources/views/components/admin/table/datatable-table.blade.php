{{-- resources/views/components/table.blade.php --}}
@props ([
    'datatable' => false,
    'id' => null,
])

<table
    {{ $attributes->merge([
                'id' => $id,
                'class' => 'min-w-full text-sm text-left border border-gray-200 dark:border-gray-700 rounded-lg overflow-hidden my-1 ' . ($datatable ? 'datatable' : '')
            ]) }}
>
    {{-- HEADER --}}
    <thead class="bg-gray-300 dark:bg-gray-700 text-gray-700 dark:text-gray-300">
        {{ $head }}
    </thead>

    {{-- BODY --}}
    <tbody class="divide-y divide-gray-200 dark:divide-gray-700 text-gray-800 dark:text-gray-200">
        {{ $slot }}
    </tbody>
</table>
