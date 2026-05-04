@props (['type' => 'info'])

@php
    $styles = [
        'success' => 'border-green-200 bg-green-50 text-green-800 dark:border-green-800 dark:bg-green-900/30 dark:text-green-300',
        'error'   => 'border-red-200 bg-red-50 text-red-800 dark:border-red-800 dark:bg-red-900/30 dark:text-red-300',
        'warning' => 'border-yellow-200 bg-yellow-50 text-yellow-800 dark:border-yellow-800 dark:bg-yellow-900/30 dark:text-yellow-300',
        'info'    => 'border-blue-200 bg-blue-50 text-blue-800 dark:border-blue-800 dark:bg-blue-900/30 dark:text-blue-300',
    ];

    $icons = [
        'success' => '✔',
        'error'   => '✖',
        'warning' => '⚠',
        'info'    => 'ℹ',
    ];
@endphp

@if (session($type))
    <div
        x-data="{ show: true }"
        x-show="show"
        x-transition
        class="my-4 rounded-lg border px-4 py-3 {{ $styles[$type] }}"
    >
        <div class="flex items-start justify-between gap-4">
            <div class="flex items-start gap-2">
                <span class="font-bold">{{ $icons[$type] }}</span>
                <div>{{ session($type) }}</div>
            </div>

            <button @click="show = false" class="text-sm font-bold opacity-60 hover:opacity-100">
                ✕
            </button>
        </div>
    </div>
@endif
