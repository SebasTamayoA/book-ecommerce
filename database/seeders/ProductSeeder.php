<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        Product::factory()->count(2)->create();
    }
}

// Ejecutar el seeder
//php artisan db:seed --class=ProductSeeder
