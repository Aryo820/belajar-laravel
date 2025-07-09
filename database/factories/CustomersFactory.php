<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Customers;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomersFactory extends Factory
{
    protected $model = Customers::class;
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(15),
            'phone' => $this->faker->sentence(10),
            'address' => $this->faker->sentence(10),
        ];
    }
}
