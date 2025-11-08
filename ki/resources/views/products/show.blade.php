@extends('layouts.app')

@section('title', $product->name)

@section('content')
<div class="max-w-5xl mx-auto">
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 p-6">
            <!-- Gambar Produk -->
            <div>
                <div class="bg-gray-100 rounded-lg overflow-hidden">
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" 
                             alt="{{ $product->name }}" 
                             class="w-full h-96 object-contain">
                    @else
                        <div class="w-full h-96 flex items-center justify-center">
                            <i class="fas fa-mobile-alt text-9xl text-gray-300"></i>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Info Produk -->
            <div>
                <span class="inline-block bg-blue-100 text-blue-800 text-sm px-3 py-1 rounded-full mb-2">
                    {{ $product->brand }}
                </span>
                <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $product->name }}</h1>
                
                <div class="mb-6">
                    <p class="text-4xl font-bold text-blue-600">
                        Rp {{ number_format($product->price, 0, ',', '.') }}
                    </p>
                    <p class="text-sm text-gray-600 mt-2">
                        <i class="fas fa-box"></i> 
                        Stok: 
                        <span class="font-semibold {{ $product->stock > 0 ? 'text-green-600' : 'text-red-600' }}">
                            {{ $product->stock }} unit
                        </span>
                    </p>
                </div>

                <!-- Spesifikasi -->
                <div class="border-t border-b py-4 mb-6">
                    <h3 class="font-bold text-gray-800 mb-3">Spesifikasi:</h3>
                    <div class="space-y-2 text-sm">
                        @if($product->processor)
                            <div class="flex items-center">
                                <i class="fas fa-microchip w-6 text-blue-600"></i>
                                <span class="text-gray-600 w-24">Processor:</span>
                                <span class="font-semibold">{{ $product->processor }}</span>
                            </div>
                        @endif
                        @if($product->ram)
                            <div class="flex items-center">
                                <i class="fas fa-memory w-6 text-blue-600"></i>
                                <span class="text-gray-600 w-24">RAM:</span>
                                <span class="font-semibold">{{ $product->ram }}</span>
                            </div>
                        @endif
                        @if($product->storage)
                            <div class="flex items-center">
                                <i class="fas fa-hdd w-6 text-blue-600"></i>
                                <span class="text-gray-600 w-24">Storage:</span>
                                <span class="font-semibold">{{ $product->storage }}</span>
                            </div>
                        @endif
                        @if($product->camera)
                            <div class="flex items-center">
                                <i class="fas fa-camera w-6 text-blue-600"></i>
                                <span class="text-gray-600 w-24">Kamera:</span>
                                <span class="font-semibold">{{ $product->camera }}</span>
                            </div>
                        @endif
                        @if($product->battery)
                            <div class="flex items-center">
                                <i class="fas fa-battery-full w-6 text-blue-600"></i>
                                <span class="text-gray-600 w-24">Baterai:</span>
                                <span class="font-semibold">{{ $product->battery }}</span>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Deskripsi -->
                <div class="mb-6">
                    <h3 class="font-bold text-gray-800 mb-2">Deskripsi:</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">{{ $product->description }}</p>
                </div>

                <!-- Tombol Aksi -->
                <div class="flex gap-3">
                    <a href="{{ route('products.edit', $product) }}" 
                       class="flex-1 bg-yellow-500 hover:bg-yellow-600 text-white py-3 px-4 rounded-lg text-center transition">
                        <i class="fas fa-edit"></i> Edit Produk
                    </a>
                    <form action="{{ route('products.destroy', $product) }}" 
                          method="POST" 
                          onsubmit="return confirm('Yakin ingin menghapus produk ini?')"
                          class="flex-1">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="w-full bg-red-500 hover:bg-red-600 text-white py-3 px-4 rounded-lg transition">
                            <i class="fas fa-trash"></i> Hapus Produk
                        </button>
                    </form>
                </div>
                
                <a href="{{ route('products.index') }}" 
                   class="block mt-3 text-center bg-gray-500 hover:bg-gray-600 text-white py-3 px-4 rounded-lg transition">
                    <i class="fas fa-arrow-left"></i> Kembali ke Daftar
                </a>
            </div>
        </div>
    </div>
</div>
@endsection