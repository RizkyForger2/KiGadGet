<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // Halaman daftar semua pesanan
    public function index()
    {
        $orders = Order::with('orderDetails.product')->latest()->paginate(10);
        return view('orders.index', compact('orders'));
    }
    
    // Halaman checkout
    public function checkout()
    {
        $cart = session()->get('cart', []);
        
        if(empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Keranjang kosong!');
        }
        
        $total = 0;
        foreach($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        
        return view('orders.checkout', compact('cart', 'total'));
    }
    
    // Proses buat pesanan
    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email',
            'customer_phone' => 'required|string|max:20',
            'address' => 'required|string'
        ]);
        
        $cart = session()->get('cart', []);
        
        if(empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Keranjang kosong!');
        }
        
        $total = 0;
        foreach($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        
        // Buat order
        $order = Order::create([
            'customer_name' => $request->customer_name,
            'customer_email' => $request->customer_email,
            'customer_phone' => $request->customer_phone,
            'address' => $request->address,
            'total' => $total,
            'status' => 'pending'
        ]);
        
        // Buat order details
        foreach($cart as $id => $item) {
            OrderDetail::create([
                'order_id' => $order->id,
                'product_id' => $id,
                'quantity' => $item['quantity'],
                'price' => $item['price'],
                'subtotal' => $item['price'] * $item['quantity']
            ]);
        }
        
        // Hapus cart
        session()->forget('cart');
        
        return redirect()->route('order.show', $order->id)
                         ->with('success', 'Pesanan berhasil dibuat!');
    }
    
    // Detail pesanan
    public function show($id)
    {
        $order = Order::with('orderDetails.product')->findOrFail($id);
        return view('orders.show', compact('order'));
    }
}