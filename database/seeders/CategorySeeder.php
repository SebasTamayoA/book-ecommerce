<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Category;
use Database\Factories\CategoryFactory;

class CategorySeeder extends Seeder
{
    public function run()
    {
        Category::factory()->count(5)->create();
    }
}


// Ejecutar el seeder
//php artisan db:seed --class=CategorySeeder
