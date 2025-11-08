@extends('layouts.app')

@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('orders.index') }}">Pesanan</a></li>
            <li class="breadcrumb-item active">Order #{{ $order->id }}</li>
        </ol>
    </nav>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    <div class="row">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Detail Pesanan #{{ $order->id }}</h5>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Produk</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order->orderDetails as $detail)
                            <tr>
                                <td>
                                    <strong>{{ $detail->product->name }}</strong>
                                    <br>
                                    <small class="text-muted">{{ $detail->product->category->name }}</small>
                                </td>
                                <td>Rp {{ number_format($detail->price, 0, ',', '.') }}</td>
                                <td>{{ $detail->quantity }}</td>
                                <td>Rp {{ number_format($detail->subtotal, 0, ',', '.') }}</td>
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="3" class="text-end"><strong>Total:</strong></td>
                                <td><strong class="text-primary">Rp {{ number_format($order->total, 0, ',', '.') }}</strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0">Informasi Pembeli</h5>
                </div>
                <div class="card-body">
                    <p><strong>Nama:</strong><br>{{ $order->customer_name }}</p>
                    <p><strong>Email:</strong><br>{{ $order->customer_email }}</p>
                    <p><strong>No. Telepon:</strong><br>{{ $order->customer_phone }}</p>
                    <p><strong>Alamat:</strong><br>{{ $order->address }}</p>
                </div>
            </div>
            
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Status Pesanan</h5>
                </div>
                <div class="card-body text-center">
                    @if($order->status == 'pending')
                    <span class="badge bg-warning fs-5 mb-2">Menunggu Konfirmasi</span>
                    <p class="text-muted small">Pesanan Anda sedang menunggu konfirmasi dari admin.</p>
                    @elseif($order->status == 'processing')
                    <span class="badge bg-info fs-5 mb-2">Sedang Diproses</span>
                    <p class="text-muted small">Pesanan Anda sedang diproses dan akan segera dikirim.</p>
                    @elseif($order->status == 'completed')
                    <span class="badge bg-success fs-5 mb-2">Selesai</span>
                    <p class="text-muted small">Pesanan Anda telah selesai. Terima kasih!</p>
                    @else
                    <span class="badge bg-danger fs-5 mb-2">Dibatalkan</span>
                    <p class="text-muted small">Pesanan ini telah dibatalkan.</p>
                    @endif
                    
                    <small class="text-muted">Tanggal Pesanan: {{ $order->created_at->format('d M Y, H:i') }}</small>
                </div>
            </div>
        </div>
    </div>
    
    <div class="mt-4">
        <a href="{{ route('orders.index') }}" class="btn btn-outline-secondary">
            &laquo; Kembali ke Daftar Pesanan
        </a>
        <a href="{{ route('products.index') }}" class="btn btn-primary">
            Lanjut Belanja
        </a>
    </div>
</div>
@endsection