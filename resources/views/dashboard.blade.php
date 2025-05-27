<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-cyan-400 leading-tight text-center animate-fade-in">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-black via-gray-900 to-black min-h-screen animate-fade-in">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#1e293b] text-white overflow-hidden shadow-xl rounded-2xl p-8 transition duration-300 hover:shadow-cyan-500/20 hover:scale-[1.01]">
                <div class="text-center text-xl font-semibold">
                    👋 {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>

    <!-- Fade In Animation -->
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
</x-app-layout>
