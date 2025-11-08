@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row">
        <div class="col-md-6">
            @if($product->image)
            <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid rounded" alt="{{ $product->name }}">
            @else
            <img src="https://via.placeholder.com/500x500?text={{ urlencode($product->name) }}" class="img-fluid rounded" alt="No Image">
            @endif
        </div>
        <div class="col-md-6">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Produk</a></li>
                    <li class="breadcrumb-item active">{{ $product->name }}</li>
                </ol>
            </nav>
            
            <h1 class="mb-3">{{ $product->name }}</h1>
            <p class="text-muted">Kategori: {{ $product->category->name }}</p>
            @if($product->brand)
            <p class="text-muted">Brand: {{ $product->brand }}</p>
            @endif
            
            <h2 class="text-primary mb-4">Rp {{ number_format($product->price, 0, ',', '.') }}</h2>
            
            <div class="mb-4">
                <h5>Deskripsi Produk:</h5>
                <p>{{ $product->description }}</p>
            </div>
            
            <div class="mb-4">
                <p><strong>Stok:</strong> <span class="badge bg-success">{{ $product->stock }} Unit</span></p>
            </div>
            
            @if($product->stock > 0)
            <form action="{{ route('cart.add', $product->id) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary btn-lg">
                    <i class="fas fa-cart-plus"></i> Tambah ke Keranjang
                </button>
            </form>
            @else
            <button class="btn btn-secondary btn-lg" disabled>Stok Habis</button>
            @endif
        </div>
    </div>
</div>
@endsection