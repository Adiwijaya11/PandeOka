<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Services\ProductCatalog;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = ProductCatalog::rawProducts();

        foreach ($products as $item) {
            Product::updateOrCreate(
                ['slug' => $item['slug']],
                [
                    'name' => $item['name'],
                    'category' => $item['category'],
                    'category_slug' => $item['category_slug'],
                    'price' => $item['price'],
                    'original_price' => $item['original_price'] ?? null,
                    'discount' => $item['discount'] ?? 0,
                    'rating' => $item['rating'] ?? 5.0,
                    'reviews_count' => $item['reviews_count'] ?? 0,
                    'sales_count' => $item['sales_count'] ?? 0,
                    'wood_type' => $item['wood_type'] ?? null,
                    'finish' => $item['finish'] ?? null,
                    'dimensions' => $item['dimensions'] ?? null,
                    'weight' => $item['weight'] ?? null,
                    'warranty' => $item['warranty'] ?? null,
                    'stock' => $item['stock'] ?? 10,
                    'image' => $item['image'],
                    'gallery' => $item['gallery'] ?? [],
                    'description' => $item['description'] ?? null,
                    'features' => $item['features'] ?? [],
                    'badges' => $item['badges'] ?? [],
                ]
            );
        }
    }
}
