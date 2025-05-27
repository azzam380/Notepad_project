<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error 403 - Akses Ditolak</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background: linear-gradient(135deg, #0f172a, #1e293b);
        }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen">
    <div class="bg-[#1e293b] shadow-2xl rounded-2xl p-10 max-w-md text-center border border-red-600 animate-fade-in">
        <h1 class="text-5xl font-extrabold text-red-500 mb-4 animate-pulse drop-shadow-lg">403</h1>
        <h2 class="text-2xl font-semibold text-cyan-400 mb-4">Akses Ditolak</h2>
        <p class="text-gray-300 mb-3">
            Maaf, Anda tidak memiliki izin untuk mengakses halaman ini.
        </p>
        <p class="text-gray-400 text-sm mb-6">
            Silakan kembali ke halaman sebelumnya atau hubungi administrator jika Anda merasa ini adalah sebuah kesalahan.
        </p>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button 
                type="submit"
                class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-5 rounded-full shadow-md transition duration-300 transform hover:scale-105 hover:shadow-xl"
            >
                Keluar dari Akun
            </button>
        </form>
    </div>

    <style>
        @keyframes fade-in {
            0% { opacity: 0; transform: translateY(-10px); }
            100% { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in {
            animation: fade-in 0.8s ease-out;
        }
    </style>
</body>
</html>
