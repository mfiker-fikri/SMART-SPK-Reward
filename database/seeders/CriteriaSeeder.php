<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // I1-I6
        \App\Models\Criteria::insert([
            'id' => 1,
            'criteria' => 'Kebaruan',
            'value_quality' => 95,
            'categorie_id' => 1,
        ]);
        \App\Models\Criteria::insert([
            'id' => 2,
            'criteria' => 'Kemanfaatan',
            'value_quality' => 90,
            'categorie_id' => 1,
        ]);
        \App\Models\Criteria::insert([
            'id' => 3,
            'criteria' => 'Peran Serta',
            'value_quality' => 90,
            'categorie_id' => 1,
        ]);
        \App\Models\Criteria::insert([
            'id' => 4,
            'criteria' => 'Dapat Ditransfer/Direplikasi',
            'value_quality' => 85,
            'categorie_id' => 1,
        ]);
        \App\Models\Criteria::insert([
            'id' => 5,
            'criteria' => 'Karya Nyata dan Penciptaan Nilai Tambah',
            'value_quality' => 85,
            'categorie_id' => 1,
        ]);
        \App\Models\Criteria::insert([
            'id' => 6,
            'criteria' => 'Kesinambungan dan Konsistensi Prestasi Kerja',
            'value_quality' => 80,
            'categorie_id' => 1,
        ]);

        // T1-T6
        \App\Models\Criteria::insert([
            'id' => 7,
            'criteria' => 'Pengetahuan Kerja',
            'value_quality' => 95,
            'categorie_id' => 2,
        ]);
        \App\Models\Criteria::insert([
            'id' => 8,
            'criteria' => 'Analisis dan Pemecahan Masalah',
            'value_quality' => 95,
            'categorie_id' => 2,
        ]);
        \App\Models\Criteria::insert([
            'id' => 9,
            'criteria' => 'Tanggung Jawab Terhadap Pekerjaan',
            'value_quality' => 95,
            'categorie_id' => 2,
        ]);
        \App\Models\Criteria::insert([
            'id' => 10,
            'criteria' => 'Disiplin',
            'value_quality' => 95,
            'categorie_id' => 2,
        ]);
        \App\Models\Criteria::insert([
            'id' => 11,
            'criteria' => 'Komitmen',
            'value_quality' => 90,
            'categorie_id' => 2,
        ]);
        \App\Models\Criteria::insert([
            'id' => 12,
            'criteria' => 'Kerja Sama',
            'value_quality' => 90,
            'categorie_id' => 2,
        ]);
    }
}
