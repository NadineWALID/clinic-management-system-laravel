<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" class="modal-content animate" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="btn-group mt-4" role="group" aria-label="Basic radio toggle button group">
                <input type="radio" class="btn-check" name="user" id="doctor" autocomplete="off" checked>
                <label class="btn btn-outline-primary" for="doctor">Doctor</label>
              
                <input type="radio" class="btn-check" name="user" id="receptionist" autocomplete="off">
                <label class="btn btn-outline-primary" for="receptionist">Receptionist</label>
              
                <input type="radio" class="btn-check" name="user" id="patient" autocomplete="off">
                <label class="btn btn-outline-primary" for="patient">Patient</label>
              </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
                

                <x-jet-button class="ml-4 button">
                    {{ __('Log in') }}
                </x-jet-button>
            </div>
            <div class="flex  justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('register') }}">
                    {{ __('New here?') }}
                </a>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>