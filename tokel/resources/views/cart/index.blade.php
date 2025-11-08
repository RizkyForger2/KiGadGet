@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h2 class="mb-4">Keranjang Belanja</h2>
    
    @if(session('cart') && count(session('cart')) > 0)
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Produk</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>Subtotal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $total = 0; @endphp
                            @foreach(session('cart') as $id => $details)
                            @php $total += $details['price'] * $details['quantity']; @endphp
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        @if($details['image'])
                                        <img src="{{ asset('storage/' . $details['image']) }}" width="80" class="me-3">
                                        @else
                                        <img src="https://via.placeholder.com/80" width="80" class="me-3">
                                        @endif
                                        <span>{{ $details['name'] }}</span>
                                    </div>
                                </td>
                                <td>Rp {{ number_format($details['price'], 0, ',', '.') }}</td>
                                <td>
                                    <form action="{{ route('cart.update') }}" method="POST" class="d-flex align-items-center">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="id" value="{{ $id }}">
                                        <input type="number" name="quantity" value="{{ $details['quantity'] }}" class="form-control form-control-sm" style="width: 70px;" min="1">
                                        <button type="submit" class="btn btn-sm btn-primary ms-2">
                                            <i class="fas fa-sync"></i>
                                        </button>
                                    </form>
                                </td>
                                <td>Rp {{ number_format($details['price'] * $details['quantity'], 0, ',', '.') }}</td>
                                <td>
                                    <form action="{{ route('cart.remove') }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="id" value="{{ $id }}">
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash"></i>
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
                    <div class="d-flex justify-content-between mb-3">
                        <span>Subtotal</span>
                        <span>Rp {{ number_format($total, 0, ',', '.') }}</span>
                    </div>
                    <div class="d-flex justify-content-between mb-3">
                        <span>Ongkir</span>
                        <span>Rp 0</span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between mb-4">
                        <strong>Total</strong>
                        <strong class="text-primary">Rp {{ number_format($total, 0, ',', '.') }}</strong>
                    </div>
                    <button class="btn btn-primary w-100 btn-lg">
                        <i class="fas fa-check"></i> Checkout
                    </button>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="alert alert-info">
        <i class="fas fa-info-circle"></i> Keranjang belanja Anda masih kosong.
        <a href="{{ route('products.index') }}" class="alert-link">Belanja sekarang</a>
    </div>
    @endif
</div>
@endsection