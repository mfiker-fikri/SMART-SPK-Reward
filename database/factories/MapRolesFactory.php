<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MapRolesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // $user_email = factory(\App\Models\Roles);
        return [
            //
            'id' => $this->faker->uuid(),
            'user_email' => 'muhammad@gmail.com',
            'roles_id' => '1'
        ];
    }
}
