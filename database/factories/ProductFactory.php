<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

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
    public function definition()
    {
        return [
            'category_id'   => Category::factory(),
            'sku'           => $this->faker->unique()->bothify('?###??##'),
            'name'          => $this->faker->name,
            'quantity'      => $this->faker->numberBetween(1, 100),
            'price'         => $this->faker->numberBetween(1, 100),
        ];
    }
}
