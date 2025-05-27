<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-cyan-300 drop-shadow-glow animate-fade-in">➕ Create Note</h2>
    </x-slot>

    <div class="my-12 px-4">
        <div class="bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 rounded-2xl shadow-2xl max-w-2xl mx-auto p-6 sm:p-8 border border-cyan-600 animate-fade-in">
            <form method="POST" action="{{ route('notes.store') }}" class="space-y-6">
                @csrf

                <div>
                    <label class="block text-teal-300 font-semibold mb-1">📝 Title</label>
                    <input type="text" name="title" value="{{ old('title') }}"
                        class="w-full bg-gray-800 border border-teal-500 text-white rounded-lg p-3 focus:ring-2 focus:ring-cyan-500 outline-none transition duration-200"
                        placeholder="Enter a title..." required>
                </div>

                <div>
                    <label class="block text-teal-300 font-semibold mb-1">🧾 Content</label>
                    <textarea name="content" rows="6"
                        class="w-full bg-gray-800 border border-teal-500 text-white rounded-lg p-3 focus:ring-2 focus:ring-cyan-500 outline-none transition duration-200"
                        placeholder="Write your note here..." required>{{ old('content') }}</textarea>
                </div>

                <div class="flex justify-between items-center pt-4">
                    <a href="{{ route('notes.index') }}"
                       class="bg-gray-700 hover:bg-gray-600 text-white px-5 py-2 rounded-full transition shadow-md hover:scale-105">
                        ⬅ Back
                    </a>
                    <button
                        class="bg-gradient-to-r from-teal-500 to-cyan-400 hover:from-cyan-400 hover:to-teal-500 text-white px-6 py-3 rounded-full shadow-lg transition hover:scale-105">
                        💾 Save Note
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Styling -->
    <style>
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(15px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in {
            animation: fadeIn 0.6s ease-out both;
        }

        .drop-shadow-glow {
            text-shadow: 0 0 6px #22d3ee, 0 0 12px #0ff;
        }
    </style>
</x-app-layout>
