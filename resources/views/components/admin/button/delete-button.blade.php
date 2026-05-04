@props ([
    'route',
    'id',
    'label' => 'del',
    'message' => 'Are you sure?',
])

<button
    type="button"
    class="text-red-500 hover:underline"
    onclick="showDeleteModal(
        '{{ $message }}',
        '{{ route($route, $id) }}'
    )"
>
    {{ $slot }}
</button>
