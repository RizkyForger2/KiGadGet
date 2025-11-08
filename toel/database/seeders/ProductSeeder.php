<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $smartphone = Category::where('name', 'Smartphone')->first();
        $laptop = Category::where('name', 'Laptop')->first();
        $tv = Category::where('name', 'TV & Audio')->first();
        $aksesoris = Category::where('name', 'Aksesoris')->first();

        // Produk Smartphone
        if ($smartphone) {
            Product::create([
                'category_id' => $smartphone->id,
                'name' => 'Samsung Galaxy S24',
                'brand' => 'Samsung',
                'description' => 'Smartphone flagship dengan kamera 50MP dan layar Dynamic AMOLED 2X',
                'price' => 12999000,
                'stock' => 15
                'image' => 'products/galaxy.jpg'
            ]);

            Product::create([
                'category_id' => $smartphone->id,
                'name' => 'iPhone 15 Pro',
                'brand' => 'Apple',
                'description' => 'iPhone terbaru dengan chip A17 Pro dan titanium design',
                'price' => 18999000,
                'stock' => 10
            ]);

            Product::create([
                'category_id' => $smartphone->id,
                'name' => 'Xiaomi 13T Pro',
                'brand' => 'Xiaomi',
                'description' => 'Smartphone dengan kamera Leica dan charging 120W',
                'price' => 7999000,
                'stock' => 20
            ]);
        }

        // Produk Laptop
        if ($laptop) {
            Product::create([
                'category_id' => $laptop->id,
                'name' => 'MacBook Air M2',
                'brand' => 'Apple',
                'description' => 'Laptop tipis dengan chip M2 dan layar Liquid Retina',
                'price' => 18999000,
                'stock' => 8
            ]);

            Product::create([
                'category_id' => $laptop->id,
                'name' => 'ASUS ROG Zephyrus G14',
                'brand' => 'ASUS',
                'description' => 'Gaming laptop dengan AMD Ryzen 9 dan RTX 4060',
                'price' => 24999000,
                'stock' => 5
            ]);

            Product::create([
                'category_id' => $laptop->id,
                'name' => 'Lenovo ThinkPad X1 Carbon',
                'brand' => 'Lenovo',
                'description' => 'Business laptop premium dengan Intel Core i7 Gen 13',
                'price' => 22999000,
                'stock' => 7
            ]);
        }

        // Produk TV & Audio
        if ($tv) {
            Product::create([
                'category_id' => $tv->id,
                'name' => 'Samsung QLED 55 inch',
                'brand' => 'Samsung',
                'description' => 'Smart TV 4K dengan teknologi Quantum Dot',
                'price' => 12999000,
                'stock' => 6
            ]);

            Product::create([
                'category_id' => $tv->id,
                'name' => 'Sony Soundbar HT-S400',
                'brand' => 'Sony',
                'description' => 'Soundbar dengan subwoofer wireless 330W',
                'price' => 3999000,
                'stock' => 12
            ]);
        }

        // Produk Aksesoris
        if ($aksesoris) {
            Product::create([
                'category_id' => $aksesoris->id,
                'name' => 'AirPods Pro 2',
                'brand' => 'Apple',
                'description' => 'Earbuds dengan Active Noise Cancellation',
                'price' => 3999000,
                'stock' => 25
            ]);

            Product::create([
                'category_id' => $aksesoris->id,
                'name' => 'Logitech MX Master 3S',
                'brand' => 'Logitech',
                'description' => 'Mouse wireless premium untuk produktivitas',
                'price' => 1599000,
                'stock' => 30
            ]);

            Product::create([
                'category_id' => $aksesoris->id,
                'name' => 'Anker PowerBank 20000mAh',
                'brand' => 'Anker',
                'description' => 'Power bank dengan fast charging 65W',
                'price' => 899000,
                'stock' => 50
            ]);
        }
    }
}