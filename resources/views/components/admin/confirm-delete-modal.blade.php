@props ([
    'route',
])
<div id="deleteModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/50">
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg w-full max-w-md p-6">
        <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Confirm Delete</h2>

        <p id="deleteModalMessage" class="mt-2 text-sm text-gray-600 dark:text-gray-400"></p>

        <div class="mt-4 flex justify-end gap-2">
            <button onclick="closeDeleteModal()" class="px-4 py-2 bg-gray-300 rounded">
                Cancel
            </button>

            <form id="deleteForm" method="POST">
                @csrf
                @method ('DELETE')

                <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded">
                    Delete
                </button>
            </form>
        </div>
    </div>
</div>
