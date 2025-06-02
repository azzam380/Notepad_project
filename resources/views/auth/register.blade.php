<x-guest-layout>

        <!-- Card -->
 

            <!-- Heading -->
            <div class="flex flex-col items-center mb-6">
                <h2 class="text-2xl font-bold text-cyan-400 text-center mb-2 leading-tight">
                    Welcome to <br> MyNotepad
                </h2>
                <p class="text-sm text-gray-300 text-center">
                    Create your free and private notepad account
                </p>
            </div>

            <!-- Form -->
            <form method="POST" action="{{ route('register') }}" class="space-y-6">
                @csrf

                <!-- Username -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-200">Username</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                        class="mt-1 block w-full rounded-md bg-gray-800 text-white border border-indigo-500 focus:ring-2 focus:ring-cyan-500 focus:outline-none px-3 py-2 transition duration-300 shadow-inner" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2 text-sm text-red-400" />
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-200">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required
                        class="mt-1 block w-full rounded-md bg-gray-800 text-white border border-indigo-500 focus:ring-2 focus:ring-cyan-500 focus:outline-none px-3 py-2 transition duration-300 shadow-inner" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-400" />
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-200">Password</label>
                    <input id="password" type="password" name="password" required
                        class="mt-1 block w-full rounded-md bg-gray-800 text-white border border-indigo-500 focus:ring-2 focus:ring-cyan-500 focus:outline-none px-3 py-2 transition duration-300 shadow-inner" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-400" />
                </div>

                <!-- Confirm Password -->
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-200">Confirm Password</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required
                        class="mt-1 block w-full rounded-md bg-gray-800 text-white border border-indigo-500 focus:ring-2 focus:ring-cyan-500 focus:outline-none px-3 py-2 transition duration-300 shadow-inner" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-sm text-red-400" />
                </div>

                <!-- Submit Button -->
                <div>
                    <button type="submit"
                        class="w-full flex justify-center items-center gap-2 px-4 py-2 bg-white text-black font-bold rounded-md shadow-md hover:bg-gray-200 transition duration-300 hover:scale-[1.02] active:scale-[0.98]">
                        Create Account
                    </button>
                </div>

                <!-- Back to login -->
                <div class="text-center text-sm text-gray-300 pt-2">
                    Already have an account?
                    <a href="{{ route('login') }}" class="text-blue-400 hover:underline transition duration-200">Back to Login</a>
                </div>
            </form>
    
    <!-- Animation Keyframe -->
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
