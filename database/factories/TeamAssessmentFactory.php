<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class TeamAssessmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'id' => $this->faker->uuid(),
            'full_name' => 'muhammad',
            'email'     =>  'viker1299@gmail.com',
            // 'email_verified_at' => now(),
            'username' => 'muhammad',
            'password' => Hash::make('Admin12'),
            //
            // 'photo' => $this->faker->image(null, 360, 360, 'animals', true, true, 'cats', true),
            // 'place_birth' => $this->faker->city(),
            // 'date_birth' => '2022-06-25',
            // 'date_birth' => $this->faker->date('d-m-Y'),

            // 'nip' => '11170930000005',
            // 'pendidikan' => 's1',
            // 'pangkat_gol' => 'eselon1',
            // 'sk_cpns' => '0',
            // 'jabatan_akhir' => '0',
            //
            // 'status_active' => 1,
            // 'status_id' => 1,
        ];
    }
}
