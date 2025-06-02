
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
            margin: 0;
            overflow-x: hidden;
        }

        .drop-shadow-glow {
            text-shadow: 0 0 6px #22d3ee, 0 0 12px #0ff;
        }

        /* Fade-in animation */
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
            animation: fadeIn 0.8s ease-out forwards;
        }

        /* Canvas styling */
        #particle-canvas {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            pointer-events: none;
        }

        /* Logo glow */
        .logo-glow {
            filter: drop-shadow(0 0 12px rgba(34, 211, 238, 0.8));
        }

        /* Form card glow */
        .card-glow {
            box-shadow: 0 0 15px rgba(34, 211, 238, 0.3);
        }
    </style>
</head>
<body class="font-sans antialiased text-gray-100">
    <div class="relative min-h-screen flex items-center justify-center px-4 py-12">
        <!-- Canvas for Particle Animation -->
        <canvas id="particle-canvas" class="absolute inset-0"></canvas>

        <div class="w-full max-w-md space-y-6 animate-fade-in">
            <!-- Logo -->
            <div class="flex justify-center">
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-cyan-400 logo-glow" />
                </a>
            </div>

            <!-- Form Card -->
            <div class="bg-[#1e293b] text-white shadow-lg rounded-xl px-8 py-10 card-glow">
                {{ $slot }}
            </div>
        </div>

        <!-- Particle Animation Script -->
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                const canvas = document.getElementById("particle-canvas");
                const ctx = canvas.getContext("2d");

                // Set canvas size
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
                        this.size = Math.random() * 2.5 + 1;
                        this.speedX = Math.random() * 0.4 - 0.2;
                        this.speedY = Math.random() * 0.4 - 0.2;
                        this.opacity = Math.random() * 0.5 + 0.4;
                    }

                    update() {
                        this.x += this.speedX;
                        this.y += this.speedY;

                        // Bounce off edges
                        if (this.x < 0 || this.x > canvas.width) this.speedX *= -1;
                        if (this.y < 0 || this.y > canvas.height) this.speedY *= -1;

                        // Twinkling effect
                        this.opacity += (Math.random() * 0.03 - 0.015);
                        if (this.opacity < 0.4) this.opacity = 0.4;
                        if (this.opacity > 0.9) this.opacity = 0.9;
                    }

                    draw() {
                        ctx.beginPath();
                        ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
                        ctx.fillStyle = `rgba(34, 211, 238, ${this.opacity})`;
                        ctx.shadowColor = '#22d3ee';
                        ctx.shadowBlur = 8;
                        ctx.fill();
                    }
                }

                // Create particles
                const particles = [];
                const particleCount = 100;
                for (let i = 0; i < particleCount; i++) {
                    particles.push(new Particle());
                }

                // Animation loop with connecting lines
                function animate() {
                    ctx.clearRect(0, 0, canvas.width, canvas.height);
                    particles.forEach(particle => {
                        particle.update();
                        particle.draw();
                    });

                    // Draw connecting lines
                    ctx.strokeStyle = 'rgba(34, 211, 238, 0.1)';
                    ctx.lineWidth = 0.5;
                    for (let i = 0; i < particles.length; i++) {
                        for (let j = i + 1; j < particles.length; j++) {
                            const dx = particles[i].x - particles[j].x;
                            const dy = particles[i].y - particles[j].y;
                            const distance = Math.sqrt(dx * dx + dy * dy);
                            if (distance < 100) {
                                ctx.beginPath();
                                ctx.moveTo(particles[i].x, particles[i].y);
                                ctx.lineTo(particles[j].x, particles[j].y);
                                ctx.stroke();
                            }
                        }
                    }

                    requestAnimationFrame(animate);
                }

                animate();
            });
        </script>
    </div>
</body>
</html>