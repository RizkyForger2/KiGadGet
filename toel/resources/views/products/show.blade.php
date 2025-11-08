<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name }} - Tolek</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('home') }}">🔌 TOLEK</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('products.index') }}">Produk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('categories.index') }}">Kategori</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('orders.index') }}">Pesanan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('customers.index') }}">Pelanggan</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container my-5">
        <div class="row">
            <div class="col-md-5">
                @if($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" 
                     class="img-fluid rounded shadow">
                @else
                <img src="https://via.placeholder.com/500x500/6c757d/ffffff?text=No+Image" 
                     alt="No Image" class="img-fluid rounded shadow">
                @endif
            </div>
            
            <div class="col-md-7">
                <span class="badge bg-secondary mb-2">{{ $product->category->name }}</span>
                <h1>{{ $product->name }}</h1>
                
                @if($product->brand)
                <p class="text-muted lead">Brand: {{ $product->brand }}</p>
                @endif
                
                <h2 class="text-primary mb-4">Rp {{ number_format($product->price, 0, ',', '.') }}</h2>
                
                <div class="mb-4">
                    <h5>Stok Tersedia</h5>
                    <p class="fs-4">
                        @if($product->stock > 0)
                        <span class="badge bg-success">{{ $product->stock }} Unit</span>
                        @else
                        <span class="badge bg-danger">Stok Habis</span>
                        @endif
                    </p>
                </div>
                
                @if($product->description)
                <div class="mb-4">
                    <h5>Deskripsi Produk</h5>
                    <p class="text-muted">{{ $product->description }}</p>
                </div>
                @endif
                
                <div class="d-flex gap-2">
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">
                        ✏️ Edit Produk
                    </a>
                    <a href="{{ route('products.index') }}" class="btn btn-secondary">
                        ← Kembali
                    </a>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" 
                                onclick="return confirm('Yakin ingin menghapus produk ini?')">
                            🗑️ Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>