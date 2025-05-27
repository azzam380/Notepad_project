<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>📝 MyNotepad</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-gray-900 via-black to-gray-900 min-h-screen flex items-center justify-center px-6">

    <div class="text-center max-w-md w-full">
        <!-- Emoji Logo -->
        <div class="text-7xl mb-4 animate-bounce">📝</div>

        <!-- Heading -->
        <h1 class="text-4xl font-extrabold bg-gradient-to-r from-cyan-400 to-teal-400 bg-clip-text text-transparent mb-3">
            Welcome to MyNotepad
        </h1>

        <!-- Subtext -->
        <p class="text-gray-300 mb-6">
            Your secure and simple personal notepad. Write, save, and access anywhere.
        </p>

        <!-- Features -->
        <ul class="text-left text-gray-300 mb-8 space-y-2 max-w-xs mx-auto">
            <li class="flex items-center">✅ <span class="ml-2">CRUD Notes</span></li>
            <li class="flex items-center">🔒 <span class="ml-2">Secure Authentication</span></li>
            <li class="flex items-center">📄 <span class="ml-2">Export to PDF</span></li>
            <li class="flex items-center">🌐 <span class="ml-2">Responsive Design</span></li>
        </ul>

        <!-- Action Buttons -->
        <div class="flex justify-center gap-4">
            <a href="{{ route('login') }}"
               class="bg-cyan-500 hover:bg-cyan-400 px-6 py-3 rounded-full font-semibold text-white transition">
                🔑 Login
            </a>
            <a href="{{ route('register') }}"
               class="bg-purple-500 hover:bg-purple-400 px-6 py-3 rounded-full font-semibold text-white transition">
                🆕 Register
            </a>
        </div>
    </div>

</body>
</html>
