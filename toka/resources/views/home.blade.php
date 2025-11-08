@extends('layouts.app')

@section('content')
<div class="jumbotron text-center py-5" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; border-radius: 15px; margin-bottom: 30px;">
    <h1 class="display-3"><i class="fas fa-camera-retro"></i> Selamat Datang di TOKA</h1>
    <p class="lead">Toko Kamera Terlengkap dan Terpercaya</p>
    <hr class="my-4" style="border-color: rgba(255,255,255,0.3);">
    <p>Temukan kamera impian Anda dengan harga terbaik</p>
    <a class="btn btn-light btn-lg" href="{{ route('products.index') }}" role="button">
        <i class="fas fa-shopping-bag"></i> Belanja Sekarang
    </a>
</div>

<div class="row mb-5">
    <div class="col-md-4 mb-4">
        <div class="card text-center h-100">
            <div class="card-body">
                <i class="fas fa-truck fa-3x mb-3" style="color: #3498db;"></i>
                <h5 class="card-title">Pengiriman Cepat</h5>
                <p class="card-text">Gratis ongkir untuk pembelian di atas 5 juta</p>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="card text-center h-100">
            <div class="card-body">
                <i class="fas fa-shield-alt fa-3x mb-3" style="color: #2ecc71;"></i>
                <h5 class="card-title">Garansi Resmi</h5>
                <p class="card-text">Semua produk bergaransi resmi distributor</p>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="card text-center h-100">
            <div class="card-body">
                <i class="fas fa-headset fa-3x mb-3" style="color: #e74c3c;"></i>
                <h5 class="card-title">Customer Service 24/7</h5>
                <p class="card-text">Siap membantu Anda kapan saja</p>
            </div>
        </div>
    </div>
</div>

<h2 class="text-center mb-4">Kategori Produk</h2>
<div class="row">
    <div class="col-md-3 mb-4">
        <div class="card">
            <img src="https://images.unsplash.com/photo-1606980707965-dc12e7d4c9e7?w=400" class="card-img-top" alt="DSLR">
            <div class="card-body text-center">
                <h5 class="card-title">DSLR</h5>
                <p class="card-text">Kamera profesional untuk hasil maksimal</p>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-4">
        <div class="card">
            <img src="https://images.unsplash.com/photo-1612198188060-c7c2a3b66eae?w=400" class="card-img-top" alt="Mirrorless">
            <div class="card-body text-center">
                <h5 class="card-title">Mirrorless</h5>
                <p class="card-text">Teknologi terbaru, ringan dan powerful</p>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-4">
        <div class="card">
            <img src="https://images.unsplash.com/photo-1526170375885-4d8ecf77b99f?w=400" class="card-img-top" alt="Lensa">
            <div class="card-body text-center">
                <h5 class="card-title">Lensa</h5>
                <p class="card-text">Berbagai pilihan lensa berkualitas</p>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-4">
        <div class="card">
            <img src="https://images.unsplash.com/photo-1502920917128-1aa500764cbd?w=400" class="card-img-top" alt="Aksesoris">
            <div class="card-body text-center">
                <h5 class="card-title">Aksesoris</h5>
                <p class="card-text">Pelengkap fotografi Anda</p>
            </div>
        </div>
    </div>
</div>
@endsection