<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
// use Faker\Generator;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // \App\Models\Pegawai::factory(1)->create();
        $faker = Faker::create();
        // ddd($faker);

        // $faker->addProvider(newFaker\Provider\en_US\Address($faker));

        // 1
        \App\Models\Pegawai::insert([
            'id' => Str::uuid(),
            'full_name' => 'Bella Aulia',
            'email'     =>  'bella@mail.com',
            'username' => 'bella',
            'password' => Hash::make('Admin12'),
            //
            'place_birth' => $faker->city(),
            'date_birth' => Carbon::now()->toDateString(),
            //
            'pendidikan_terakhir' => 'S1',
            'nip' => $faker->uuid(),
            'pangkat' => 'Penata Muda',
            'golongan_ruang'  => 'III/a',
            'sk_cpns' => Str::random(18),
            'jabatan_terakhir' => 'Pegawai ASN',
            'unit_kerja' => 'Subbagian Tata Usaha dan Kerumahtanggan Biro',
            //
            'admin_id' => 'cb4f06ce-bf7f-3ec0-8a25-404acf96d3ce',
        ]);
        // 2
        \App\Models\Pegawai::insert([
            'id' => Str::uuid(),
            'full_name' => 'Jupri Abdullah',
            'email'     =>  'jupri@mail.com',
            'username' => 'jupri',
            'password' => Hash::make('Admin12'),
            //
            'place_birth' => $faker->city(),
            'date_birth' => Carbon::now()->toDateString(),
            //
            'pendidikan_terakhir' => 'S1',
            'nip' => $faker->uuid(),
            'pangkat' => 'Penata Muda Tingkat 1',
            'golongan_ruang'  => 'III/b',
            'sk_cpns' => $faker->randomDigitNotNull(),
            'jabatan_terakhir' => 'Pegawai ASN',
            'unit_kerja' => 'Subbagian Tata Usaha dan Kerumahtanggan Biro',
            //
            'admin_id' => 'cb4f06ce-bf7f-3ec0-8a25-404acf96d3ce',
        ]);
        // 3
        \App\Models\Pegawai::insert([
            'id' => Str::uuid(),
            'full_name' => 'Edwin Sasono',
            'email'     =>  'edwin@mail.com',
            'username' => 'edwin',
            'password' => Hash::make('Admin12'),
            //
            'place_birth' => $faker->city(),
            'date_birth' => Carbon::now()->toDateString(),
            //
            'pendidikan_terakhir' => 'S1',
            'nip' => $faker->uuid(),
            'pangkat' => 'Penata Muda Tingkat 1',
            'golongan_ruang'  => 'III/b',
            'sk_cpns' => $faker->randomDigitNotNull(),
            'jabatan_terakhir' => 'Pegawai ASN',
            'unit_kerja' => 'Subbagian Tata Usaha dan Kerumahtanggan Biro',
            //
            'admin_id' => 'cb4f06ce-bf7f-3ec0-8a25-404acf96d3ce',
        ]);
        // 4
        \App\Models\Pegawai::insert([
            'id' => Str::uuid(),
            'full_name' => 'Rio Pratama',
            'email'     =>  'rio@mail.com',
            'username' => 'rio',
            'password' => Hash::make('Admin12'),
            //
            'place_birth' => $faker->city(),
            'date_birth' => Carbon::now()->toDateString(),
            //
            'pendidikan_terakhir' => 'S1',
            'nip' => $faker->uuid(),
            'pangkat' => 'Penata',
            'golongan_ruang'  => 'III/c',
            'sk_cpns' => $faker->randomDigitNotNull(),
            'jabatan_terakhir' => 'Pegawai ASN',
            'unit_kerja' => 'Subbagian Tata Usaha dan Kerumahtanggan Biro',
            //
            'admin_id' => 'cb4f06ce-bf7f-3ec0-8a25-404acf96d3ce',
        ]);
        // 5
        \App\Models\Pegawai::insert([
            'id' => Str::uuid(),
            'full_name' => 'Sania Islamiati',
            'email'     =>  'sania@mail.com',
            'username' => 'sania',
            'password' => Hash::make('Admin12'),
            //
            'place_birth' => $faker->city(),
            'date_birth' => Carbon::now()->toDateString(),
            //
            'pendidikan_terakhir' => 'S1',
            'nip' => $faker->uuid(),
            'pangkat' => 'Penata Tingkat 1',
            'golongan_ruang'  => 'III/d',
            'sk_cpns' => $faker->randomDigitNotNull(),
            'jabatan_terakhir' => 'Pegawai ASN',
            'unit_kerja' => 'Subbagian Tata Usaha dan Kerumahtanggan Biro',
            //
            'admin_id' => 'cb4f06ce-bf7f-3ec0-8a25-404acf96d3ce',
        ]);

        // 6
        \App\Models\Pegawai::insert([
            'id' => Str::uuid(),
            'full_name' => 'Tika Zahra',
            'email'     =>  'tika@mail.com',
            'username' => 'tika',
            'password' => Hash::make('Admin12'),
            //
            'place_birth' => $faker->city(),
            'date_birth' => Carbon::now()->toDateString(),
            //
            'pendidikan_terakhir' => 'S1',
            'nip' => $faker->uuid(),
            'pangkat' => 'Penata',
            'golongan_ruang'  => 'III/c',
            'sk_cpns' => $faker->randomDigitNotNull(),
            'jabatan_terakhir' => 'Pegawai ASN',
            'unit_kerja' => 'Subbagian Tata Usaha dan Kerumahtanggan Biro',
            //
            'admin_id' => 'cb4f06ce-bf7f-3ec0-8a25-404acf96d3ce',
        ]);

        // 7
        \App\Models\Pegawai::insert([
            'id' => Str::uuid(),
            'full_name' => 'Mahmud Yusuf',
            'email'     =>  'mahmud@mail.com',
            'username' => 'mahmud',
            'password' => Hash::make('Admin12'),
            //
            'place_birth' => $faker->city(),
            'date_birth' => Carbon::now()->toDateString(),
            //
            'pendidikan_terakhir' => 'S1',
            'nip' => $faker->uuid(),
            'pangkat' => 'Penata Muda Tingkat 1',
            'golongan_ruang'  => 'III/b',
            'sk_cpns' => $faker->randomDigitNotNull(),
            'jabatan_terakhir' => 'Pegawai ASN',
            'unit_kerja' => 'Subbagian Tata Usaha dan Kerumahtanggan Biro',
            //
            'admin_id' => 'cb4f06ce-bf7f-3ec0-8a25-404acf96d3ce',
        ]);

        // 8
        \App\Models\Pegawai::insert([
            'id' => Str::uuid(),
            'full_name' => 'Dika Atmaja',
            'email'     =>  'dika@mail.com',
            'username' => 'dika',
            'password' => Hash::make('Admin12'),
            //
            'place_birth' => $faker->city(),
            'date_birth' => Carbon::now()->toDateString(),
            //
            'pendidikan_terakhir' => 'S1',
            'nip' => $faker->uuid(),
            'pangkat' => 'Penata Muda',
            'golongan_ruang'  => 'III/a',
            'sk_cpns' => $faker->randomDigitNotNull(),
            'jabatan_terakhir' => 'Pegawai ASN',
            'unit_kerja' => 'Subbagian Tata Usaha dan Kerumahtanggan Biro',
            //
            'admin_id' => 'cb4f06ce-bf7f-3ec0-8a25-404acf96d3ce',
        ]);

        // 9
        \App\Models\Pegawai::insert([
            'id' => Str::uuid(),
            'full_name' => 'Gofur Siregar',
            'email'     =>  'gofur@mail.com',
            'username' => 'gofur',
            'password' => Hash::make('Admin12'),
            //
            'place_birth' => $faker->city(),
            'date_birth' => Carbon::now()->toDateString(),
            //
            'pendidikan_terakhir' => 'S1',
            'nip' => $faker->uuid(),
            'pangkat' => 'Penata Tingkat 1',
            'golongan_ruang'  => 'III/d',
            'sk_cpns' => $faker->randomDigitNotNull(),
            'jabatan_terakhir' => 'Pegawai ASN',
            'unit_kerja' => 'Subbagian Tata Usaha dan Kerumahtanggan Biro',
            //
            'admin_id' => 'cb4f06ce-bf7f-3ec0-8a25-404acf96d3ce',
        ]);

        // 10
        \App\Models\Pegawai::insert([
            'id' => Str::uuid(),
            'full_name' => 'Puput Maharani',
            'email'     =>  'puput@mail.com',
            'username' => 'puput',
            'password' => Hash::make('Admin12'),
            //
            'place_birth' => $faker->city(),
            'date_birth' => Carbon::now()->toDateString(),
            //
            'pendidikan_terakhir' => 'S1',
            'nip' => $faker->uuid(),
            'pangkat' => 'Penata Muda Tingkat 1',
            'golongan_ruang'  => 'III/b',
            'sk_cpns' => $faker->randomDigitNotNull(),
            'jabatan_terakhir' => 'Pegawai ASN',
            'unit_kerja' => 'Subbagian Tata Usaha dan Kerumahtanggan Biro',
            //
            'admin_id' => 'cb4f06ce-bf7f-3ec0-8a25-404acf96d3ce',
        ]);
    }
}
