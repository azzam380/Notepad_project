<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-extrabold text-cyan-400 drop-shadow-glow animate-fade-in">🧠 My Notes</h2>
    </x-slot>

    <div class="px-6 py-8 bg-gray-950 min-h-[80vh]">
        <div class="flex justify-between items-center flex-wrap gap-4 mb-6 animate-fade-in">
            <div class="flex space-x-4">
                <a href="{{ route('notes.create') }}"
                   class="bg-gradient-to-r from-cyan-500 to-teal-400 hover:from-teal-400 hover:to-cyan-500 text-white font-semibold px-5 py-2 rounded-lg shadow-lg transition duration-300 hover:scale-105">
                    + New Note
                </a>

                <a href="{{ route('notes.export.pdf') }}"
                   class="bg-gradient-to-r from-purple-600 to-pink-500 hover:from-pink-500 hover:to-purple-600 text-white font-semibold px-5 py-2 rounded-lg shadow-lg transition duration-300 hover:scale-105">
                    📄 Export PDF
                </a>
            </div>

            <!-- Form Search -->
            <form method="GET" action="{{ route('notes.index') }}" class="flex items-center">
                <input type="text" name="search"
                       value="{{ request('search') }}"
                       placeholder="🔍 Search notes..."
                       class="px-4 py-2 rounded-lg border border-cyan-500 bg-gray-800 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-cyan-400 transition duration-300 w-64">
                <button type="submit"
                        class="ml-2 px-4 py-2 bg-cyan-600 hover:bg-cyan-500 text-white rounded-lg font-semibold shadow-lg transition duration-300">
                    Search
                </button>
            </form>
        </div>

        <div class="space-y-6">
            @forelse($notes as $note)
                <div class="bg-gray-900 border border-cyan-600 rounded-xl p-6 shadow-lg hover:shadow-cyan-400/40 transition transform hover:scale-[1.01] animate-fade-in">
                    <h3 class="text-xl font-bold text-cyan-300 mb-2">{{ $note->title }}</h3>
                    <p class="text-gray-300">{{ $note->content }}</p>
                    <div class="mt-4 flex space-x-4">
                        <a href="{{ route('notes.edit', $note) }}"
                           class="flex items-center text-cyan-400 hover:text-cyan-300 transition">
                            ✏️ <span class="ml-1">Edit</span>
                        </a>
                        <form method="POST" action="{{ route('notes.destroy', $note) }}" class="inline">
                            @csrf @method('DELETE')
                            <button onclick="return confirm('⚠️ Are you absolutely sure you want to delete this note? This action cannot be undone.')"
                                    class="flex items-center text-red-400 hover:text-red-300 transition">
                                🗑️ <span class="ml-1">Delete</span>
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="text-center text-gray-400 animate-fade-in">📭 No notes found{{ request('search') ? ' for "' . request('search') . '"' : '' }}. Try again!</div>
            @endforelse
        </div>
    </div>

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
            animation: fadeIn 0.5s ease-out both;
        }

        .drop-shadow-glow {
            text-shadow: 0 0 5px #22d3ee, 0 0 10px #22d3ee, 0 0 15px #0ff;
        }
    </style>
</x-app-layout>
