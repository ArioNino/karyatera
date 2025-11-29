<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KaryaTera | Crafting Creation, Through Creative Ideation</title>
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

        .btn-gradient {
            background: linear-gradient(90deg, #7e22ce, #ec4899);
        }

        .btn-gradient:hover {
            background: linear-gradient(90deg, #ec4899, #7e22ce);
        }

        @keyframes marquee {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }
        .animate-marquee {
            animation: marquee 20s linear infinite;
        }

    </style>
</head>

<body class="overflow-x-hidden">

    {{-- NAVBAR --}}
    <nav class="fixed top-0 left-0 w-full bg-black/40 backdrop-blur-md border-b border-white/10 z-50">
        <div class="max-w-6xl mx-auto flex justify-between items-center py-4 px-6">
            <a href="#home" class="flex items-center">
                <img src="{{ asset('images/logo/karayatera.png') }}"
                alt="Karyatera Logo"
                class="h-5 md:h-6 w-auto object-contain">
            </a>
            <div class="space-x-6 text-sm hidden md:block">
                <a href="#about" class="hover:text-fuchsia-400 transition">About</a>
                <a href="#services" class="hover:text-fuchsia-400 transition">Services</a>
                <a href="portofolio" class="hover:text-fuchsia-400 transition">Portofolio</a>
                <a href="#contact" class="hover:text-fuchsia-400 transition">Contact</a>
            </div>
        </div>
    </nav>

    {{-- HERO SECTION --}}
    <section id="home" class="relative min-h-screen flex flex-col justify-center items-center text-center px-6">
        {{-- Background image --}}
        <img src="{{ asset('images/hero-bg.jpg') }}" alt="KaryaTera Creative Visual"
            class="absolute inset-0 w-full h-full object-cover opacity-40">

        {{-- Overlay gradient --}}
        <div class="absolute inset-0 bg-gradient-to-b from-black/40 to-black/90"></div>

        <div class="relative z-10">
            <h1 class="text-5xl md:text-6xl font-bold neon-text mb-4" data-aos="fade-up">
                Crafting Creation,
            </h1>
            <h2 class="text-3xl md:text-4xl text-gray-300 mb-8" data-aos="fade-up" data-aos-delay="200">
                Through Creative Ideation
            </h2>
            <p class="text-gray-300 max-w-2xl mx-auto mb-10" data-aos="fade-up" data-aos-delay="300">
                KaryaTera adalah Creative Production House yang berfokus pada visual storytelling —
                mengubah ide kreatif menjadi karya audiovisual yang memukau.
            </p>
            <a href="#about"
                class="btn-gradient text-white font-semibold py-3 px-6 rounded-full transition-all duration-300 shadow-lg hover:shadow-fuchsia-500/30">
                Explore More
            </a>
        </div>
    </section>

    {{-- LOGO INFINITE SLIDER --}}
    <section class="py-16 bg-[#050011]">
    <h3 class="text-center text-gray-300 mb-8 text-sm">
        The most innovative companies work with us
    </h3>

    <div class="overflow-hidden relative w-full">
        <div class="flex items-center gap-16 animate-marquee whitespace-nowrap w-max">

            {{-- Set pertama --}}
            <img src="{{ asset('images/logo/grab-food-seeklogo.png') }}" class="h-10 opacity-80 hover:opacity-100 transition">
            <img src="{{ asset('images/logo/grab-food-seeklogo.png') }}" class="h-10 opacity-80 hover:opacity-100 transition">
            <img src="{{ asset('images/logo/grab-food-seeklogo.png') }}" class="h-10 opacity-80 hover:opacity-100 transition">
            <img src="{{ asset('images/logo/grab-food-seeklogo.png') }}" class="h-10 opacity-80 hover:opacity-100 transition">
            <img src="{{ asset('images/logo/grab-food-seeklogo.png') }}" class="h-10 opacity-80 hover:opacity-100 transition">
            <img src="{{ asset('images/logo/grab-food-seeklogo.png') }}" class="h-10 opacity-80 hover:opacity-100 transition">

            {{-- Duplikasi --}}
            <img src="{{ asset('images/logo/grab-food-seeklogo.png') }}" class="h-10 opacity-80 hover:opacity-100 transition">
            <img src="{{ asset('images/logo/grab-food-seeklogo.png') }}" class="h-10 opacity-80 hover:opacity-100 transition">
            <img src="{{ asset('images/logo/grab-food-seeklogo.png') }}" class="h-10 opacity-80 hover:opacity-100 transition">
            <img src="{{ asset('images/logo/grab-food-seeklogo.png') }}" class="h-10 opacity-80 hover:opacity-100 transition">
            <img src="{{ asset('images/logo/grab-food-seeklogo.png') }}" class="h-10 opacity-80 hover:opacity-100 transition">
            <img src="{{ asset('images/logo/grab-food-seeklogo.png') }}" class="h-10 opacity-80 hover:opacity-100 transition">

        </div>
    </div>
</section>

    {{-- ABOUT SECTION --}}
    <section id="about" class="py-24 bg-gradient-to-b from-transparent to-[#0a0018] text-center">
        <div class="max-w-6xl mx-auto px-6 grid md:grid-cols-2 gap-10 items-center">
            <div data-aos="fade-right" class="text-left flex flex-col space-y-6">
                <a>
                    <img src="{{ asset('images/logo/karayatera.png') }}" class="w-80 md:w-88">
                </a>
                <p class="text-gray-300 leading-relaxed">
                    Karyatera is a production house based in Bogor, 
                    specializing in <span class="text-fuchsia-400 font-semibold">profiles, commercial</span>, and <span class="text-fuchsia-400 font-semibold">documentaries </span> </br>
                    We provide comprehensive services covering pre-production, production,and post-production, supported by a skilled team to bring your vision to life.
                </p>
            </div>
            <div data-aos="fade-left">
                <img src="{{ asset('images/porto/porto1.png') }}" alt="About Us"
                 class="rounded-2xl shadow-lg w-full object-cover">
            </div>
        </div>
    </section>

    {{-- SERVICES SECTION --}}
    <section id="services" class="py-24 text-center relative">
        <div class="max-w-6xl mx-auto px-6">
            <h2 class="text-3xl font-semibold mb-12 neon-text" data-aos="fade-up">Our Services</h2>

            <div class="grid md:grid-cols-3 gap-8">
                @forelse ($layanans as $layanan)
                    <div class="glass-box p-8 hover:scale-105 transition-transform duration-300" data-aos="zoom-in">
                        @if ($layanan->gambar)
                            <img src="{{ asset('storage/' . $layanan->gambar) }}" alt="{{ $layanan->nama_layanan }}"
                                class="w-full h-40 object-cover rounded-md mb-4">
                        @else
                            <img src="{{ asset('images/default-service.jpg') }}" alt="No Image"
                                class="w-full h-40 object-cover rounded-md mb-4">
                        @endif
                        <h3 class="text-xl font-bold mb-3 text-fuchsia-400">{{ $layanan->nama_layanan }}</h3>
                        <p class="text-gray-300 text-sm">{{ $layanan->deskripsi }}</p>
                    </div>
                @empty
                    <p class="text-gray-300 col-span-3 text-center">Belum ada layanan yang ditambahkan.</p>
                @endforelse
            </div>
        </div>
    </section>


    {{-- PORTOFOLIO PREVIEW SECTION --}}
    <section class="py-24 bg-gradient-to-b from-black to-[#0a0018] text-center">
        <div class="max-w-7xl mx-auto px-6">
            <h2 class="text-3xl font-semibold mb-12 neon-text" data-aos="fade-up">
                Our Latest Works
            </h2>

            <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-10">

                @forelse ($portofolios as $item)
                    <div class="glass-box p-4 rounded-2xl hover:scale-105 transition-transform duration-300 shadow-lg"
                        data-aos="zoom-in">

                        {{-- THUMBNAIL --}}
                        @if ($item->youtube_id)
                            <div onclick="openVideo('{{ $item->youtube_id }}')"
                                class="relative cursor-pointer group aspect-video rounded-xl overflow-hidden">

                                <img src="https://img.youtube.com/vi/{{ $item->youtube_id }}/hqdefault.jpg"
                                    class="w-full h-full object-cover">

                                <div class="absolute inset-0 flex items-center justify-center opacity-90 group-hover:opacity-100 transition">
                                    <div class="bg-white/70 backdrop-blur-md w-14 h-14 rounded-full flex items-center justify-center shadow-xl">
                                        <svg class="w-8 h-8 text-black" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M8 5v14l11-7z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="aspect-video rounded-xl overflow-hidden">
                                <img src="{{ asset('storage/' . $item->gambar) }}"
                                    class="w-full h-full object-cover">
                            </div>
                        @endif

                        {{-- TITLE --}}
                        <h3 class="text-lg font-bold text-fuchsia-400 mt-3">
                            {{ $item->judul }}
                        </h3>

                        {{-- CATEGORY --}}
                        <p class="text-sm text-purple-400 mb-2 text-center">
                            {{ $item->kategori }}
                        </p>

                        {{-- DESCRIPTION --}}
                        <p class="text-gray-300 text-sm leading-relaxed">
                            {{ \Illuminate\Support\Str::limit($item->deskripsi, 80) }}
                        </p>
                    </div>
                @empty
                    <p class="text-gray-400 col-span-3 text-center">
                        Belum ada portofolio yang ditambahkan.
                    </p>
                @endforelse

            </div>

            {{-- BUTTON KE PAGE PORTOFOLIO --}}
            <div class="mt-14">
                <a href="{{ route('portofolio') }}"
                    class="btn-gradient inline-block text-white font-semibold py-3 px-10 rounded-full transition-all duration-300 shadow-lg hover:shadow-fuchsia-500/30">
                    View All Portofolio
                </a>
            </div>

        </div>
    </section>


    {{-- FEATURES SECTION --}}
    <section id="features" class="py-24 bg-gradient-to-b from-[#0a0018] to-black text-center">
        <div class="max-w-6xl mx-auto px-6">
            <h2 class="text-3xl font-semibold mb-12 neon-text" data-aos="fade-up">Why Choose Us?</h2>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="glass-box p-6" data-aos="fade-up">
                    <h3 class="text-lg font-semibold text-fuchsia-400 mb-3">Creative Direction</h3>
                    <p class="text-gray-300 text-sm">
                        Tidak hanya visual yang indah, kami juga menciptakan arah kreatif yang menyampaikan pesan dengan
                        kuat.
                    </p>
                </div>
                <div class="glass-box p-6" data-aos="fade-up" data-aos-delay="100">
                    <h3 class="text-lg font-semibold text-fuchsia-400 mb-3">Professional Team</h3>
                    <p class="text-gray-300 text-sm">
                        Tim berpengalaman di bidang kreatif dan sinematografi yang siap membawa ide ke tingkat
                        berikutnya.
                    </p>
                </div>
                <div class="glass-box p-6" data-aos="fade-up" data-aos-delay="200">
                    <h3 class="text-lg font-semibold text-fuchsia-400 mb-3">High Visual Standard</h3>
                    <p class="text-gray-300 text-sm">
                        Kualitas visual berstandar tinggi dengan pendekatan storytelling dan teknologi modern.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- WORKFLOW SECTION --}}
    <section id="workflow" class="py-24 bg-gradient-to-b from-black to-[#0a0018]">
        <div class="max-w-7xl mx-auto px-6">
            <h2 class="text-3xl font-semibold mb-12 text-center neon-text" data-aos="fade-up">
                Our Workflow
            </h2>

            <div class="grid md:grid-cols-2">

                {{-- LEFT: IMAGE SLIDER --}}
                <div class="relative p-0 m-0 overflow-hidden select-none" data-aos="fade-right">

                    <div id="sliderTrack"
                        class="flex transition-transform duration-700 ease-in-out w-full h-[400px]">
                        <img src="{{ asset('images/porto/porto1.png') }}" class="w-full h-full object-cover flex-shrink-0">
                        <img src="{{ asset('images/porto/porto2.png') }}" class="w-full h-full object-cover flex-shrink-0">
                        <img src="{{ asset('images/porto/porto3.png') }}" class="w-full h-full object-cover flex-shrink-0">
                    </div>

                    {{-- DOTS --}}
                    <div id="sliderDots" class="absolute bottom-4 left-1/2 -translate-x-1/2 flex space-x-3"></div>

                </div>

                {{-- RIGHT: VIDEO --}}
                 <div class="p-0 m-0" data-aos="fade-left">
                    <video autoplay muted loop playsinline disablepictureinpicture class="w-full h-[300px] md:h-[400px] object-cover block">
                        <source src="{{ asset('images/workflow/behind.mp4') }}" type="video/mp4">
                    </video>
                </div>

            </div>
        </div>
    </section>

    {{-- CONTACT US SECTION --}}
    <section id="contact" class="py-24 bg-gradient-to-b from-black via-[#0a0018] to-black text-center">
        <h2 class="text-3xl font-semibold mb-12 neon-text" data-aos="fade-up">Ready to Work With Us?</h2>

        <div class="max-w-5xl mx-auto grid md:grid-cols-2 gap-8 px-6">
            {{-- Executive Officer --}}
            <div class="p-8 rounded-2xl bg-gradient-to-b from-blue-600 to-fuchsia-600 shadow-lg hover:scale-105 transition-transform duration-300"
                data-aos="fade-up">
                <h3 class="text-white font-bold text-lg mb-3">EXECUTIVE OFFICER</h3>
                <p class="text-2xl md:text-3xl font-extrabold text-white mb-2">
                    <a href="https://wa.me/6281389745129" target="_blank" class="hover:underline">
                        +62 813-8974-5129
                    </a>
                </p>
                <p class="text-white/90">Aiman Bindilah</p>
            </div>

            {{-- Marketing Officer --}}
            <div class="p-8 rounded-2xl bg-gradient-to-b from-blue-600 to-fuchsia-600 shadow-lg hover:scale-105 transition-transform duration-300"
                data-aos="fade-up" data-aos-delay="100">
                <h3 class="text-white font-bold text-lg mb-3">MARKETING OFFICER</h3>
                <p class="text-2xl md:text-3xl font-extrabold text-white mb-2">
                    <a href="https://wa.me/6281382662210" target="_blank" class="hover:underline">
                        +62 813-8266-2210
                    </a>
                </p>
                <p class="text-white/90">Maulana Luthfi Ghalib</p>
            </div>
        </div>

        <div class="mt-12">
            <h3 class="text-fuchsia-400 font-semibold text-lg mb-3">Let’s Collaborate!</h3>
            <p class="text-gray-400 max-w-lg mx-auto">
                Hubungi kami untuk proyek fotografi, videografi, atau desain visual Anda — kami siap membantu mewujudkan
                ide menjadi karya nyata.
            </p>
        </div>
    </section>

    {{-- CONTACT SECTION --}}
    <section class=" text-center">
        <h2 class="text-3xl font-semibold mb-8 neon-text" data-aos="fade-up">Get In Touch</h2>
        <p class="text-gray-400 mb-10" data-aos="fade-up" data-aos-delay="100">
            Let's create something extraordinary together.
        </p>

        <form action="#" method="POST" class="max-w-md mx-auto space-y-4" data-aos="fade-up"
            data-aos-delay="200">
            <input type="text" name="name" placeholder="Nama"
                class="w-full p-3 rounded-md bg-white/10 border border-white/20 text-white placeholder-gray-400 focus:ring-2 focus:ring-fuchsia-500">
            <input type="email" name="email" placeholder="Email"
                class="w-full p-3 rounded-md bg-white/10 border border-white/20 text-white placeholder-gray-400 focus:ring-2 focus:ring-fuchsia-500">
            <textarea name="message" placeholder="Pesan" rows="4"
                class="w-full p-3 rounded-md bg-white/10 border border-white/20 text-white placeholder-gray-400 focus:ring-2 focus:ring-fuchsia-500"></textarea>
            <button type="submit" class="btn-gradient text-white py-3 px-6 rounded-md w-full">Send Message</button>
        </form>
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

    <script>
        const track = document.getElementById("sliderTrack");
        const dotsContainer = document.getElementById("sliderDots");
        const slides = track.children;

        let index = 0;
        let startX = 0;
        let isDragging = false;
        let interval;

        // === CREATE DOTS ===
        for (let i = 0; i < slides.length; i++) {
            const dot = document.createElement("div");
            dot.className = "w-3 h-3 rounded-full bg-white/40 cursor-pointer";
            dot.addEventListener("click", () => {
                index = i;
                updateSlider();
                resetAutoSlide();
            });
            dotsContainer.appendChild(dot);
        }

        function updateDots() {
            [...dotsContainer.children].forEach((dot, i) => {
                dot.className = i === index
                    ? "w-3 h-3 rounded-full bg-white cursor-pointer"
                    : "w-3 h-3 rounded-full bg-white/40 cursor-pointer";
            });
        }

        function updateSlider() {
            track.style.transform = `translateX(-${index * 100}%)`;
            updateDots();
        }

        function autoSlide() {
            interval = setInterval(() => {
                index = (index + 1) % slides.length;
                updateSlider();
            }, 3000);
        }

        function resetAutoSlide() {
            clearInterval(interval);
            autoSlide();
        }

        // === SWIPE SUPPORT (DRAG) ===
        track.addEventListener("mousedown", (e) => {
            startX = e.clientX;
            isDragging = true;
        });

        track.addEventListener("mouseup", (e) => {
            if (!isDragging) return;
            let endX = e.clientX;
            handleSwipe(endX - startX);
            isDragging = false;
        });

        track.addEventListener("touchstart", (e) => {
            startX = e.touches[0].clientX;
        });

        track.addEventListener("touchend", (e) => {
            let endX = e.changedTouches[0].clientX;
            handleSwipe(endX - startX);
        });

        function handleSwipe(distance) {
            if (distance > 50) index = Math.max(index - 1, 0);
            if (distance < -50) index = Math.min(index + 1, slides.length - 1);
            updateSlider();
            resetAutoSlide();
        }

        // INIT
        updateSlider();
        autoSlide();
    </script>


    

</body>

</html>
