@push ('main-styles')
    <link rel="stylesheet" href="{{asset('vendor/select2/css/select2.min.css')}}"></>
    <link
        rel="stylesheet"
        href="{{asset('vendor/select2-tailwind/css/select2-tailwindcss-theme-plain.css')}}"
    />
    <script src="{{asset('vendor/jquery/jquery-3.7.1.min.js')}}"></script>
    <script src="{{asset('vendor/select2/js/select2.min.js')}}"></script>
@endpush
<x-admin.layout :title="$title" :route="$route">
    {{-- <x-main.header :title="$title" :route="$route">
        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">{{ __("Update your categories") }}</p>
    </x-main.header> --}}

    <div class="max-w-xl">
        <form
            method="post"
            action="{{ isset($user)
                                ?route($route.'.update', $user)
                                :route($route.'.store')
                        }}"
            class="mt-6 space-y-6"
        >
            @csrf
            @if (isset($user))
                @method ('PATCH')
            @endif

            <div>
                <x-input-label for="project_name" :value="__('Project Name')" />
                <x-text-input
                    id="project_name"
                    name="project_name"
                    type="text"
                    class="mt-1 block w-full"
                    :value="old('project_name', $user->project_name ?? '')"
                    required
                    autofocus
                    autocomplete="project_name"
                />
                <x-input-error class="mt-2" :messages="$errors->get('project_name')" />
            </div>
            <div>
                <x-input-label for="project_description" :value="__('Project Description')" />
                <x-text-input
                    id="project_description"
                    name="project_description"
                    type="text"
                    class="mt-1 block w-full"
                    :value="old('project_description', $user->project_description ?? '')"
                    required
                    autofocus
                    autocomplete="project_description"
                />
                <x-input-error class="mt-2" :messages="$errors->get('project_description')" />
            </div>
            <div>
                <x-input-label for="repository_url" :value="__('Repository URL')" />
                <x-text-input
                    id="repository_url"
                    name="repository_url"
                    type="text"
                    class="mt-1 block w-full"
                    :value="old('repository_url', $user->repository_url ?? '')"
                    autofocus
                    autocomplete="repository_url"
                />
                <x-input-error class="mt-2" :messages="$errors->get('repository_url')" />
            </div>
            <div>
                <x-input-label for="start_date" :value="__('Project Start')" />
                <x-text-input
                    id="start_date"
                    name="start_date"
                    type="date"
                    class="mt-1 block w-full"
                    :value="old('start_date', $user->start_date ?? '')"
                    autofocus
                    autocomplete="start_date"
                />
                <x-input-error class="mt-2" :messages="$errors->get('start_date')" />
            </div>
            <div>
                <x-input-label for="end_date" :value="__('Project End')" />
                <x-text-input
                    id="end_date"
                    name="end_date"
                    type="date"
                    class="mt-1 block w-full"
                    :value="old('end_date', $user->end_date ?? '')"
                    autofocus
                    autocomplete="end_date"
                />
                <x-input-error class="mt-2" :messages="$errors->get('end_date')" />
            </div>
            <div>
                <x-input-label for="deploy_date" :value="__('Project Deploy')" />
                <x-text-input
                    id="deploy_date"
                    name="deploy_date"
                    type="date"
                    class="mt-1 block w-full"
                    :value="old('deploy_date', $user->deploy_date ?? '')"
                    autofocus
                    autocomplete="deploy_date"
                />
                <x-input-error class="mt-2" :messages="$errors->get('deploy_date')" />
            </div>
            <div>
                <x-input-label for="status" :value="__('Status')" />

                <select
                    id="status"
                    data-placeholder="Choose one thing"
                    data-allow-clear="1"
                    class="select2 mt-1 block w-full py-2 px-4 rounded-md shadow-sm"
                    name="status"
                >
                    <option value="{{old('status', $user?->status ?? '')}}">
                        @isset ($user)
                            {{ old('status', $user->status?->label()) }}
                        @else
                            {{ __('Choose one thing') }}
                        @endisset
                    </option>
                    @foreach ($project_status as $status)
                        <option value="{{ $status->value }}">
                            {{ ucfirst($status->label()) }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="flex items-center gap-4">
                <x-primary-button>{{ __('Save') }}</x-primary-button>

                @if (session('status') === 'user-stored')
                    <p
                        x-data="{ show: true }"
                        x-show="show"
                        x-transition
                        x-init="setTimeout(() => (show = false), 2000)"
                        class="text-sm text-gray-600 dark:text-gray-400"
                    >{{ __('Saved.') }}</p>
                @endif
            </div>
        </form>
    </div>

    @push ('main-scripts')
        <script src="{{ asset('vendor/select2-tailwind/js/select2-init.js') }}"></script>
    @endpush
    </x-app-layout>
