<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'MyNotepad') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles & Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background: radial-gradient(circle at top, #0f172a, #000000);
        }

        .drop-shadow-glow {
            text-shadow: 0 0 6px #22d3ee, 0 0 12px #0ff;
        }
    </style>
</head>
<body class="font-sans antialiased text-gray-100">

    <div class="min-h-screen flex items-center justify-center px-4 py-12">
        <div class="w-full max-w-md space-y-6">
            <!-- Logo -->
            <div class="flex justify-center">
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-cyan-400" />
                </a>
            </div>

            <!-- Form Card -->
            <div class="bg-[#1e293b] text-white shadow-lg rounded-xl px-8 py-10">
                {{ $slot }}
            </div>
        </div>
    </div>

</body>
</html>
