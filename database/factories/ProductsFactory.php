<?php

namespace Database\Factories;

use App\Models\Products;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Products::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $productsIDs = Products::all()->pluck('id')->toArray();

        return [
            'name' => $this->faker->jobTitle(),
            'description' => $this->faker->catchPhrase(),
            'brand' => $this->faker->imageUrl( 640, 480),
            'category' => $this->faker->citySuffix(),
            'price' => $this->faker->numerify('###,##'),
            'color' => $this->faker->hexColor(),
            'created_at' => $this->faker->date(),
            'updated_at' => $this->faker->date()
        ];
    }
}