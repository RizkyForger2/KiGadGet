@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-warning text-dark">
                <h4 class="mb-0"><i class="fas fa-edit"></i> Edit Produk</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label for="nama_produk" class="form-label">Nama Produk <span class="text-danger">*</span></label>
                        <input type="text" 
                               class="form-control @error('nama_produk') is-invalid @enderror" 
                               id="nama_produk" 
                               name="nama_produk" 
                               value="{{ old('nama_produk', $product->nama_produk) }}" 
                               required>
                        @error('nama_produk')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="merek" class="form-label">Merek <span class="text-danger">*</span></label>
                            <input type="text" 
                                   class="form-control @error('merek') is-invalid @enderror" 
                                   id="merek" 
                                   name="merek" 
                                   value="{{ old('merek', $product->merek) }}" 
                                   required>
                            @error('merek')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="kategori" class="form-label">Kategori <span class="text-danger">*</span></label>
                            <select class="form-select @error('kategori') is-invalid @enderror" 
                                    id="kategori" 
                                    name="kategori" 
                                    required>
                                <option value="">Pilih Kategori</option>
                                <option value="DSLR" {{ old('kategori', $product->kategori) == 'DSLR' ? 'selected' : '' }}>DSLR</option>
                                <option value="Mirrorless" {{ old('kategori', $product->kategori) == 'Mirrorless' ? 'selected' : '' }}>Mirrorless</option>
                                <option value="Compact" {{ old('kategori', $product->kategori) == 'Compact' ? 'selected' : '' }}>Compact</option>
                                <option value="Lensa" {{ old('kategori', $product->kategori) == 'Lensa' ? 'selected' : '' }}>Lensa</option>
                                <option value="Aksesoris" {{ old('kategori', $product->kategori) == 'Aksesoris' ? 'selected' : '' }}>Aksesoris</option>
                            </select>
                            @error('kategori')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control @error('deskripsi') is-invalid @enderror" 
                                  id="deskripsi" 
                                  name="deskripsi" 
                                  rows="4">{{ old('deskripsi', $product->deskripsi) }}</textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="harga" class="form-label">Harga <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input type="number" 
                                       class="form-control @error('harga') is-invalid @enderror" 
                                       id="harga" 
                                       name="harga" 
                                       value="{{ old('harga', $product->harga) }}" 
                                       min="0" 
                                       required>
                                @error('harga')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="stok" class="form-label">Stok <span class="text-danger">*</span></label>
                            <input type="number" 
                                   class="form-control @error('stok') is-invalid @enderror" 
                                   id="stok" 
                                   name="stok" 
                                   value="{{ old('stok', $product->stok) }}" 
                                   min="0" 
                                   required>
                            @error('stok')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="gambar" class="form-label">Gambar Produk</label>
                        
                        @if($product->gambar)
                        <div class="mb-2">
                            <img src="{{ asset('images/products/' . $product->gambar) }}" 
                                 alt="Current Image" 
                                 class="img-thumbnail" 
                                 style="max-width: 200px;">
                            <p class="text-muted small mb-0">Gambar saat ini</p>
                        </div>
                        @endif
                        
                        <input type="file" 
                               class="form-control @error('gambar') is-invalid @enderror" 
                               id="gambar" 
                               name="gambar" 
                               accept="image/*"
                               onchange="previewImage(event)">
                        <small class="text-muted">Format: JPG, JPEG, PNG (Max: 2MB) - Kosongkan jika tidak ingin mengubah gambar</small>
                        @error('gambar')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        
                        <div id="imagePreview" class="mt-3" style="display: none;">
                            <img id="preview" src="" alt="Preview" class="img-thumbnail" style="max-width: 300px;">
                            <p class="text-muted small mb-0">Preview gambar baru</p>
                        </div>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Update Produk
                        </button>
                        <a href="{{ route('products.index') }}" class="btn btn-secondary">
                            <i class="fas fa-times"></i> Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@section('scripts')
<script>
function previewImage(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('preview').src = e.target.result;
            document.getElementById('imagePreview').style.display = 'block';
        }
        reader.readAsDataURL(file);
    }
}
</script>
@endsection
@endsection