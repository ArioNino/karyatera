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
    </style>
</head>

<body class="overflow-x-hidden">

    {{-- NAVBAR --}}
    <nav class="fixed top-0 left-0 w-full bg-black/40 backdrop-blur-md border-b border-white/10 z-50">
        <div class="max-w-6xl mx-auto flex justify-between items-center py-4 px-6">
            <a href="#home">
                <h1 class="text-xl font-semibold neon-text">KaryaTera</h1>
            </a>
            <div class="space-x-6 text-sm hidden md:block">
                <a href="#about" class="hover:text-fuchsia-400 transition">About</a>
                <a href="#services" class="hover:text-fuchsia-400 transition">Services</a>
                <a href="#contact" class="hover:text-fuchsia-400 transition">Contact</a>
                <a href="login" class="hover:text-fuchsia-400 transition">Login</a>
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

    {{-- ABOUT SECTION --}}
    <section id="about" class="py-24 bg-gradient-to-b from-transparent to-[#0a0018] text-center">
        <div class="max-w-6xl mx-auto px-6 grid md:grid-cols-2 gap-10 items-center">
            <div data-aos="fade-right">
                <img src="{{ asset('images/about-team.jpg') }}" alt="KaryaTera Team"
                    class="rounded-2xl shadow-lg w-full object-cover">
            </div>
            <div data-aos="fade-left">
                <h2 class="text-3xl font-semibold mb-6 neon-text">About Us</h2>
                <p class="text-gray-300 leading-relaxed">
                    Di KaryaTera, kami percaya bahwa setiap ide memiliki jiwa — dan tugas kami adalah menghidupkannya.
                    Kami membantu brand dan individu mengekspresikan kisah mereka melalui visual yang kuat, emosional,
                    dan autentik.
                    Dengan tim profesional di bidang <span class="text-fuchsia-400 font-semibold">videografi, fotografi,
                        dan desain</span>,
                    kami menghadirkan karya yang beresonansi secara visual dan emosional.
                </p>
            </div>
        </div>
    </section>

    {{-- SERVICES SECTION --}}
    <section id="services" class="py-24 text-center relative">
        <div class="max-w-6xl mx-auto px-6">
            <h2 class="text-3xl font-semibold mb-12 neon-text" data-aos="fade-up">Our Services</h2>

            <div class="grid md:grid-cols-3 gap-8">
                {{-- Advertising --}}
                <div class="glass-box p-8 hover:scale-105 transition-transform duration-300" data-aos="zoom-in">
                    <img src="{{ asset('images/advertising.jpg') }}" alt="Advertising"
                        class="w-full h-40 object-cover rounded-md mb-4">
                    <h3 class="text-xl font-bold mb-3 text-fuchsia-400">Advertising</h3>
                    <p class="text-gray-300 text-sm">
                        Konsep kreatif dan produksi iklan profesional — mulai dari TVC, digital ads, hingga brand
                        campaign.
                    </p>
                </div>

                {{-- Documentation --}}
                <div class="glass-box p-8 hover:scale-105 transition-transform duration-300" data-aos="zoom-in"
                    data-aos-delay="100">
                    <img src="{{ asset('images/documentation.jpg') }}" alt="Documentation"
                        class="w-full h-40 object-cover rounded-md mb-4">
                    <h3 class="text-xl font-bold mb-3 text-fuchsia-400">Documentation</h3>
                    <p class="text-gray-300 text-sm">
                        Dokumentasi acara, perjalanan, dan kegiatan — kami menangkap cerita di balik setiap momen.
                    </p>
                </div>

                {{-- Company Profile --}}
                <div class="glass-box p-8 hover:scale-105 transition-transform duration-300" data-aos="zoom-in"
                    data-aos-delay="200">
                    <img src="{{ asset('images/company-profile.jpg') }}" alt="Company Profile"
                        class="w-full h-40 object-cover rounded-md mb-4">
                    <h3 class="text-xl font-bold mb-3 text-fuchsia-400">Company Profile</h3>
                    <p class="text-gray-300 text-sm">
                        Profil perusahaan dengan storytelling visual yang menampilkan nilai dan identitas brand.
                    </p>
                </div>
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

    {{-- OUR CLIENTS SECTION --}}
    <section id="clients" class="bg-[#001AFF] py-20 text-center text-white">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl md:text-4xl font-extrabold mb-10">
                WE’VE ALSO WORKED ON VARIOUS CREATIVE PROJECTS.
            </h2>

            {{-- Logo Grid --}}
            <div class="flex flex-wrap justify-center items-center gap-8 md:gap-12">
                <img src="{{ asset('images/clients/bni.png') }}" alt="BNI"
                    class="h-10 md:h-12 object-contain brightness-0 invert">
                <img src="{{ asset('images/clients/bsimaslahat.png') }}" alt="BSI Maslahat"
                    class="h-10 md:h-12 object-contain brightness-0 invert">
                <img src="{{ asset('images/clients/narasi.png') }}" alt="Narasi"
                    class="h-10 md:h-12 object-contain brightness-0 invert">
                <img src="{{ asset('images/clients/ipb.png') }}" alt="IPB"
                    class="h-10 md:h-12 object-contain brightness-0 invert">
                <img src="{{ asset('images/clients/iptprestasi.png') }}" alt="IPT Prestasi"
                    class="h-10 md:h-12 object-contain brightness-0 invert">
                <img src="{{ asset('images/clients/baznas.png') }}" alt="Baznas"
                    class="h-10 md:h-12 object-contain brightness-0 invert">
                <img src="{{ asset('images/clients/indosat.png') }}" alt="Indosat"
                    class="h-10 md:h-12 object-contain brightness-0 invert">
                <img src="{{ asset('images/clients/ditmawa.png') }}" alt="Ditmawa"
                    class="h-10 md:h-12 object-contain brightness-0 invert">
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

</body>

</html>
