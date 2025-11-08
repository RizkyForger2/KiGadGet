<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = session()->get('cart', []);
        $total = 0;
        
        foreach ($cartItems as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        
        return view('cart.index', compact('cartItems', 'total'));
    }
    
    public function add(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        
        $cart = session()->get('cart', []);
        
        // Jika produk sudah ada di keranjang, tambah quantity
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            // Jika produk belum ada, tambahkan baru
            $cart[$id] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
                'image' => $product->image,
                'stock' => $product->stock
            ];
        }
        
        session()->put('cart', $cart);
        
        return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }
    
    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'quantity' => 'required|integer|min:1'
        ]);
        
        $cart = session()->get('cart', []);
        
        if (isset($cart[$request->id])) {
            // Cek stok
            $product = Product::find($request->id);
            if ($request->quantity > $product->stock) {
                return redirect()->back()->with('error', 'Jumlah melebihi stok yang tersedia!');
            }
            
            $cart[$request->id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
            
            return redirect()->back()->with('success', 'Keranjang berhasil diupdate!');
        }
        
        return redirect()->back()->with('error', 'Produk tidak ditemukan!');
    }
    
    public function remove(Request $request)
    {
        $cart = session()->get('cart', []);
        
        if (isset($cart[$request->id])) {
            unset($cart[$request->id]);
            session()->put('cart', $cart);
            
            return redirect()->back()->with('success', 'Produk berhasil dihapus dari keranjang!');
        }
        
        return redirect()->back()->with('error', 'Produk tidak ditemukan!');
    }
    
    public function clear()
    {
        session()->forget('cart');
        return redirect()->route('cart.index')->with('success', 'Keranjang berhasil dikosongkan!');
    }
}