<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-cyan-400 leading-tight text-center animate-fade-in">
            {{ __('My Profile') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-black via-gray-900 to-black min-h-screen animate-fade-in">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-10">

            <!-- Update Profile Info -->
            <div class="p-6 sm:p-8 bg-[#1e293b] text-white shadow-xl rounded-2xl transition hover:shadow-cyan-500/20 hover:scale-[1.01] duration-300 ease-in-out">
                <div class="max-w-2xl mx-auto space-y-4">
                    <h3 class="text-xl font-bold text-cyan-300 mb-4 text-center">Update Profile Information</h3>
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <!-- Update Password -->
            <div class="p-6 sm:p-8 bg-[#1e293b] text-white shadow-xl rounded-2xl transition hover:shadow-cyan-500/20 hover:scale-[1.01] duration-300 ease-in-out">
                <div class="max-w-2xl mx-auto space-y-4">
                    <h3 class="text-xl font-bold text-cyan-300 mb-4 text-center">Update Password</h3>
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!-- Delete User -->
            <div class="p-6 sm:p-8 bg-[#1e293b] text-white shadow-xl rounded-2xl transition hover:shadow-red-500/20 hover:scale-[1.01] duration-300 ease-in-out">
                <div class="max-w-2xl mx-auto space-y-4">
                    <h3 class="text-xl font-bold text-red-400 mb-4 text-center">Delete Account</h3>
                    @include('profile.partials.delete-user-form')
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
