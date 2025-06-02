<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>📝 MyNotepad</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&family=Fredoka+One&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            overflow-x: hidden;
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

        /* Glow effect for logo */
        .logo-glow {
            filter: drop-shadow(0 0 12px rgba(34, 211, 238, 0.8));
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
    </style>
</head>
<body class="bg-gradient-to-br from-gray-900 via-black to-gray-900 min-h-screen flex items-center justify-center px-6 relative">
    <!-- Canvas for Particle Animation -->
    <canvas id="particle-canvas" class="absolute inset-0"></canvas>

    <div class="text-center max-w-md w-full animate-fade-in">
        <!-- Emoji Logo -->
        <div class="text-8xl mb-6 logo-glow">📝</div>

        <!-- Heading -->
        <h1 class="text-4xl sm:text-5xl font-extrabold bg-gradient-to-r from-cyan-400 to-teal-400 bg-clip-text text-transparent mb-4">
            Welcome to MyNotepad
        </h1>

        <!-- Subtext -->
        <p class="text-gray-200 text-lg sm:text-xl mb-8 max-w-sm mx-auto">
            Your secure, simple, and stylish personal notepad. Write, save, and access anywhere.
        </p>

        <!-- Features -->
        <ul class="text-left text-gray-200 mb-10 space-y-3 max-w-xs mx-auto">
            <li class="flex items-center text-base sm:text-lg">
                <span class="text-cyan-400 mr-2">✅</span> CRUD Notes
            </li>
            <li class="flex items-center text-base sm:text-lg">
                <span class="text-cyan-400 mr-2">🔒</span> Secure Authentication
            </li>
            <li class="flex items-center text-base sm:text-lg">
                <span class="text-cyan-400 mr-2">📄</span> Export to PDF
            </li>
            <li class="flex items-center text-base sm:text-lg">
                <span class="text-cyan-400 mr-2">🌐</span> Responsive Design
            </li>
        </ul>

        <!-- Action Buttons -->
        <div class="flex justify-center gap-4 sm:gap-6">
            <a href="{{ route('login') }}"
               class="bg-cyan-500 hover:bg-cyan-400 px-6 sm:px-8 py-3 sm:py-4 rounded-full font-semibold text-white transition duration-300 hover:shadow-[0_0_15px_rgba(34,211,238,0.6)] text-base sm:text-lg">
                🔑 Login
            </a>
            <a href="{{ route('register') }}"
               class="bg-purple-500 hover:bg-purple-400 px-6 sm:px-8 py-3 sm:py-4 rounded-full font-semibold text-white transition duration-300 hover:shadow-[0_0_15px_rgba(147,51,234,0.6)] text-base sm:text-lg">
                🆕 Register
            </a>
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
                    this.color = Math.random() > 0.5 ? 'rgba(34, 211, 238, ' : 'rgba(45, 212, 191, ';
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
                    ctx.fillStyle = `${this.color}${this.opacity})`;
                    ctx.shadowColor = this.color.includes('34, 211, 238') ? '#22d3ee' : '#2dd4bf';
                    ctx.shadowBlur = 8;
                    ctx.fill();
                }
            }

            // Create particles
            const particles = [];
            const particleCount = 120;
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
</body>
</html>
