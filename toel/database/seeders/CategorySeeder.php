<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        Category::create(['name' => 'Smartphone', 'description' => 'Berbagai jenis smartphone']);
        Category::create(['name' => 'Laptop', 'description' => 'Laptop dan notebook']);
        Category::create(['name' => 'TV & Audio', 'description' => 'Televisi dan audio']);
        Category::create(['name' => 'Aksesoris', 'description' => 'Aksesoris elektronik']);
    }
}