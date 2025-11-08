<?php
   namespace App\Http\Controllers;
   
   use App\Models\Product;
   use Illuminate\Http\Request;
   
   class ProductController extends Controller
   {
       public function index()
       {
           $products = Product::all();
           return view('products.index', compact('products'));
       }
       
       public function create()
       {
           return view('products.create');
       }
       
       public function store(Request $request)
       {
           $request->validate([
               'nama_produk' => 'required',
               'merek' => 'required',
               'harga' => 'required|numeric',
               'stok' => 'required|integer',
               'gambar' => 'image|mimes:jpeg,png,jpg|max:2048'
           ]);
           
           $data = $request->all();
           
           if ($request->hasFile('gambar')) {
               $file = $request->file('gambar');
               $filename = time() . '_' . $file->getClientOriginalName();
               $file->move(public_path('images/products'), $filename);
               $data['gambar'] = $filename;
           }
           
           Product::create($data);
           return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan');
       }
       
       public function edit($id)
       {
           $product = Product::findOrFail($id);
           return view('products.edit', compact('product'));
       }
       
       public function update(Request $request, $id)
       {
           $product = Product::findOrFail($id);
           $data = $request->all();
           
           if ($request->hasFile('gambar')) {
               // Hapus gambar lama
               if ($product->gambar) {
                   @unlink(public_path('images/products/' . $product->gambar));
               }
               
               $file = $request->file('gambar');
               $filename = time() . '_' . $file->getClientOriginalName();
               $file->move(public_path('images/products'), $filename);
               $data['gambar'] = $filename;
           }
           
           $product->update($data);
           return redirect()->route('products.index')->with('success', 'Produk berhasil diupdate');
       }
       
       public function destroy($id)
       {
           $product = Product::findOrFail($id);
           if ($product->gambar) {
               @unlink(public_path('images/products/' . $product->gambar));
           }
           $product->delete();
           return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus');
       }
   }