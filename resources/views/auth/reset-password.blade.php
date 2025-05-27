<x-guest-layout>
    <form method="POST" action="{{ route('password.store') }}" class="max-w-md mx-auto bg-[#1e293b] p-8 rounded-xl shadow-lg space-y-6 text-gray-300">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" class="text-cyan-400" />
            <x-text-input 
                id="email" 
                class="block mt-1 w-full bg-gray-800 border border-cyan-600 rounded-md text-white focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 transition"
                type="email" 
                name="email" 
                :value="old('email', $request->email)" 
                required 
                autofocus 
                autocomplete="username" 
            />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500" />
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Password')" class="text-cyan-400" />
            <x-text-input 
                id="password" 
                class="block mt-1 w-full bg-gray-800 border border-cyan-600 rounded-md text-white focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 transition"
                type="password" 
                name="password" 
                required 
                autocomplete="new-password" 
            />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500" />
        </div>

        <!-- Confirm Password -->
        <div>
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-cyan-400" />
            <x-text-input 
                id="password_confirmation" 
                class="block mt-1 w-full bg-gray-800 border border-cyan-600 rounded-md text-white focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 transition"
                type="password" 
                name="password_confirmation" 
                required 
                autocomplete="new-password" 
            />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-500" />
        </div>

        <div class="flex items-center justify-end">
            <x-primary-button class="bg-cyan-600 hover:bg-cyan-500 active:bg-cyan-700 focus:ring-cyan-400 shadow-lg transition-transform transform hover:scale-105">
                {{ __('Reset Password') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
