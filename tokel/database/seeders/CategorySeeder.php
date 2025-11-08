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
                'description' => 'Berbagai jenis smartphone terbaru dan berkualitas'
            ],
            [
                'name' => 'Laptop',
                'description' => 'Laptop untuk gaming, kantor, dan desain'
            ],
            [
                'name' => 'TV & Audio',
                'description' => 'Televisi smart TV dan sistem audio berkualitas'
            ],
            [
                'name' => 'Kamera',
                'description' => 'Kamera digital dan aksesoris fotografi'
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}