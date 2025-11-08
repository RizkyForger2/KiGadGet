@extends('layouts.app')

@section('title', $product->name . ' - TOEL')

@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
            <li class="breadcrumb-item active">{{ $product->name }}</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-6">
            @if($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid rounded" alt="{{ $product->name }}">
            @else
                <img src="https://via.placeholder.com/600x400?text=No+Image" class="img-fluid rounded" alt="No Image">
            @endif
        </div>
        <div class="col-md-6">
            <span class="badge bg-secondary mb-2">{{ $product->category->name }}</span>
            <h1>{{ $product->name }}</h1>
            <h2 class="text-primary">Rp {{ number_format($product->price, 0, ',', '.') }}</h2>
            <p class="text-muted">Stok: {{ $product->stock }} unit</p>
            
            <hr>
            
            <h5>Deskripsi Produk</h5>
            <p>{{ $product->description }}</p>
            
            <hr>
            
            <div class="d-grid gap-2">
                <button class="btn btn-primary btn-lg">
                    <i class="fas fa-shopping-cart"></i> Tambah ke Keranjang
                </button>
                <button class="btn btn-success btn-lg">
                    <i class="fas fa-bolt"></i> Beli Sekarang
                </button>
            </div>
        </div>
    </div>

    @if($relatedProducts->count() > 0)
    <div class="row mt-5">
        <div class="col-12">
            <h3>Produk Terkait</h3>
        </div>
        @foreach($relatedProducts as $related)
        <div class="col-md-3 mb-4">
            <div class="card product-card h-100">
                @if($related->image)
                    <img src="{{ asset('storage/' . $related->image) }}" class="card-img-top product-image" alt="{{ $related->name }}">
                @else
                    <img src="https://via.placeholder.com/300x200?text=No+Image" class="card-img-top product-image" alt="No Image">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $related->name }}</h5>
                    <h6 class="text-primary">Rp {{ number_format($related->price, 0, ',', '.') }}</h6>
                    <a href="{{ route('product.show', $related->id) }}" class="btn btn-sm btn-outline-primary">Detail</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif
</div>
@endsection