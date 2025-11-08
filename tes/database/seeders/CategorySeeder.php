<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            [
                'name' => 'Smartphone',
                'description' => 'Berbagai jenis smartphone dari berbagai brand'
            ],
            [
                'name' => 'Laptop',
                'description' => 'Laptop untuk kebutuhan kerja dan gaming'
            ],
            [
                'name' => 'TV & Audio',
                'description' => 'Televisi, speaker, dan perangkat audio lainnya'
            ],
            [
                'name' => 'Aksesoris',
                'description' => 'Aksesoris elektronik seperti charger, kabel, dll'
            ],
            [
                'name' => 'Gaming',
                'description' => 'Perangkat gaming seperti konsol, controller, dll'
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}