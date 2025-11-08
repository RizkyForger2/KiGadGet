@extends('layouts.app')

@section('title', 'TOEL - Beranda')

@section('content')
<div class="container">
    <!-- Hero Section -->
    <div class="jumbotron bg-light p-5 rounded mb-4">
        <h1 class="display-4">Selamat Datang di TOEL</h1>
        <p class="lead">Toko Elektronik Terpercaya untuk Semua Kebutuhan Anda</p>
        <hr class="my-4">
        <p>Dapatkan produk elektronik berkualitas dengan harga terbaik!</p>
    </div>

    <!-- Categories Filter -->
    <div class="row mb-4">
        <div class="col-12">
            <h3>Kategori</h3>
            <div class="btn-group flex-wrap" role="group">
                <a href="{{ route('home') }}" class="btn btn-outline-primary">Semua</a>
                @foreach($categories as $category)
                    <a href="{{ route('home', ['category' => $category->id]) }}" class="btn btn-outline-primary">
                        {{ $category->name }}
                    </a>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Products Grid -->
    <div class="row">
        <div class="col-12 mb-3">
            <h3>Produk Kami</h3>
        </div>
        @forelse($products as $product)
        <div class="col-md-3 mb-4">
            <div class="card product-card h-100">
                @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top product-image" alt="{{ $product->name }}">
                @else
                    <img src="https://via.placeholder.com/300x200?text=No+Image" class="card-img-top product-image" alt="No Image">
                @endif
                <div class="card-body d-flex flex-column">
                    <span class="badge bg-secondary mb-2">{{ $product->category->name }}</span>
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text flex-grow-1">{{ Str::limit($product->description, 80) }}</p>
                    <div class="mt-auto">
                        <h4 class="text-primary">Rp {{ number_format($product->price, 0, ',', '.') }}</h4>
                        <small class="text-muted">Stok: {{ $product->stock }}</small>
                        <div class="d-grid gap-2 mt-2">
                            <a href="{{ route('product.show', $product->id) }}" class="btn btn-primary">
                                <i class="fas fa-eye"></i> Detail
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-info">
                Belum ada produk tersedia.
            </div>
        </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-center">
        {{ $products->links() }}
    </div>
</div>
@endsection