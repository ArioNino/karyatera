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

                    {{-- IMAGE --}}
                    <img src="{{ asset('storage/' . $item->gambar) }}"
                        class="w-full h-64 object-cover rounded-xl mb-4">

                    {{-- TITLE --}}
                    <h3 class="text-xl font-bold text-fuchsia-400 mb-2">
                        {{ $item->judul }}
                    </h3>

                    {{-- CATEGORY --}}
                    @if ($item->kategori)
                        <p class="text-sm text-gray-400 mb-3">
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

</body>

</html>
