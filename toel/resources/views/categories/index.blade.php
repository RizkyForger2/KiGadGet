@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Semua Kategori</h1>
    
    <div class="row">
        @forelse($categories as $category)
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body text-center">
                    <div class="mb-3">
                        <i class="bi bi-tag fs-1 text-primary"></i>
                    </div>
                    <h3 class="card-title">{{ $category->name }}</h3>
                    <p class="card-text text-muted">{{ $category->description }}</p>
                    <span class="badge bg-primary fs-6 mb-3">{{ $category->products_count }} Produk</span>
                    <div class="d-grid gap-2">
                        <a href="{{ route('products.index', ['category' => $category->id]) }}" 
                           class="btn btn-primary">
                            Lihat Produk
                        </a>
                        <a href="{{ route('categories.show', $category->id) }}" 
                           class="btn btn-outline-secondary">
                            Detail Kategori
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-info text-center">
                <h4>Belum Ada Kategori</h4>
                <p>Kategori akan segera ditambahkan.</p>
            </div>
        </div>
        @endforelse
    </div>
</div>
@endsection