@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2><i class="fas fa-box"></i> Daftar Produk</h2>
    <a href="{{ route('products.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Tambah Produk
    </a>
</div>

@if($products->count() > 0)
<div class="row">
    @foreach($products as $product)
    <div class="col-md-4 mb-4">
        <div class="card h-100">
            @if($product->gambar)
                <img src="{{ asset('images/products/' . $product->gambar) }}" 
                     class="card-img-top" 
                     alt="{{ $product->nama_produk }}"
                     style="height: 250px; object-fit: cover;">
            @else
                <img src="https://via.placeholder.com/400x300?text=No+Image" 
                     class="card-img-top" 
                     alt="No Image"
                     style="height: 250px; object-fit: cover;">
            @endif
            
            <div class="card-body d-flex flex-column">
                <span class="badge bg-info mb-2" style="width: fit-content;">{{ $product->kategori }}</span>
                <h5 class="card-title">{{ $product->nama_produk }}</h5>
                <p class="text-muted mb-2"><i class="fas fa-tag"></i> {{ $product->merek }}</p>
                <p class="card-text">{{ Str::limit($product->deskripsi, 80) }}</p>
                
                <div class="mt-auto">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-primary mb-0">Rp {{ number_format($product->harga, 0, ',', '.') }}</h4>
                        <span class="badge bg-success">Stok: {{ $product->stok }}</span>
                    </div>
                    
                    <div class="d-flex gap-2">
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm flex-fill">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('products.destroy', $product->id) }}" 
                              method="POST" 
                              class="flex-fill"
                              onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm w-100">
                                <i class="fas fa-trash"></i> Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@else
<div class="alert alert-info text-center">
    <i class="fas fa-info-circle"></i> Belum ada produk. Silakan tambah produk baru.
</div>
@endif
@endsection