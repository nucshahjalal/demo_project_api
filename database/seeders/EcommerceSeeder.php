<?php

namespace Database\Seeders;

use App\Modules\Ecommerce\Models\Category;
use App\Modules\Ecommerce\Models\Product;
use App\Modules\Ecommerce\Models\ProductImage;
use Illuminate\Database\Seeder;

class EcommerceSeeder extends Seeder
{
    public function run(): void
    {
        // Create Categories
        $electronics = Category::create(['name' => 'Electronics', 'slug' => 'electronics', 'description' => 'Electronic devices', 'is_active' => true]);
        $clothing = Category::create(['name' => 'Clothing', 'slug' => 'clothing', 'description' => 'Fashion items', 'is_active' => true]);

        // Create Products
        $product1 = Product::create([
            'category_id' => $electronics->id,
            'name' => 'Smartphone',
            'slug' => 'smartphone',
            'description' => 'Latest smartphone with great features',
            'price' => 699.99,
            'stock' => 50,
            'is_active' => true,
        ]);

        $product2 = Product::create([
            'category_id' => $electronics->id,
            'name' => 'Laptop',
            'slug' => 'laptop',
            'description' => 'High performance laptop',
            'price' => 1299.99,
            'stock' => 30,
            'is_active' => true,
        ]);

        $product3 = Product::create([
            'category_id' => $clothing->id,
            'name' => 'T-Shirt',
            'slug' => 't-shirt',
            'description' => 'Comfortable cotton t-shirt',
            'price' => 19.99,
            'stock' => 100,
            'is_active' => true,
        ]);

        // Create Product Images (simulate with placeholder)
        ProductImage::create(['product_id' => $product1->id, 'image_path' => 'products/smartphone.jpg', 'is_primary' => true]);
        ProductImage::create(['product_id' => $product2->id, 'image_path' => 'products/laptop.jpg', 'is_primary' => true]);
        ProductImage::create(['product_id' => $product3->id, 'image_path' => 'products/tshirt.jpg', 'is_primary' => true]);
    }
}
