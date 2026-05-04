<section>
    @push ('main-styles')
        <link rel="stylesheet" href="{{asset('vendor/select2/css/select2.min.css')}}"></>
        <link
            rel="stylesheet"
            href="{{asset('vendor/select2-tailwind/css/select2-tailwindcss-theme-plain.css')}}"
        />
        <script src="{{asset('vendor/jquery/jquery-3.7.1.min.js')}}"></script>
        <script src="{{asset('vendor/select2/js/select2.min.js')}}"></script>
    @endpush
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>
    <x-alert type="success" />
    <x-alert type="error" />
    <x-alert type="warning" />
    <x-alert type="info" />

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method ('patch')
        <div>
            <x-input-label for="user_name" :value="__('Name')" />
            <x-text-input
                id="user_name"
                name="user_name"
                type="text"
                class="mt-1 block w-full"
                :value="old('user_name', $user->user_name)"
                required
                autofocus
                autocomplete="user_name"
            />
            <x-input-error class="mt-2" :messages="$errors->get('user_name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input
                id="email"
                name="email"
                type="email"
                class="mt-1 block w-full"
                :value="old('email', $user->email)"
                required
                autocomplete="username"
            />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                        {{ __('Your email address is unverified.') }}

                        <button
                            form="send-verification"
                            class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                        >
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div>
            <x-input-label for="nickname" :value="__('NickName')" />
            <x-text-input
                id="nickname"
                name="nickname"
                type="text"
                class="mt-1 block w-full"
                :value="old('nickname', $user->nickname)"
                required
                autofocus
                autocomplete="nickname"
            />
            <x-input-error class="mt-2" :messages="$errors->get('nickname')" />
        </div>
        <div>
            <x-input-label for="phone" :value="__('Phone')" />
            <x-text-input
                id="phone"
                name="phone"
                type="number"
                class="mt-1 block w-full"
                :value="old('phone', $user->phone)"
                autofocus
                autocomplete="phone"
            />
            <x-input-error class="mt-2" :messages="$errors->get('phone')" />
        </div>
        <div>
            <x-input-label for="phone2" :value="__('Phone2')" />
            <x-text-input
                id="phone2"
                name="phone2"
                type="number"
                class="mt-1 block w-full"
                :value="old('phone2', $user->phone2)"
                autofocus
                autocomplete="phone2"
            />
            <x-input-error class="mt-2" :messages="$errors->get('phone2')" />
        </div>
        <div>
            <x-input-label for="address" :value="__('Address')" />
            <x-text-input
                id="address"
                name="address"
                type="text"
                class="mt-1 block w-full"
                :value="old('address', $user->address)"
                autofocus
                autocomplete="address"
            />
            <x-input-error class="mt-2" :messages="$errors->get('address')" />
        </div>
        <div>
            <x-input-label for="gender" :value="__('Gender')" />
            <x-select2-single
                id="gender"
                name="gender"
                :options="[
                    ['value' => 1, 'label' => 'Male'],
                    ['value' => 0, 'label' => 'Female'],
                ]"
                option-label="label"
                option-value="value"
                :selected="old('gender', $user->gender)"
            />
            <x-input-error class="mt-2" :messages="$errors->get('gender')" />
        </div>
        <div>
            <x-input-label for="isActive" :value="__('Active ?')" />
            <x-select2-single
                id="isActive"
                name="isActive"
                :options="[
                    ['value' => 1, 'label' => 'Active'],
                    ['value' => 0, 'label' => 'Not Active'],
                ]"
                option-label="label"
                option-value="value"
                :selected="old('isActive', $user->isActive)"
                autofocus
                autocomplete="isActive"
            />
            <x-input-error class="mt-2" :messages="$errors->get('isActive')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
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
    @push ('main-scripts')
        <script src="{{ asset('vendor/select2-tailwind/js/select2-init.js') }}"></script>
    @endpush
</section>
