<x-guest-layout>


        <!-- Card -->
        <div class="bg-[#1e293b] text-white rounded-2xl shadow-2xl w-full max-w-md px-8 py-10 animate-fade-in transform transition duration-500 ease-in-out hover:scale-[1.01] hover:shadow-cyan-500/20">

            <!-- Heading -->
            <div class="flex flex-col items-center mb-6">
                <h2 class="text-2xl font-bold text-cyan-400 text-center mb-2 leading-tight">
                    Forgot your password?
                </h2>
                <p class="text-sm text-gray-300 text-center">
                    No problem. Enter your email below and we'll send you a reset link.
                </p>
            </div>

            <!-- Session Status -->
            @if (session('status'))
                <div class="mb-4 text-sm font-medium text-green-400">
                    {{ session('status') }}
                </div>
            @endif

            <!-- Form -->
            <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
                @csrf

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-200">Email</label>
                    <input id="email" type="email" name="email" :value="old('email')" required autofocus
                        class="mt-1 block w-full rounded-md bg-gray-800 text-white border border-indigo-500 focus:ring-2 focus:ring-cyan-500 focus:outline-none px-3 py-2 transition duration-300 shadow-inner" />
                    
                    @error('email')
                        <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div>
                    <button type="submit"
                        class="w-full flex justify-center items-center gap-2 px-4 py-2 bg-white text-black font-bold rounded-md shadow-md hover:bg-gray-200 transition duration-300 hover:scale-[1.02] active:scale-[0.98]">
                        📧 Email Password Reset Link
                    </button>
                </div>

                <!-- Back to login -->
                <div class="text-center text-sm text-gray-300 pt-2">
                    Remember your password?
                    <a href="{{ route('login') }}" class="text-blue-400 hover:underline transition duration-200">Back to Login</a>
                </div>
            </form>
        </div>

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
