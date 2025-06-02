<x-guest-layout>

        <!-- Card -->

            <div class="flex flex-col items-center mb-6">
                <h2 class="text-3xl font-bold text-cyan-400 text-center leading-tight mb-2 tracking-wide drop-shadow">
                    Welcome to <br> MyNotepad
                </h2>
                <p class="text-sm text-gray-300 text-center max-w-xs">
                    Your secure and simple personal notepad. Write, save, and access anywhere.
                </p>
            </div>

            <!-- Login form -->
            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <!-- Email Address -->
                <div class="transition-all duration-300">
                    <label for="email" class="block text-sm font-medium text-gray-200">Email</label>
                    <input id="email" type="email" name="email" :value="old('email')" required autofocus
                        class="mt-1 block w-full rounded-md bg-gray-800 text-white border border-indigo-500 focus:ring-2 focus:ring-cyan-500 focus:outline-none px-3 py-2 transition-all duration-300 ease-in-out shadow-inner" />
                </div>

                <!-- Password -->
                <div class="transition-all duration-300">
                    <label for="password" class="block text-sm font-medium text-gray-200">Password</label>
                    <input id="password" type="password" name="password" required autocomplete="current-password"
                        class="mt-1 block w-full rounded-md bg-gray-800 text-white border border-indigo-500 focus:ring-2 focus:ring-cyan-500 focus:outline-none px-3 py-2 transition-all duration-300 ease-in-out shadow-inner" />
                </div>

                <!-- Remember Me + Forgot Password -->
                <div class="flex items-center justify-between">
                    <label class="flex items-center text-sm select-none">
                        <input type="checkbox" name="remember" class="rounded border-gray-300 text-cyan-500 shadow-sm focus:ring-cyan-600">
                        <span class="ml-2 text-gray-300">Remember me</span>
                    </label>
                    @if (Route::has('password.request'))
                        <a class="text-sm text-blue-400 hover:underline transition duration-200" href="{{ route('password.request') }}">
                            Forgot password?
                        </a>
                    @endif
                </div>

                <!-- Login Button -->
                <div>
                    <button type="submit"
                        class="w-full flex justify-center items-center gap-2 px-4 py-2 bg-white text-black font-bold rounded-md shadow-md hover:bg-gray-200 transition duration-300 hover:scale-[1.02] active:scale-[0.98]">
                        🔒 LOG IN
                    </button>
                </div>

                <!-- Register -->
                <div class="text-center text-sm text-gray-300 pt-2">
                    Don’t have an account?
                    <a href="{{ route('register') }}" class="text-blue-400 hover:underline transition duration-200">Register</a>
                </div>
            </form>



    <!-- Animasi Keyframe -->
    <style>
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in {
            animation: fadeIn 0.6s ease-out forwards;
        }
    </style>
</x-guest-layout>
