<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = Faker::create();
        $image = $faker->imageUrl(640, 480, 'cats', true);

        return [
            'product_id' => $faker->numberBetween(1, 10),
            'link' => encrypt($image),
            'main' =>  $faker->boolean,
            'created_at' => $faker->dateTimeBetween('-1 year', 'now')
        ];
    }
}