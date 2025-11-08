@extends('layouts.app')

@section('content')
<div class="container">
    <div class="jumbotron bg-light p-5 rounded mb-4">
        <h1 class="display-4">Selamat Datang di Tolek</h1>
        <p class="lead">Toko Elektronik Terpercaya dengan Produk Berkualitas</p>
        <a href="{{ route('products.index') }}" class="btn btn-primary btn-lg">Lihat Produk</a>
    </div>

    <h2 class="mb-4">Produk Terbaru</h2>
    <div class="row">
        @forelse($products as $product)
        <div class="col-md-3 mb-4">
            <div class="card h-100">
                <img src="{{ $product->image ?? 'https://via.placeholder.com/300' }}" 
                     class="card-img-top" 
                     alt="{{ $product->name }}"
                     style="height: 200px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="text-muted small">{{ $product->category->name }}</p>
                    <p class="h6 text-primary">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary btn-sm">Detail</a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-warning">Belum ada produk.</div>
        </div>
        @endforelse
    </div>

    <h2 class="mb-4 mt-5">Kategori Produk</h2>
    <div class="row">
        @forelse($categories as $category)
        <div class="col-md-4 mb-3">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">{{ $category->name }}</h5>
                    <p class="card-text">{{ $category->description }}</p>
                    <span class="badge bg-primary">{{ $category->products->count() }} Produk</span>
                    <a href="{{ route('products.index', ['category' => $category->id]) }}" 
                       class="btn btn-outline-primary btn-sm mt-2">
                        Lihat Produk
                    </a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-warning">Belum ada kategori.</div>
        </div>
        @endforelse
    </div>
</div>
@endsection