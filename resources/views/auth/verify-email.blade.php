<x-guest-layout>
    <div class="mb-6 text-gray-300 text-center text-base max-w-md mx-auto">
        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div 
          class="mb-6 max-w-md mx-auto font-semibold text-green-400 bg-green-900 bg-opacity-30 border border-green-500 rounded-lg p-4 text-center animate-fade-in"
          role="alert"
        >
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </div>
    @endif

    <div class="mt-6 flex justify-center space-x-6 max-w-md mx-auto">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <x-primary-button 
                class="bg-cyan-600 hover:bg-cyan-500 active:bg-cyan-700 focus:ring-cyan-400 shadow-lg transition-transform transform hover:scale-105"
            >
                {{ __('Resend Verification Email') }}
            </x-primary-button>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button 
                type="submit" 
                class="underline text-sm text-gray-400 hover:text-cyan-400 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500 transition"
            >
                {{ __('Log Out') }}
            </button>
        </form>
    </div>

    <style>
        @keyframes fade-in {
            0% { opacity: 0; transform: translateY(-6px); }
            100% { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in {
            animation: fade-in 0.6s ease forwards;
        }
    </style>
</x-guest-layout>
