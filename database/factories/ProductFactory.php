<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->unique()->words(4, true).' Kayu Solid';

        return [
            'name' => ucwords($name),
            'slug' => Str::slug($name).'-'.fake()->unique()->numberBetween(100, 999),
            'category' => 'Ruang Tamu',
            'category_slug' => 'ruang-tamu',
            'price' => fake()->numberBetween(1000000, 8000000),
            'original_price' => fake()->numberBetween(8500000, 10000000),
            'discount' => fake()->numberBetween(5, 25),
            'rating' => fake()->randomFloat(1, 4, 5),
            'reviews_count' => fake()->numberBetween(10, 200),
            'sales_count' => fake()->numberBetween(5, 100),
            'wood_type' => 'Kayu Jati Solid TPK Grade A',
            'finish' => 'Natural Doff',
            'dimensions' => '180 cm x 80 cm x 75 cm',
            'weight' => '35 kg',
            'warranty' => '5 Tahun Konstruksi',
            'stock' => fake()->numberBetween(3, 20),
            'image' => 'https://images.unsplash.com/photo-1555041469-a586c61ea9bc?auto=format&fit=crop&w=900&q=80',
            'gallery' => [
                'https://images.unsplash.com/photo-1555041469-a586c61ea9bc?auto=format&fit=crop&w=900&q=80',
            ],
            'description' => fake()->paragraph(),
            'features' => [
                '100% Kayu Solid Asli',
                'Finishing Ramah Lingkungan',
            ],
            'badges' => ['BEST SELLER', 'GRATIS ONGKIR'],
        ];
    }
}
