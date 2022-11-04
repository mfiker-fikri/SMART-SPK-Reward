<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RolesFactory extends Factory
{
    private static $order = 1;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $description = $this->faker->randomElement(['admin', 'hrd', 'pegawai']);
        return [
            //
            // 'id' => $this->faker->uuid(),
            'description' => $description,
        ];
    }
}
