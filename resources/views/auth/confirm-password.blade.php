<x-guest-layout>
    <div class="mb-6 text-gray-300 text-center text-sm max-w-md mx-auto">
        {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
    </div>

    <form method="POST" action="{{ route('password.confirm') }}" class="max-w-md mx-auto bg-[#1e293b] p-8 rounded-xl shadow-lg">
        @csrf

        <!-- Password -->
        <div class="mb-6">
            <x-input-label for="password" :value="__('Password')" class="text-cyan-300 font-semibold" />

            <x-text-input id="password" 
                class="block mt-1 w-full bg-gray-800 border border-cyan-500 rounded-lg p-3 text-white focus:ring-2 focus:ring-cyan-400 outline-none transition" 
                type="password" 
                name="password" 
                required autocomplete="current-password" 
                autofocus
            />

            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-400" />
        </div>

        <div class="flex justify-end">
            <x-primary-button class="bg-cyan-600 hover:bg-cyan-500 active:bg-cyan-700 focus:ring-cyan-400 shadow-lg transition-transform transform hover:scale-105">
                {{ __('Confirm') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
