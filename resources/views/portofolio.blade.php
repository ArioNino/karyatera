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
    </style>
</head>

<body class="overflow-x-hidden">

    {{-- NAVBAR --}}
    <nav class="fixed top-0 left-0 w-full bg-black/40 backdrop-blur-md border-b border-white/10 z-50">
        <div class="max-w-6xl mx-auto flex justify-between items-center py-4 px-6">
            <a href="/">
                <h1 class="text-xl font-semibold neon-text">KaryaTera</h1>
            </a>

            <div class="space-x-6 text-sm hidden md:block">
                <a href="/#about" class="hover:text-fuchsia-400 transition">About</a>
                <a href="/#services" class="hover:text-fuchsia-400 transition">Services</a>
                <a href="/portofolio" class="text-fuchsia-400 font-semibold">Portofolio</a>
                <a href="/#contact" class="hover:text-fuchsia-400 transition">Contact</a>
            </div>
        </div>
    </nav>

    {{-- HEADER --}}
    <section class="pt-40 pb-20 text-center">
        <h1 class="text-4xl md:text-5xl font-bold neon-text" data-aos="fade-up">
            Our Portofolio
        </h1>
        <p class="text-gray-400 max-w-2xl mx-auto mt-4" data-aos="fade-up" data-aos-delay="150">
            Jelajahi karya terbaik kami dalam fotografi, videografi, dan desain kreatif.
        </p>
    </section>

    {{-- PORTFOLIO GRID --}}
    <section class="pb-32">
        <div class="max-w-7xl mx-auto px-6 grid sm:grid-cols-2 md:grid-cols-3 gap-10">

            @forelse ($portofolios as $item)
                <div class="glass-box p-4 rounded-2xl hover:scale-105 transition-transform duration-300 shadow-lg"
                    data-aos="zoom-in">

                    {{-- THUMBNAIL YOUTUBE --}}
                    @if ($item->youtube_id)
                    <div onclick="openVideo('{{ $item->youtube_id }}')" 
                        class="relative cursor-pointer group aspect-video rounded-xl overflow-hidden">

                        <img src="https://img.youtube.com/vi/{{ $item->youtube_id }}/hqdefault.jpg"
                            class="w-full h-full object-cover">

                        {{-- Play button --}}
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div class="bg-white/60 backdrop-blur-md w-16 h-16 rounded-full flex items-center justify-center">
                                <svg class="w-10 h-10 text-black" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8 5v14l11-7z" />
                                </svg>
                            </div>
                        </div>

                        {{-- Hover overlay --}}
                        <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-all duration-300"></div>
                    </div>
                @else
                    <div class="aspect-video rounded-xl overflow-hidden">
                        <img src="{{ asset('storage/' . $item->gambar) }}"
                            class="w-full h-full object-cover">
                    </div>
                @endif




                    {{-- TITLE --}}
                    <h3 class="text-xl font-bold text-fuchsia-400 mb-2">
                        {{ $item->judul }}
                    </h3>

                    {{-- CATEGORY --}}
                    @if ($item->kategori)
                        <p class="text-sm text-purple-400 mb-3 text-center">
                            {{ $item->kategori }}
                        </p>
                    @endif

                    {{-- DESCRIPTION --}}
                    <p class="text-gray-300 text-sm leading-relaxed">
                        {{ Str::limit($item->deskripsi, 120) }}
                    </p>

                </div>
            @empty
                <p class="text-gray-400 col-span-3 text-center">
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

            {{-- CLOSE BUTTON --}}
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
        AOS.init({
            duration: 1000,
            once: false,
            mirror: true
        });
    </script>

    <script>
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

        frame.src = ""; // STOP video
    }
    </script>

</body>

</html>
