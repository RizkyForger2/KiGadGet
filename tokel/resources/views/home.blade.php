@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<div class="bg-primary text-white py-5">
    <div class="container text-center">
        <h1 class="display-4 fw-bold mb-3">Selamat Datang di TOEL</h1>
        <p class="lead">Toko Elektronik Terpercaya dengan Produk Berkualitas</p>
        <a href="{{ route('products.index') }}" class="btn btn-light btn-lg mt-3">
            <i class="fas fa-shopping-bag"></i> Belanja Sekarang
        </a>
    </div>
</div>

<!-- Categories -->
<div class="container my-5">
    <h2 class="text-center mb-4">Kategori Produk</h2>
    <div class="row">
        @foreach($categories as $category)
        <div class="col-md-3 mb-4">
            <div class="card text-center product-card">
                <div class="card-body">
                    <i class="fas fa-tv fa-3x text-primary mb-3"></i>
                    <h5 class="card-title">{{ $category->name }}</h5>
                    <a href="{{ route('products.category', $category->id) }}" class="btn btn-primary btn-sm">Lihat Produk</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Featured Products -->
<div class="container my-5">
    <h2 class="text-center mb-4">Produk Terbaru</h2>
    <div class="row">
        @foreach($products as $product)
        <div class="col-md-3 mb-4">
            <div class="card product-card h-100">
                @if($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top product-image" alt="{{ $product->name }}">
                @else
                <img src="https://via.placeholder.com/300x250?text=No+Image" class="card-img-top product-image" alt="No Image">
                @endif
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="text-muted small">{{ $product->category->name }}</p>
                    <p class="text-primary fw-bold fs-5">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                    <div class="mt-auto">
                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-outline-primary btn-sm me-2">Detail</a>
                        <form action="{{ route('cart.add', $product->id) }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fas fa-cart-plus"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection