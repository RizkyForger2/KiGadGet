@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h2 class="mb-4">
        @if(isset($category))
            Produk Kategori: {{ $category->name }}
        @else
            Semua Produk
        @endif
    </h2>
    
    <!-- Filter Kategori -->
    <div class="mb-4">
        <a href="{{ route('products.index') }}" class="btn btn-outline-primary btn-sm">Semua</a>
        @foreach($categories as $cat)
        <a href="{{ route('products.category', $cat->id) }}" class="btn btn-outline-primary btn-sm">{{ $cat->name }}</a>
        @endforeach
    </div>
    
    <div class="row">
        @forelse($products as $product)
        <div class="col-md-3 mb-4">
            <div class="card product-card h-100">
                @if($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top product-image" alt="{{ $product->name }}">
                @else
                <img src="https://via.placeholder.com/300x250?text={{ urlencode($product->name) }}" class="card-img-top product-image" alt="No Image">
                @endif
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="text-muted small">{{ $product->category->name }}</p>
                    <p class="text-primary fw-bold fs-5">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                    <p class="small text-muted">Stok: {{ $product->stock }}</p>
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
        @empty
        <div class="col-12">
            <div class="alert alert-info">Tidak ada produk tersedia.</div>
        </div>
        @endforelse
    </div>
    
    <div class="mt-4">
        {{ $products->links() }}
    </div>
</div>
@endsection