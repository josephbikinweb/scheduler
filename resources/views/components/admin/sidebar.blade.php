<aside
    x-cloak
    class="fixed sm:static w-64 min-h-screen border-r border-gray-200 bg-white dark:border-gray-600 dark:bg-gray-800 transform transition-all duration-300 ease-in-out sm:translate-x-0"
    :class="open ? 'translate-x-0' : '-translate-x-full'"
>
    <nav class="px-5 py-5">
        <x-admin.sidebar-item
            href="{{ route('dashboard') }}"
            :active="request()->routeIs('dashboard')"
        >
            {{ __('Dashboard') }}
        </x-admin.sidebar-item>
        <x-admin.dropdown title="Projects" :active="request()->routeIs('projects.*')">
            <x-admin.dropdown-item
                href="{{ route('projects.index') }}"
                :active="request()->routeIs('projects.index')"
            >
                {{ucwords(__('List'))}}
            </x-admin.dropdown-item>

            <x-admin.dropdown-item
                href="{{ route('projects.create') }}"
                :active="request()->routeIs('projects.create') || request()->routeIs('projects.edit')"
            >
                Create
            </x-admin.dropdown-item>
        </x-admin.dropdown>
        <x-admin.dropdown title="Users" :active="request()->routeIs('users.*')">
            <x-admin.dropdown-item
                href="{{ route('users.index') }}"
                :active="request()->routeIs('users.index')"
            >
                {{ucwords(__('List'))}}
            </x-admin.dropdown-item>

            <x-admin.dropdown-item
                href="{{ route('users.create') }}"
                :active="request()->routeIs('users.create') || request()->routeIs('users.edit')"
            >
                Create
            </x-admin.dropdown-item>
        </x-admin.dropdown>
    </nav>
</aside>
