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
            margin: 0; /* Ensure no default margins */
            overflow-x: hidden; /* Prevent horizontal scroll */
        }

        .drop-shadow-glow {
            text-shadow: 0 0 6px #22d3ee, 0 0 12px #0ff;
        }

        /* Ensure canvas stays in the background */
        #particle-canvas {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1; /* Behind all content */
            pointer-events: none; /* Prevent canvas from blocking interactions */
        }
    </style>
</head>
<body class="font-sans antialiased text-gray-100">
    <div class="relative min-h-screen bg-transparent">
        <!-- Canvas for Particle Animation -->
        <canvas id="particle-canvas" class="absolute inset-0 z-0"></canvas>

        @include('layouts.navigation')

        <!-- Page Heading -->
        @isset($header)
            <header class="bg-[#1e293b] text-white shadow-md">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main class="px-4 py-8 rounded-xl">
            {{ $slot }}
        </main>

        <!-- Particle Animation Script -->
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                const canvas = document.getElementById("particle-canvas");
                const ctx = canvas.getContext("2d");

                // Set canvas size to match window
                canvas.width = window.innerWidth;
                canvas.height = window.innerHeight;

                // Handle window resize
                window.addEventListener("resize", () => {
                    canvas.width = window.innerWidth;
                    canvas.height = window.innerHeight;
                });

                // Particle class
                class Particle {
                    constructor() {
                        this.x = Math.random() * canvas.width;
                        this.y = Math.random() * canvas.height;
                        this.size = Math.random() * 2 + 1;
                        this.speedX = Math.random() * 0.5 - 0.25;
                        this.speedY = Math.random() * 0.5 - 0.25;
                        this.opacity = Math.random() * 0.5 + 0.3;
                    }

                    update() {
                        this.x += this.speedX;
                        this.y += this.speedY;

                        // Bounce off edges
                        if (this.x < 0 || this.x > canvas.width) this.speedX *= -1;
                        if (this.y < 0 || this.y > canvas.height) this.speedY *= -1;

                        // Slightly vary opacity for twinkling effect
                        this.opacity += (Math.random() * 0.02 - 0.01);
                        if (this.opacity < 0.3) this.opacity = 0.3;
                        if (this.opacity > 0.8) this.opacity = 0.8;
                    }

                    draw() {
                        ctx.beginPath();
                        ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
                        ctx.fillStyle = `rgba(34, 211, 238, ${this.opacity})`; // Cyan to match drop-shadow-glow (#22d3ee)
                        ctx.fill();
                    }
                }

                // Create particles
                const particles = [];
                const particleCount = 100; // Adjust for density
                for (let i = 0; i < particleCount; i++) {
                    particles.push(new Particle());
                }

                // Animation loop
                function animate() {
                    ctx.clearRect(0, 0, canvas.width, canvas.height);
                    particles.forEach(particle => {
                        particle.update();
                        particle.draw();
                    });
                    requestAnimationFrame(animate);
                }

                animate();
            });
        </script>
    </div>
</body>
</html>