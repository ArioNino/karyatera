<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KaryaTera | Portofolio</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        html, body {
            overflow-x: hidden;
            max-width: 100%;
        }

        body {
            background: radial-gradient(circle at top left, #1a002e, #000);
            color: #fff;
            font-family: 'Poppins', sans-serif;
        }

        .neon-text {
            text-shadow: 0 0 6px #f0f, 0 0 15px #a855f7, 0 0 25px #9333ea;
        }

        .glass-box {
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(12px);
            border-radius: 1rem;
        }

        .filter-active {
            background-color: #d946ef !important;
            color: white !important;
            border-color: #f0abfc !important;
        }

        #mobileMenu {
            transition: max-height 0.3s ease, opacity 0.3s ease;
            max-height: 0;
            opacity: 0;
            overflow: hidden;
        }

        #mobileMenu.open {
            max-height: 300px;
            opacity: 1;
        }

        /* Centered flex cards */
        .card-grid {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 2rem;
        }

        .card-item {
            width: 100%;
        }

        @media (min-width: 768px) {
            .card-item {
                width: calc(33.333% - 1.5rem);
                max-width: 360px;
            }
        }
    </style>
</head>

<body>

    {{-- NAVBAR --}}
    <nav class="fixed top-0 left-0 w-full bg-black/40 backdrop-blur-md border-b border-white/10 z-50">
        <div class="max-w-6xl mx-auto flex justify-between items-center py-4 px-6">
            {{-- LOGO --}}
            <a href="/" class="flex items-center">
                <img src="{{ asset('images/logo/karayatera.png') }}"
                    alt="Karyatera Logo"
                    class="h-5 md:h-6 w-auto object-contain">
            </a>

            {{-- DESKTOP MENU --}}
            <div class="space-x-6 text-sm hidden md:block">
                <a href="/#about" class="hover:text-fuchsia-400 transition">About</a>
                <a href="/#services" class="hover:text-fuchsia-400 transition">Services</a>
                <a href="/portofolio" class="text-fuchsia-400 font-semibold">Portofolio</a>
                <a href="/#contact" class="hover:text-fuchsia-400 transition">Contact</a>
            </div>

            {{-- HAMBURGER BUTTON (mobile only) --}}
            <button id="hamburger" class="md:hidden flex flex-col gap-1.5 focus:outline-none" onclick="toggleMenu()">
                <span class="block w-6 h-0.5 bg-white transition-all duration-300" id="bar1"></span>
                <span class="block w-6 h-0.5 bg-white transition-all duration-300" id="bar2"></span>
                <span class="block w-6 h-0.5 bg-white transition-all duration-300" id="bar3"></span>
            </button>
        </div>

        {{-- MOBILE DROPDOWN MENU --}}
        <div id="mobileMenu" class="md:hidden px-6 bg-black/60 backdrop-blur-md">
            <div class="flex flex-col space-y-4 py-4 text-sm border-t border-white/10">
                <a href="/#about" class="hover:text-fuchsia-400 transition" onclick="toggleMenu()">About</a>
                <a href="/#services" class="hover:text-fuchsia-400 transition" onclick="toggleMenu()">Services</a>
                <a href="/portofolio" class="text-fuchsia-400 font-semibold">Portofolio</a>
                <a href="/#contact" class="hover:text-fuchsia-400 transition" onclick="toggleMenu()">Contact</a>
            </div>
        </div>
    </nav>

    {{-- HEADER --}}
    <section class="pt-40 pb-10 text-center">
        <h1 class="text-4xl md:text-5xl font-bold neon-text" data-aos="fade-up">
            Our Portofolio
        </h1>
    </section>

    {{-- FILTER BUTTONS --}}
    <div class="max-w-4xl mx-auto px-6 mb-12 flex flex-wrap justify-center gap-4">
        <button onclick="filterCategory('all', this)"
            class="filter-btn px-5 py-2 rounded-lg border border-fuchsia-500 text-fuchsia-300 hover:bg-fuchsia-600/20 transition filter-active">
            All
        </button>

        @foreach ($categories as $cat)
            <button onclick="filterCategory('{{ $cat }}', this)"
                class="filter-btn px-5 py-2 rounded-lg border border-fuchsia-500 text-fuchsia-300 hover:bg-fuchsia-600/20 transition">
                {{ $cat }}
            </button>
        @endforeach
    </div>

    {{-- PORTFOLIO GRID --}}
    <section class="pb-32">
        <div class="max-w-7xl mx-auto px-6 card-grid" id="portfolioGrid">

            @forelse ($portofolios as $item)
                <div class="card-item glass-box p-4 rounded-2xl hover:scale-105 transition-transform duration-300 shadow-lg portfolio-card"
                    data-aos="zoom-in"
                    data-category="{{ $item->kategori }}">

                    {{-- THUMBNAIL --}}
                    @if ($item->youtube_id)
                        <div onclick="openVideo('{{ $item->youtube_id }}')"
                            class="relative cursor-pointer group aspect-video rounded-xl overflow-hidden">
                            <img src="https://img.youtube.com/vi/{{ $item->youtube_id }}/hqdefault.jpg"
                                class="w-full h-full object-cover">
                            <div class="absolute inset-0 flex items-center justify-center opacity-90 group-hover:opacity-100 transition">
                                <div class="bg-white/70 backdrop-blur-md w-16 h-16 rounded-full flex items-center justify-center shadow-xl">
                                    <svg class="w-10 h-10 text-black" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M8 5v14l11-7z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-all duration-300"></div>
                        </div>
                    @else
                        <div class="aspect-video rounded-xl overflow-hidden">
                            <img src="{{ asset('storage/' . $item->gambar) }}"
                                class="w-full h-full object-cover">
                        </div>
                    @endif

                    {{-- TITLE --}}
                    <h3 class="text-lg text-center font-bold text-fuchsia-400 mt-3">
                        {{ $item->nama_portofolio }}
                    </h3>

                    {{-- CATEGORY --}}
                    <p class="text-sm text-purple-400 mb-3 text-center">
                        {{ $item->kategori }}
                    </p>

                </div>
            @empty
                <p class="text-gray-400 text-center w-full">
                    Belum ada portofolio yang ditambahkan.
                </p>
            @endforelse

        </div>
    </section>

    {{-- FULLSCREEN VIDEO POPUP --}}
    <div id="videoModal"
        class="fixed inset-0 bg-black/80 z-[9999] hidden justify-center items-center">
        <div class="relative w-11/12 md:w-4/5 lg:w-3/5">
            <iframe id="videoFrame"
                class="w-full h-[60vh] md:h-[70vh] rounded-xl"
                src=""
                frameborder="0"
                allow="autoplay; encrypted-media"
                allowfullscreen></iframe>
            <button onclick="closeVideo()"
                class="absolute -top-12 right-0 text-white text-4xl">
                &times;
            </button>
        </div>
    </div>

    {{-- FOOTER --}}
    <footer class="py-6 text-center text-gray-500 text-sm border-t border-white/10">
        © 2025 KaryaTera — All Rights Reserved.
    </footer>

    <script>
    // ===== HAMBURGER MENU =====
    let menuOpen = false;

    function toggleMenu() {
        const menu = document.getElementById('mobileMenu');
        const bar1 = document.getElementById('bar1');
        const bar2 = document.getElementById('bar2');
        const bar3 = document.getElementById('bar3');

        menuOpen = !menuOpen;
        menu.classList.toggle('open', menuOpen);

        if (menuOpen) {
            bar1.style.transform = 'translateY(8px) rotate(45deg)';
            bar2.style.opacity = '0';
            bar3.style.transform = 'translateY(-8px) rotate(-45deg)';
        } else {
            bar1.style.transform = '';
            bar2.style.opacity = '1';
            bar3.style.transform = '';
        }
    }

    // ===== FILTER =====
    function filterCategory(category, button) {
        const cards = document.querySelectorAll('.portfolio-card');
        const buttons = document.querySelectorAll('.filter-btn');

        buttons.forEach(btn => btn.classList.remove('filter-active'));
        button.classList.add('filter-active');

        cards.forEach(card => {
            const cat = card.getAttribute('data-category');
            if (category === 'all' || cat === category) {
                card.style.display = '';
            } else {
                card.style.display = 'none';
            }
        });
    }

    // ===== VIDEO POPUP =====
    function openVideo(videoId) {
        const modal = document.getElementById('videoModal');
        const frame = document.getElementById('videoFrame');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        frame.src = `https://www.youtube.com/embed/${videoId}?autoplay=1&controls=0&rel=0&showinfo=0&modestbranding=1`;
    }

    function closeVideo() {
        const modal = document.getElementById('videoModal');
        const frame = document.getElementById('videoFrame');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
        frame.src = "";
    }
    </script>

    <script>
        AOS.init({ duration: 1000, once: false, mirror: true });
    </script>

</body>
</html>