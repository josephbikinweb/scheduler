<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>{{ config('app.name', 'Laravel') }}</title>

    <script src="{{ asset('assets/js/init-theme.js') }}"></script>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net" />
    <link
        href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap"
        rel="stylesheet"
    />
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}" />

    @stack ('main-styles')
    <!-- Scripts -->
    @vite (['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
    <div
        x-data="{ open: false }"
        @toggle-sidebar.window="open = !open"
        class="min-h-screen bg-gray-100 dark:bg-gray-900"
    >
        <x-admin.header></x-admin.header>
        <div class="flex">
            <x-admin.sidebar></x-admin.sidebar>
            <div class="flex-1">
                <header class="bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-200 shadow">
                    <div class="w-full mx-auto py-6 px-4 sm:px-6 lg:px-8 font-semibold">
                        <div class="flex items-center gap-4 justify-between">
                            {{ $title ?? 'Dashboard' }}
                            @if (request()->routeIs($route.'.index'))
                                <x-admin.button.add-button href="{{ route($route.'.create') }}">
                                    {{ __('Add') }}
                                </x-admin.button.add-button>
                            @endif
                        </div>
                    </div>
                </header>

                <!-- Page Content -->
                <main class="flex-1">
                    <div class="py-12">
                        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
                            <x-alert type="success" />
                            <x-alert type="error" />
                            <x-alert type="warning" />
                            <x-alert type="info" />
                            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow rounded-lg">
                                {{ $slot }}
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>
    @stack ('main-scripts')
</body>
</html>
