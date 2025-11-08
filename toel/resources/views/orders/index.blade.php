@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Daftar Pesanan</h1>
    
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif
    
    @forelse($orders as $order)
    <div class="card mb-3">
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col-md-2">
                    <strong>Order #{{ $order->id }}</strong>
                    <br>
                    <small class="text-muted">{{ $order->created_at->format('d M Y') }}</small>
                </div>
                <div class="col-md-3">
                    <strong>{{ $order->customer_name }}</strong>
                    <br>
                    <small class="text-muted">{{ $order->customer_email }}</small>
                </div>
                <div class="col-md-2">
                    {{ $order->orderDetails->count() }} Item
                </div>
                <div class="col-md-2">
                    <strong class="text-primary">Rp {{ number_format($order->total, 0, ',', '.') }}</strong>
                </div>
                <div class="col-md-2">
                    @if($order->status == 'pending')
                    <span class="badge bg-warning">Pending</span>
                    @elseif($order->status == 'processing')
                    <span class="badge bg-info">Diproses</span>
                    @elseif($order->status == 'completed')
                    <span class="badge bg-success">Selesai</span>
                    @else
                    <span class="badge bg-danger">Dibatalkan</span>
                    @endif
                </div>
                <div class="col-md-1">
                    <a href="{{ route('order.show', $order->id) }}" class="btn btn-sm btn-outline-primary">
                        Detail
                    </a>
                </div>
            </div>
        </div>
    </div>
    @empty
    <div class="alert alert-info text-center">
        <h4>Belum Ada Pesanan</h4>
        <p>Anda belum memiliki pesanan.</p>
        <a href="{{ route('products.index') }}" class="btn btn-primary">Mulai Belanja</a>
    </div>
    @endforelse
    
    <!-- Pagination -->
    @if($orders->hasPages())
    <div class="d-flex justify-content-center mt-4">
        {{ $orders->links() }}
    </div>
    @endif
</div>
@endsection