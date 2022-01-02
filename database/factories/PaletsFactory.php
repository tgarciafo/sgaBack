<?php

namespace Database\Factories;

use App\Models\Palets;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaletsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Palets::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'sscc' => $this->faker->numberBetween($min = 384100557715000001, $max = 384100557715999999), 
            'product_id' => $this->faker->randomElement([1]), 
            'data_entrada'=> $this->faker->dateTimeBetween($startDate = '-1 year', $endDate = 'now'), 
            'client_id' => 1, 
            'albara_entrada' => $this->faker->numberBetween($min = 2021001, $max = 2021100),
            'lot' => $this->faker->numberBetween($min = 100000, $max = 999999), 
            'qty' => $this->faker->numberBetween($min = 1, $max = 999), 
            'caducitat' => '2022-04-05', 
            'albara_sortida'  => NULL,
            'data_sortida' => NULL,
            'location_id' => $this->faker->randomElement([1, 2]),
        ];
    }
}
