@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Keranjang Belanja</h1>
    
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif
    
    @if(session('cart') && count(session('cart')) > 0)
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Gambar</th>
                                <th>Produk</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>Subtotal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $total = 0; @endphp
                            @foreach(session('cart') as $id => $item)
                            @php $subtotal = $item['price'] * $item['quantity']; $total += $subtotal; @endphp
                            <tr>
                                <td>
                                    <img src="{{ $item['image'] ?? 'https://via.placeholder.com/80' }}" 
                                         alt="{{ $item['name'] }}" 
                                         style="width: 80px; height: 80px; object-fit: cover;">
                                </td>
                                <td>{{ $item['name'] }}</td>
                                <td>Rp {{ number_format($item['price'], 0, ',', '.') }}</td>
                                <td>
                                    <form action="{{ route('cart.update', $id) }}" method="POST" class="d-inline">
                                        @csrf
                                        <input type="number" name="quantity" value="{{ $item['quantity'] }}" 
                                               min="1" max="99" 
                                               class="form-control form-control-sm" 
                                               style="width: 70px; display: inline-block;"
                                               onchange="this.form.submit()">
                                    </form>
                                </td>
                                <td>Rp {{ number_format($subtotal, 0, ',', '.') }}</td>
                                <td>
                                    <form action="{{ route('cart.remove', $id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" 
                                                onclick="return confirm('Yakin ingin menghapus produk ini?')">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Ringkasan Belanja</h5>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-2">
                        <span>Subtotal:</span>
                        <strong>Rp {{ number_format($total, 0, ',', '.') }}</strong>
                    </div>
                    <div class="d-flex justify-content-between mb-3">
                        <span>Ongkir:</span>
                        <strong>Gratis</strong>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between mb-3">
                        <strong>Total:</strong>
                        <strong class="text-primary">Rp {{ number_format($total, 0, ',', '.') }}</strong>
                    </div>
                    
                    <a href="{{ route('checkout') }}" class="btn btn-success w-100 mb-2">
                        Checkout
                    </a>
                    <a href="{{ route('products.index') }}" class="btn btn-outline-primary w-100">
                        Lanjut Belanja
                    </a>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="alert alert-info text-center">
        <h4>Keranjang Kosong</h4>
        <p>Belum ada produk di keranjang Anda.</p>
        <a href="{{ route('products.index') }}" class="btn btn-primary">Belanja Sekarang</a>
    </div>
    @endif
</div>
@endsection