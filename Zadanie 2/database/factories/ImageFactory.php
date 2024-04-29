<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;
use App\Models\Image;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ImageFactory extends Factory
{
    private static $productId = 0;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = Faker::create();

        $imagePath = $faker->imageUrl(640, 640); // Generates a random image file with specific dimensions

        self::$productId++; // Increment the product_id

        return [
            'product_id' => self::$productId,
            'link' => encrypt('images/' . 'ascpect_1_1.png'),
            'main' =>  true,
            'created_at' => $faker->dateTimeBetween('-1 year', 'now')
        ];
    }
}