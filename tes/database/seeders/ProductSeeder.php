<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $products = [
            // Smartphone
            [
                'category_id' => 1,
                'name' => 'Samsung Galaxy S24 Ultra',
                'description' => 'Smartphone flagship Samsung dengan layar 6.8 inch Dynamic AMOLED, chipset Snapdragon 8 Gen 3, RAM 12GB, storage 256GB. Kamera 200MP dengan AI enhancement.',
                'price' => 18999000,
                'stock' => 15,
                'image' => null
            ],
            [
                'category_id' => 1,
                'name' => 'iPhone 15 Pro Max',
                'description' => 'iPhone terbaru dengan chip A17 Pro, layar Super Retina XDR 6.7 inch, kamera 48MP dengan optical zoom 5x. Tersedia dalam berbagai warna.',
                'price' => 21999000,
                'stock' => 10,
                'image' => null
            ],
            [
                'category_id' => 1,
                'name' => 'Xiaomi 14 Pro',
                'description' => 'Smartphone dengan Snapdragon 8 Gen 3, layar AMOLED 120Hz, kamera Leica triple 50MP, fast charging 120W.',
                'price' => 12999000,
                'stock' => 20,
                'image' => null
            ],
            
            // Laptop
            [
                'category_id' => 2,
                'name' => 'MacBook Air M3',
                'description' => 'Laptop tipis dan ringan dengan chip M3, layar Liquid Retina 13.6 inch, RAM 8GB, SSD 256GB. Ideal untuk produktivitas.',
                'price' => 16999000,
                'stock' => 8,
                'image' => null
            ],
            [
                'category_id' => 2,
                'name' => 'ASUS ROG Strix G16',
                'description' => 'Laptop gaming dengan Intel Core i9 Gen 13, RTX 4070, RAM 16GB DDR5, SSD 1TB, layar 16 inch 165Hz.',
                'price' => 25999000,
                'stock' => 5,
                'image' => null
            ],
            [
                'category_id' => 2,
                'name' => 'Lenovo ThinkPad X1 Carbon',
                'description' => 'Laptop bisnis premium dengan Intel Core i7, RAM 16GB, SSD 512GB, layar 14 inch 2.8K OLED.',
                'price' => 22999000,
                'stock' => 12,
                'image' => null
            ],
            
            // TV & Audio
            [
                'category_id' => 3,
                'name' => 'Samsung QLED 65 inch',
                'description' => 'Smart TV QLED 4K dengan Quantum Processor 4K, HDR10+, dan Smart Hub untuk streaming.',
                'price' => 14999000,
                'stock' => 7,
                'image' => null
            ],
            [
                'category_id' => 3,
                'name' => 'Sony Soundbar HT-S400',
                'description' => 'Soundbar 2.1ch dengan wireless subwoofer, Bluetooth connectivity, total output 330W.',
                'price' => 3499000,
                'stock' => 15,
                'image' => null
            ],
            
            // Aksesoris
            [
                'category_id' => 4,
                'name' => 'Anker PowerBank 20000mAh',
                'description' => 'PowerBank kapasitas besar dengan fast charging PD 30W, bisa charge laptop dan smartphone.',
                'price' => 599000,
                'stock' => 50,
                'image' => null
            ],
            [
                'category_id' => 4,
                'name' => 'AirPods Pro Gen 2',
                'description' => 'Earbuds premium dengan Active Noise Cancellation, Transparency Mode, Spatial Audio.',
                'price' => 3799000,
                'stock' => 25,
                'image' => null
            ],
            
            // Gaming
            [
                'category_id' => 5,
                'name' => 'PlayStation 5 Slim',
                'description' => 'Konsol gaming generasi terbaru dengan SSD ultra-cepat, ray tracing, support 4K 120fps.',
                'price' => 7999000,
                'stock' => 10,
                'image' => null
            ],
            [
                'category_id' => 5,
                'name' => 'Xbox Series X',
                'description' => 'Konsol gaming powerful dengan 12 teraflops GPU, SSD custom 1TB, support hingga 8K.',
                'price' => 7499000,
                'stock' => 8,
                'image' => null
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}