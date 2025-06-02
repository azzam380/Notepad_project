<nav x-data="{ open: false }" class="relative">
    <!-- Sidebar -->
    <div class="fixed inset-y-0 left-0 w-64 bg-[#1e293b] border-r border-cyan-700 shadow-md transform transition-transform duration-300 ease-in-out z-30 sm:translate-x-0" :class="{ '-translate-x-full': !open }">
        <!-- Canvas for Particle Animation -->
        <canvas id="particle-canvas" class="absolute inset-0 z-0 pointer-events-none"></canvas>

        <!-- Logo -->
        <div class="flex items-center justify-between px-4 py-4 border-b border-cyan-800">
            <a href="{{ route('dashboard') }}">
                <x-application-logo class="block h-9 w-auto text-cyan-400" />
            </a>
            <button @click="open = !open" class="sm:hidden text-cyan-400 hover:text-white focus:outline-none">
                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <!-- Navigation Links -->
        <div class="relative z-10 overflow-y-auto h-[calc(100vh-64px)]">
            <div class="px-3 py-2">
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="flex items-center px-4 py-2 text-cyan-300 hover:bg-cyan-600 hover:text-white rounded-lg transition">
                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    {{ __('Dashboard') }}
                </x-nav-link>
                <x-nav-link :href="route('notes.index')" :active="request()->routeIs('notes.*')" class="flex items-center px-4 py-2 text-cyan-300 hover:bg-cyan-600 hover:text-white rounded-lg transition">
                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    {{ __('Notes') }}
                </x-nav-link>
            </div>

            <!-- User Section -->
            <div class="px-3 py-2 border-t border-cyan-800">
                <div class="px-4 py-2 text-cyan-200 font-medium">{{ Auth::user()->name }}</div>
                <x-nav-link :href="route('profile.edit')" class="flex items-center px-4 py-2 text-cyan-300 hover:bg-cyan-600 hover:text-white rounded-lg transition">
                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    {{ __('Profile') }}
                </x-nav-link>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <x-nav-link :href="route('logout')"
                        onclick="event.preventDefault(); this.closest('form').submit();"
                        class="flex items-center px-4 py-2 text-cyan-300 hover:bg-red-600 hover:text-white rounded-lg transition">
                        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                        </svg>
                        {{ __('Log Out') }}
                    </x-nav-link>
                </form>
            </div>

            <!-- Placeholder for Subscriptions -->
            <div class="px-3 py-2 border-t border-cyan-800">
                <div class="px-4 py-2 text-cyan-200 font-medium">{{ __('Subscriptions') }}</div>
                <div class="px-4 py-2 text-cyan-300 opacity-50">{{ __('Coming Soon') }}</div>
            </div>
        </div>
    </div>

    <!-- Overlay for mobile -->
    <div x-show="open" @click="open = false" class="fixed inset-0 bg-black bg-opacity-50 sm:hidden z-20"></div>

    <!-- Particle Animation Script -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const canvas = document.getElementById("particle-canvas");
            const ctx = canvas.getContext("2d");

            // Set canvas size
            canvas.width = 256; // Match sidebar width
            canvas.height = window.innerHeight;

            // Handle window resize
            window.addEventListener("resize", () => {
                canvas.height = window.innerHeight;
            });

            // Particle class
            class Particle {
                constructor() {
                    this.x = Math.random() * canvas.width;
                    this.y = Math.random() * canvas.height;
                    this.size = Math.random() * 2 + 1;
                    this.speedX = Math.random() * 0.3 - 0.15;
                    this.speedY = Math.random() * 0.3 - 0.15;
                    this.opacity = Math.random() * 0.5 + 0.3;
                }

                update() {
                    this.x += this.speedX;
                    this.y += this.speedY;

                    // Bounce off edges
                    if (this.x < 0 || this.x > canvas.width) this.speedX *= -1;
                    if (this.y < 0 || this.y > canvas.height) this.speedY *= -1;

                    // Twinkling effect
                    this.opacity += (Math.random() * 0.02 - 0.01);
                    if (this.opacity < 0.3) this.opacity = 0.3;
                    if (this.opacity > 0.8) this.opacity = 0.8;
                }

                draw() {
                    ctx.beginPath();
                    ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
                    ctx.fillStyle = `rgba(34, 211, 238, ${this.opacity})`;
                    ctx.shadowColor = '#22d3ee';
                    ctx.shadowBlur = 6;
                    ctx.fill();
                }
            }

            // Create particles
            const particles = [];
            const particleCount = 50;
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
                ctx.strokeStyle = 'rgba(34, 211, 238, 0.08)';
                ctx.lineWidth = 0.4;
                for (let i = 0; i < particles.length; i++) {
                    for (let j = i + 1; j < particles.length; j++) {
                        const dx = particles[i].x - particles[j].x;
                        const dy = particles[i].y - particles[j].y;
                        const distance = Math.sqrt(dx * dx + dy * dy);
                        if (distance < 80) {
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

    <style>
        /* Adjust content to not overlap with sidebar */
        @media (min-width: 640px) {
            body {
                margin-left: 256px; /* Match sidebar width */
            }
        }

        /* Ensure sidebar content is above the canvas */
        .relative {
            position: relative;
            z-index: 10;
        }
    </style>
</nav>
