<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class PegawaiFactory extends Factory
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
            'full_name' => 'fikri',
            'email' => 'fikri@gmail.com',
            // 'email_verified_at' => now(),
            'username' => 'fikri12',
            'password' => Hash::make('Pegawai12'),
            //
            'place_birth' => $this->faker->city(),
            'date_birth' => Carbon::now()->toDateString(),
            // 'date_birth' => $this->faker->date('d-m-Y'),
            // 'photo' => $this->faker->image(null, 360, 360, 'animals', true, true, 'cats', true),
            // 'date_birth' => '2022-06-25',
            //
            'nip' => '11170930000005',
            'pendidikan_terakhir' => 's1',
            'pangkat' => 'eselon1',
            'golongan_ruang'  => 'eselon1',
            'sk_cpns' => '01',
            'jabatan_terakhir' => 'SDM',
            'unit_kerja' => 'SDM',
            //
            // 'status_active' => 1,
            // 'status_id' => 1,
        ];
    }
}
