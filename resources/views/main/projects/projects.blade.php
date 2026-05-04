@push ('main-styles')
    <link rel="stylesheet" href="{{ asset('vendor/DataTables_2/datatables.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/datatable-tailwind.css') }}" />
@endpush
<x-admin.layout :title="$title" :route="$route">
    <x-admin.table.datatable-table datatable id="iconTable">
        <x-slot name="head">
            <tr>
                <x-admin.table.th>No</x-admin.table.th>
                <x-admin.table.th>Nama</x-admin.table.th>
                <x-admin.table.th>Slug</x-admin.table.th>
                <x-admin.table.th>Description</x-admin.table.th>
                <x-admin.table.th class="!text-right">Action</x-admin.table.th>
            </tr>
        </x-slot>

        @foreach ($projects as $project)
            <tr class="hover:bg-gray-200 dark:hover:bg-gray-800 transition">
                <x-admin.table.td>{{ $loop->iteration }}</x-admin.table.td>
                <x-admin.table.td>{{ ucwords($project->project_name) }}</x-admin.table.td>
                <x-admin.table.td> {{$project->slug}} </x-admin.table.td>
                <x-admin.table.td> {{$project->project_description}} </x-admin.table.td>

                <x-admin.table.td class="text-right whitespace-nowrap">
                    <x-admin.button.edit-button href="{{ route($route.'.edit', $project) }}">
                        edit
                    </x-admin.button.edit-button>

                    <x-admin.button.delete-button
                        :route="$route . '.destroy'"
                        :id="$project->id"
                        :message="'Delete ' . $project->project_name . '?'"
                    >
                        del
                    </x-admin.button.delete-button>
                </x-admin.table.td>
            </tr>
        @endforeach
    </x-admin.table.datatable-table>
    <x-admin.confirm-delete-modal :route="$route"></x-admin.confirm-delete-modal>
    @push ('main-scripts')
        <script src="{{ asset('vendor/DataTables_2/datatables.min.js') }}"></script>
        <script src="{{ asset('assets/js/datatables.js') }}"></script>
        <script src="{{ asset('assets/js/confirm-delete-modal.js') }}"></script>
    @endpush
</x-admin.layout>
