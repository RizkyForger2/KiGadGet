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
                'name' => 'Samsung Galaxy S23 Ultra',
                'description' => 'Flagship Samsung dengan kamera 200MP, layar 6.8 inch Dynamic AMOLED, dan prosesor Snapdragon 8 Gen 2',
                'price' => 18999000,
                'stock' => 15,
                'brand' => 'Samsung'
            ],
            [
                'category_id' => 1,
                'name' => 'iPhone 15 Pro Max',
                'description' => 'iPhone terbaru dengan chip A17 Pro, titanium design, dan kamera 48MP',
                'price' => 23999000,
                'stock' => 10,
                'brand' => 'Apple'
            ],
            [
                'category_id' => 1,
                'name' => 'Xiaomi 14 Pro',
                'description' => 'Flagship Xiaomi dengan Snapdragon 8 Gen 3 dan kamera Leica',
                'price' => 12999000,
                'stock' => 20,
                'brand' => 'Xiaomi'
            ],
            
            // Laptop
            [
                'category_id' => 2,
                'name' => 'ASUS ROG Strix G16',
                'description' => 'Laptop gaming dengan Intel Core i9, RTX 4070, RAM 32GB',
                'price' => 28999000,
                'stock' => 8,
                'brand' => 'ASUS'
            ],
            [
                'category_id' => 2,
                'name' => 'MacBook Pro 16 M3 Max',
                'description' => 'MacBook Pro dengan chip M3 Max, 36GB RAM, untuk profesional',
                'price' => 54999000,
                'stock' => 5,
                'brand' => 'Apple'
            ],
            [
                'category_id' => 2,
                'name' => 'Lenovo ThinkPad X1 Carbon',
                'description' => 'Laptop bisnis premium dengan Intel Core i7 Gen 13',
                'price' => 24999000,
                'stock' => 12,
                'brand' => 'Lenovo'
            ],
            
            // TV & Audio
            [
                'category_id' => 3,
                'name' => 'Samsung QLED 4K 65 Inch',
                'description' => 'Smart TV 65 inch dengan teknologi QLED dan HDR10+',
                'price' => 15999000,
                'stock' => 10,
                'brand' => 'Samsung'
            ],
            [
                'category_id' => 3,
                'name' => 'Sony Bravia XR A80L OLED 55"',
                'description' => 'TV OLED 55 inch dengan Cognitive Processor XR',
                'price' => 21999000,
                'stock' => 7,
                'brand' => 'Sony'
            ],
            [
                'category_id' => 3,
                'name' => 'JBL Bar 9.1 Soundbar',
                'description' => 'Soundbar premium dengan Dolby Atmos dan wireless subwoofer',
                'price' => 8999000,
                'stock' => 15,
                'brand' => 'JBL'
            ],
            
            // Kamera
            [
                'category_id' => 4,
                'name' => 'Canon EOS R6 Mark II',
                'description' => 'Kamera mirrorless full-frame 24MP dengan 4K 60fps',
                'price' => 42999000,
                'stock' => 6,
                'brand' => 'Canon'
            ],
            [
                'category_id' => 4,
                'name' => 'Sony A7 IV',
                'description' => 'Kamera hybrid 33MP untuk foto dan video profesional',
                'price' => 39999000,
                'stock' => 4,
                'brand' => 'Sony'
            ],
            [
                'category_id' => 4,
                'name' => 'Nikon Z8',
                'description' => 'Kamera mirrorless flagship dengan 45.7MP dan 8K video',
                'price' => 62999000,
                'stock' => 3,
                'brand' => 'Nikon'
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}