<!DOCTYPE html>
<html lang="id">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login | Karyatera</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <style>
            body {
                background: radial-gradient(circle at top left, #1a002e, #000);
                color: #fff;
            }

            .neon-text {
                text-shadow: 0 0 8px #ff00ff, 0 0 12px #a855f7, 0 0 20px #9333ea;
            }

            .glow-box {
                background: rgba(255, 255, 255, 0.08);
                backdrop-filter: blur(12px);
                border: 1px solid rgba(255, 255, 255, 0.1);
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
    <body class="flex justify-center items-center min-h-screen px-4">

        <div class="glow-box p-8 max-w-sm w-full text-center shadow-xl">
            <h2 class="text-2xl font-bold mb-6 neon-text">KaryaTera</h2>
            <p class="text-gray-300 mb-8">Hellow welcome back</p>

            {{-- Pesan error --}}
            @if (session('error'))
                <div class="bg-red-500/20 border border-red-500/40 text-red-300 text-sm rounded-md p-2 mb-4">
                    {{ session('error') }}
                </div>
            @endif

            {{-- Form login --}}
            <form action="{{ route('login') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <input type="email" name="email" placeholder="Email address" value="{{ old('email') }}" required
                        class="w-full p-3 rounded-md bg-white/10 border border-white/20 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-fuchsia-500">
                </div>

                <div>
                    <input type="password" name="password" placeholder="Password" required
                        class="w-full p-3 rounded-md bg-white/10 border border-white/20 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-fuchsia-500">
                </div>

                <button type="submit"
                    class="btn-gradient text-white font-semibold py-2 px-4 rounded-md w-full transition-all duration-300">
                    Login
                </button>
            </form>

            <p class="mt-8 text-sm text-gray-400">© 2025 Karyatera Visuals</p>
        </div>
    </body>
</html>
