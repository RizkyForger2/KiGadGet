<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KiGadGet - @yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-50">
    <!-- Navbar -->
    <nav class="bg-gradient-to-r from-blue-600 to-blue-800 text-white shadow-lg">
        <div class="container mx-auto px-4 py-4">
            <div class="flex justify-between items-center">
                <a href="{{ route('products.index') }}" class="text-2xl font-bold flex items-center">
                    <i class="fas fa-mobile-alt mr-2"></i>
                    KiGadGet
                </a>
                <div class="space-x-4">
                    <a href="{{ route('products.index') }}" class="hover:text-blue-200 transition">
                        <i class="fas fa-home mr-1"></i> Beranda
                    </a>
                    <a href="{{ route('products.create') }}" class="hover:text-blue-200 transition">
                        <i class="fas fa-plus-circle mr-1"></i> Tambah Produk
                    </a>
                    <a href="{{ route('orders.index') }}" class="hover:text-blue-200 transition">
                        <i class="fas fa-shopping-cart mr-1"></i> Pesanan
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Alert Messages -->
    @if(session('success'))
        <div class="container mx-auto px-4 mt-4">
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded" role="alert">
                <p class="font-bold">Berhasil!</p>
                <p>{{ session('success') }}</p>
            </div>
        </div>
    @endif

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-8">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white mt-12">
        <div class="container mx-auto px-4 py-6 text-center">
            <p>&copy; 2024 KiGadGet. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>