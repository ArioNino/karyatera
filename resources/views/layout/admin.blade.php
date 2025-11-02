<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KaryaTera Admin | @yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/feather-icons"></script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f9f9ff 0%, #f0e9ff 100%);
        }

        .gradient-text {
            background: linear-gradient(90deg, #9b5de5, #f15bb5);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .btn-primary {
            background: linear-gradient(90deg, #9b5de5, #f15bb5);
        }

        .btn-primary:hover {
            background: linear-gradient(90deg, #7a3dd1, #d6409e);
        }
    </style>
</head>

<body class="flex min-h-screen">

    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow-lg flex flex-col">
        <div class="p-6 border-b border-gray-200">
            <img src="{{ asset('images/karyatera.png') }}" alt="logo-karyatera">
            <p class="text-sm text-gray-500 mx-2">Creative Admin</p>
        </div>

        <nav class="flex-1 p-5 space-y-3 text-gray-700">
            <a href="{{ route('dashboard') }}"
                class="flex items-center gap-3 py-2 px-4 rounded-lg transition
              {{ request()->routeIs('dashboard')
                  ? 'bg-gradient-to-r from-pink-100 to-purple-100 text-pink-700 font-semibold'
                  : 'hover:bg-pink-50 hover:text-pink-600' }}">
                <i data-feather="home" class="w-5 h-5"></i> Dashboard
            </a>

            <a href="{{ route('admin.layanan') }}"
                class="flex items-center gap-3 py-2 px-4 rounded-lg transition
              {{ request()->routeIs('admin.layanan*')
                  ? 'bg-gradient-to-r from-pink-100 to-purple-100 text-pink-700 font-semibold'
                  : 'hover:bg-pink-50 hover:text-pink-600' }}">
                <i data-feather="layers" class="w-5 h-5"></i> Layanan
            </a>

            <a href="#"
                class="flex items-center gap-3 py-2 px-4 rounded-lg hover:bg-pink-50 hover:text-pink-600 transition">
                <i data-feather="file-text" class="w-5 h-5"></i> Artikel
            </a>

            <a href="#"
                class="flex items-center gap-3 py-2 px-4 rounded-lg hover:bg-pink-50 hover:text-pink-600 transition">
                <i data-feather="users" class="w-5 h-5"></i> Pengguna
            </a>
        </nav>

        <!-- Logout -->
        <div class="p-5 border-t border-gray-200">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit"
                    class="w-full flex items-center justify-center gap-2 py-2 bg-red-500 hover:bg-red-600 text-white rounded-lg font-semibold transition">
                    <i data-feather="log-out" class="w-5 h-5"></i> Logout
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-8">
        @yield('content')
    </main>

    <script>
        feather.replace();
    </script>
</body>

</html>
