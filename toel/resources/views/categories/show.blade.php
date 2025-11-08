@extends('layouts.app')

@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Kategori</a></li>
            <li class="breadcrumb-item active">{{ $category->name }}</li>
        </ol>
    </nav>

    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title">{{ $category->name }}</h1>
                    <p class="card-text lead">{{ $category->description }}</p>
                    <span class="badge bg-primary">{{ $category->products->count() }} Produk Tersedia</span>
                </div>
            </div>
        </div>
    </div>

    <h2 class="mb-4">Produk di Kategori Ini</h2>
    
    <div class="row">
        @forelse($category->products as $product)
        <div class="col-md-3 mb-4">
            <div class="card h-100">
                <img src="{{ $product->image ?? 'https://via.placeholder.com/300x200' }}" 
                     class="card-img-top" 
                     alt="{{ $product->name }}"
                     style="height: 200px; object-fit: cover;">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="text-muted small">{{ Str::limit($product->description, 60) }}</p>
                    <div class="mt-auto">
                        <p class="h5 text-primary mb-3">
                            Rp {{ number_format($product->price, 0, ',', '.') }}
                        </p>
                        <div class="d-grid gap-2">
                            <a href="{{ route('products.show', $product->id) }}" 
                               class="btn btn-primary btn-sm">
                                Lihat Detail
                            </a>
                            <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm w-100">
                                    + Keranjang
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-warning text-center">
                <h4>Belum Ada Produk</h4>
                <p>Belum ada produk di kategori ini.</p>
                <a href="{{ route('products.index') }}" class="btn btn-primary">Lihat Semua Produk</a>
            </div>
        </div>
        @endforelse
    </div>

    <div class="mt-4">
        <a href="{{ route('categories.index') }}" class="btn btn-outline-secondary">
            &laquo; Kembali ke Semua Kategori
        </a>
    </div>
</div>
@endsection