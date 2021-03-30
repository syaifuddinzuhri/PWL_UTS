<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $code = 'PRD' . $this->faker->unique()->numberBetween($min = 001, $max = 999);
        return [
            'code_product' => $code,
            'name' => $this->faker->words(5, true),
            'price' => $this->faker->numberBetween($min = 1000, $max = 200000),
            'qty' => $this->faker->numberBetween($min = 0, $max = 200),
            'categorie_id' => $this->faker->numberBetween($min = 1, $max = 4),
        ];
    }
}