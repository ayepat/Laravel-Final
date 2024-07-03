<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use League\CommonMark\Node\Block\Paragraph;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
           'name' =>fake()->sentence,
           'description'=>fake()->paragraph,
           'price' => fake()->randomFloat(2, 1, 10000),
           'category_id'=> rand(1,5),
           'image_url' =>fake()->imageUrl($width=120, $height = 150),

        ];
    }
}
