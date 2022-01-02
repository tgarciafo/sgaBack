<?php

namespace Database\Factories;

use App\Models\Products;
use App\Models\Clients;
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
        $client = Clients::count() >=20 ? Clients::inRandomOrder()->first()->client_id: Clients::factory();
        return [
            'client_id' => $client,
            'ean' => $this->faker->numberBetween($min = 11111111111111, $max = 9999999999999),
            'reference' => $this->faker->numberBetween($min = 1111111, $max = 9999999),
            'description_prod' => $this->faker->randomElement(['Suc de', 'Caixes']),
            'quantity' => $this->faker->numberBetween($min = 1, $max = 999),
        ];
    }
}
