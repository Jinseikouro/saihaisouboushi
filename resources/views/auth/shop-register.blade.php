<x-guest-layout>
    <form method="POST" action="{{ route('shop-register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Shop-Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Post Code -->
        <div class="mt-4">
            <x-input-label for="post_code" :value="__('Post Code')"/>

            <x-text-input id="post_code" class="block mt-1 w-full" type="text" name="post_code" :value="old('post_code')" required autocomplete="post-code"/>

            <x-input-error :messages="$errors->get('post_code')" class="mt-2" />
        </div>
        
        <div style="color: blue; text-align: right;">{{ __('Please enter the zip code in 7 digits.') }}</div>

        <!-- Address -->
        <div class="mt-4">
            <x-input-label for="address" :value="__('Address')"/>

            <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required autocomplete="address"/>

            <x-input-error :messages="$errors->get('address')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
