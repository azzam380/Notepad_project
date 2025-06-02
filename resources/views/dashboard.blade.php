<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-cyan-400 leading-tight text-center drop-shadow-glow animate-fade-in">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#1e293b] text-white overflow-hidden shadow-xl rounded-2xl p-8 transition duration-300 hover:shadow-cyan-500/20 hover:scale-[1.01]">
                <div class="text-center text-2xl font-bold mb-2">
                    👋 Halo, {{ Auth::user()->name }}!
                </div>
                <p class="text-center text-lg text-gray-300 mb-2">
                    🎯 Selamat datang di dashboard. Semangat beraktivitas! 🚀
                </p>
                <p class="text-center text-sm text-gray-400">
                    🕒 Login pada: <span id="login-time">Memuat waktu...</span>
                </p>
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

    <!-- Waktu Login (JS) -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const now = new Date();
            const formattedTime = now.toLocaleString("id-ID", {
                weekday: 'long', year: 'numeric', month: 'long',
                day: 'numeric', hour: '2-digit', minute: '2-digit'
            });
            document.getElementById("login-time").textContent = formattedTime;
        });
    </script>
</x-app-layout>
