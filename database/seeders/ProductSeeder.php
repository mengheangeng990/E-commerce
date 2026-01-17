<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'Laptop',
            'pricing' => 999.99,
            'category_id' => 1,
            'description' => 'A powerful laptop for work and gaming.',
            'images' => json_encode(['laptop1.jpg', 'laptop2.jpg'])
        ]);

        Product::create([
            'name' => 'T-Shirt',
            'pricing' => 19.99,
            'category_id' => 2,
            'description' => 'Comfortable cotton t-shirt.',
            'images' => json_encode(['tshirt1.jpg'])
        ]);

        Product::create([
            'name' => 'Programming Book',
            'pricing' => 49.99,
            'category_id' => 3,
            'description' => 'Learn advanced programming techniques.',
            'images' => json_encode(['book1.jpg', 'book2.jpg'])
        ]);
    }
}
