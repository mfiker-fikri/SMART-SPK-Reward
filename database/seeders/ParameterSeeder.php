<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ParameterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // I1
        \App\Models\Parameter::insert([
            'id' => 1,
            'parameter' => 'Hasil Studi Tiru dari Kementerian/Lembaga Lain dengan Mengadaptasi Dari yang Sudah Ada',
            'grade' => 1,
            'criteria_id' => 1,
        ]);
        \App\Models\Parameter::insert([
            'id' => 2,
            'parameter' => 'Hasil Studi Tiru dari Kementerian/Lembaga Lain dengan Mengembangkan Dari yang Sudah Ada',
            'grade' => 2,
            'criteria_id' => 1,
        ]);
        \App\Models\Parameter::insert([
            'id' => 3,
            'parameter' => 'Hasil Studi Tiru dari Kementerian/Lembaga Lain dengan Melakukan Penyempurnaan Sehingga Output yang Dihasilkan Bukan Lagi Aslinya',
            'grade' => 3,
            'criteria_id' => 1,
        ]);
        \App\Models\Parameter::insert([
            'id' => 4,
            'parameter' => 'Hasil Ide dan Pemikiran Sendiri dan Dikembangkan Menjadi Inovasi yang Mendukung Proses Pelaksanaan Tugas dan Fungsi',
            'grade' => 4,
            'criteria_id' => 1,
        ]);

        // I2
        \App\Models\Parameter::insert([
            'id' => 5,
            'parameter' => 'Bermanfaat Untuk Satuan Kerja',
            'grade' => 1,
            'criteria_id' => 2,
        ]);
        \App\Models\Parameter::insert([
            'id' => 6,
            'parameter' => 'Bermanfaat Untuk Unit Kerja',
            'grade' => 2,
            'criteria_id' => 2,
        ]);
        \App\Models\Parameter::insert([
            'id' => 7,
            'parameter' => 'Bermanfaat Untuk Kementerian',
            'grade' => 3,
            'criteria_id' => 2,
        ]);
        \App\Models\Parameter::insert([
            'id' => 8,
            'parameter' => 'Bermanfaat Untuk Negara/Masyarakat',
            'grade' => 4,
            'criteria_id' => 2,
        ]);

        //  I3
        \App\Models\Parameter::insert([
            'id' => 9,
            'parameter' => 'Proses Terciptanya Inovasi Melibatkan Tim Besar Yang Meliputi Pegawai Antar Unit Kerja Dimana Pegawai Dimaksud Merupakan Salah Satu Anggotanya',
            'grade' => 1,
            'criteria_id' => 3,
        ]);
        \App\Models\Parameter::insert([
            'id' => 10,
            'parameter' => 'Sebagai Pencetus Ide dan Proses Penyelesaian Proses Terciptanya Inovasi Dikerjakan Oleh Tim Ahli Lainnya',
            'grade' => 2,
            'criteria_id' => 3,
        ]);
        \App\Models\Parameter::insert([
            'id' => 11,
            'parameter' => 'Sebagai Pencetus Ide dan Memimpim Tim Dalam Proses Terciptanya Karya Inovasi yang Bermanfaat Untuk Pelaksanaan Tugas Fungsi',
            'grade' => 3,
            'criteria_id' => 3,
        ]);
        \App\Models\Parameter::insert([
            'id' => 12,
            'parameter' => 'Sebagai Pencetus Ide dan Melaksanakan Sendiri Proses Terciptanya Karya Inovasi yang Bermanfaat Untuk Pelaksanaan Tugas Fungsi',
            'grade' => 4,
            'criteria_id' => 3,
        ]);

        //  I4
        \App\Models\Parameter::insert([
            'id' => 13,
            'parameter' => 'Di Lingkungan Satuan Kerja',
            'grade' => 1,
            'criteria_id' => 4,
        ]);
        \App\Models\Parameter::insert([
            'id' => 14,
            'parameter' => 'Di Lingkungan Unit Kerja',
            'grade' => 2,
            'criteria_id' => 4,
        ]);
        \App\Models\Parameter::insert([
            'id' => 15,
            'parameter' => 'Di Lingkungan Kementerian',
            'grade' => 3,
            'criteria_id' => 4,
        ]);
        \App\Models\Parameter::insert([
            'id' => 16,
            'parameter' => 'Di Instansi Lain (Kementerian / Lembaga)',
            'grade' => 4,
            'criteria_id' => 4,
        ]);

        //  I5
        \App\Models\Parameter::insert([
            'id' => 17,
            'parameter' => 'Memberikan Ide Berupa Kreasi dan Inovasi Yang Dapat Dipakai Dalam Pelaksanaan Tugas Kerja Kerja',
            'grade' => 1,
            'criteria_id' => 5,
        ]);
        \App\Models\Parameter::insert([
            'id' => 18,
            'parameter' => 'Menciptakan Karya Yang Secara Konkrit Dapat Digunakan Dalam Praktek Pelaksanaan Tugas Kerja',
            'grade' => 2,
            'criteria_id' => 5,
        ]);
        \App\Models\Parameter::insert([
            'id' => 19,
            'parameter' => 'Menciptakan Karya Yang Memberikan Peningkatan grade Tambah Bagi Organisasi',
            'grade' => 3,
            'criteria_id' => 5,
        ]);
        \App\Models\Parameter::insert([
            'id' => 20,
            'parameter' => 'Mencakup Point 1 s/d 3',
            'grade' => 4,
            'criteria_id' => 5,
        ]);

        //  I6
        \App\Models\Parameter::insert([
            'id' => 21,
            'parameter' => 'Secara Berkelanjutan Berupaya Meningkatkan Pengembangan Ide Dari Kreasi dan Inovasi Yang Dapat Dipakai Dalam Pelaksanaan Tugas Kerja',
            'grade' => 1,
            'criteria_id' => 6,
        ]);
        \App\Models\Parameter::insert([
            'id' => 22,
            'parameter' => 'Secara Berkelanjutan Berupaya Meningkatkan Pengembangan Ide Dari Kreasi dan Inovasi Yang Dapat Dipakai Dalam Pelaksanaan Tugas Kerja',
            'grade' => 2,
            'criteria_id' => 6,
        ]);
        \App\Models\Parameter::insert([
            'id' => 23,
            'parameter' => 'Secara Berkelanjutan Berupaya Meningkatkan Cipta Karya Yang Memberikan Peningkatan grade Tambah Bagi Organisasi',
            'grade' => 3,
            'criteria_id' => 6,
        ]);
        \App\Models\Parameter::insert([
            'id' => 24,
            'parameter' => 'Mencakup Point 1 s/d 3',
            'grade' => 4,
            'criteria_id' => 6,
        ]);


        //  T1
        \App\Models\Parameter::insert([
            'id' => 25,
            'parameter' => 'Pegawai Bersangkutan Mengetahui dan Memahami Peraturan dan Proses Bisnis di Bidang Kerjanya',
            'grade' => 1,
            'criteria_id' => 7,
        ]);
        \App\Models\Parameter::insert([
            'id' => 26,
            'parameter' => 'Pegawai Bersangkutan Mampu Menerapkan Point 1 Untuk Menyelesaikan Pekerjaan',
            'grade' => 2,
            'criteria_id' => 7,
        ]);
        \App\Models\Parameter::insert([
            'id' => 27,
            'parameter' => 'Pegawai Bersangkutan Mampu Menerapkan Point 2 Untuk Dapat Mentransfer Pengetahuan Kepada Rekan Kerja di Kementerian dengan Baik',
            'grade' => 3,
            'criteria_id' => 7,
        ]);
        \App\Models\Parameter::insert([
            'id' => 28,
            'parameter' => 'Pegawai Bersangkutan Mampu Menerapkan Point 3 Untuk Dapat Mentransfer Pengetahuan Kepada Rekan Kerja Baik di Kementerian Maupun Instansi Lain dengan Baik',
            'grade' => 4,
            'criteria_id' => 7,
        ]);

        //  T2
        \App\Models\Parameter::insert([
            'id' => 29,
            'parameter' => 'Pegawai Bersangkutan Mampu Berkontribusi Dalam Tim Dalam Menganalisa dan Pemecahan Masalah di Lingkungan Kerja',
            'grade' => 1,
            'criteria_id' => 8,
        ]);
        \App\Models\Parameter::insert([
            'id' => 30,
            'parameter' => 'Pegawai Bersangkutan Mampu Secara Mandiri Dalam Menganalisa dan Pemecahan Masalah di Lingkungan Kerja',
            'grade' => 2,
            'criteria_id' => 8,
        ]);
        \App\Models\Parameter::insert([
            'id' => 31,
            'parameter' => 'Pegawai Bersangkutan Mampu Menerapkan Point 1 dan 2 serta Memberikan Solusi di Lingkungan Kerja',
            'grade' => 3,
            'criteria_id' => 8,
        ]);
        \App\Models\Parameter::insert([
            'id' => 32,
            'parameter' => 'Pegawai Bersangkutan Mampu Menerapkan Point 3 dan Preventif (Mencegah) di Lingkungan Kerja',
            'grade' => 4,
            'criteria_id' => 8,
        ]);

        //  T3
        \App\Models\Parameter::insert([
            'id' => 33,
            'parameter' => 'Pegawai Yang Bersangkutan Bertanggung Jawab Dalam Menyelesaikan Pekerjaan Yang Ditugaskan Kepadanya Dilakukan dengan Baik dan Tepat Waktu',
            'grade' => 1,
            'criteria_id' => 9,
        ]);
        \App\Models\Parameter::insert([
            'id' => 34,
            'parameter' => 'Pegawai Yang Bersangkutan Terkadang Bertanggung Jawab dan Terkadang Bersedia Meluangkan Usaha Untuk Memastikan Bahwa Pekerjaan Yang Ditugaskan Kepadanya Dilakukan dengan Lebih Baik dan Waktu Lebih Cepat',
            'grade' => 2,
            'criteria_id' => 9,
        ]);
        \App\Models\Parameter::insert([
            'id' => 35,
            'parameter' => 'Pegawai Yang Bersangkutan Bertanggung Jawab dan Bersedia Meluangkan Usaha Untuk Memastikan Bahwa Kinerja Pekerjaan Yang Ditugaskan Kepadanya Dilakukan dengan Baik dan Tepat Waktu',
            'grade' => 3,
            'criteria_id' => 9,
        ]);
        \App\Models\Parameter::insert([
            'id' => 36,
            'parameter' => 'Pegawai Yang Bersangkutan Sangat Bertanggung Jawab dan Sangat Bersedia Meluangkan Usaha Untuk Memastikan Bahwa Kinerja Pekerjaan Yang Ditugaskan Kepadanya dilakukan dengan Hasil Terbaik dan Dalam Waktu Tersingkat',
            'grade' => 4,
            'criteria_id' => 9,
        ]);

        //  T4
        \App\Models\Parameter::insert([
            'id' => 37,
            'parameter' => 'Pegawai Bersangkutan Dapat Mencapai Pegradean Prestasi Kerja Pegawai',
            'grade' => 1,
            'criteria_id' => 10,
        ]);
        \App\Models\Parameter::insert([
            'id' => 38,
            'parameter' => 'Pegawai Bersangkutan Dapat Menerapkan Point 1 dan Frekuensi Kehadiran dan Pulang Kantor serta Meninggalkan Tempat Kerja Pada Jam Kerja Seijin Atasan',
            'grade' => 2,
            'criteria_id' => 10,
        ]);
        \App\Models\Parameter::insert([
            'id' => 39,
            'parameter' => 'Pegawai Bersangkutan Dapat Menerapkan Point 2 dan Kepatuhan Menggunakan BMN serta Fasilitas Lainnya Sesuai Ketentuannya',
            'grade' => 3,
            'criteria_id' => 10,
        ]);
        \App\Models\Parameter::insert([
            'id' => 40,
            'parameter' => 'Pegawai Bersangkutan Dapat Menerapkan Point 3 dan Kepatuhan Terhadap Larangan dan Kewajiban PNS, Tidak Sedang Dalam Proses Hukuman Disiplin, Tidak Pernah Dijatuhi Hukuman Disiplin dan/atau Pelanggaran Kode Etik',
            'grade' => 4,
            'criteria_id' => 10,
        ]);

        //  T5
        \App\Models\Parameter::insert([
            'id' => 41,
            'parameter' => 'Pegawai Bersangkutan Dapat Melaksanakan Tugas, Tanggungjawab dan Kewenangan Sesuai Ketentuan',
            'grade' => 1,
            'criteria_id' => 11,
        ]);
        \App\Models\Parameter::insert([
            'id' => 42,
            'parameter' => 'Pegawai Bersangkutan Dapat Menerapkan Point 1 dan Menjaga Informasi Rahasia',
            'grade' => 2,
            'criteria_id' => 11,
        ]);
        \App\Models\Parameter::insert([
            'id' => 43,
            'parameter' => 'Pegawai Bersangkutan Dapat Menerapkan Point 2 dan Kesadaran Menyelesaikan Pekerjaan Tanpa Pengawasan',
            'grade' => 3,
            'criteria_id' => 11,
        ]);
        \App\Models\Parameter::insert([
            'id' => 44,
            'parameter' => 'Pegawai Bersangkutan Dapat Menerapkan Point 3 dan Kegigihan Mencari Informasi Untuk Perbaikan serta Penyempurnaan Pelaksanaan Tugas Fungsi',
            'grade' => 4,
            'criteria_id' => 11,
        ]);

        //  T6
        \App\Models\Parameter::insert([
            'id' => 45,
            'parameter' => 'Pegawai Bersangkutan Mampu Berkomunikasi Dengan Baik',
            'grade' => 1,
            'criteria_id' => 12,
        ]);
        \App\Models\Parameter::insert([
            'id' => 46,
            'parameter' => 'Pegawai Bersangkutan Mampu Menerapkan Point 1 dan Menjalin Kerja Dengan Atasan, Bawahan, serta Rekan Kerja',
            'grade' => 2,
            'criteria_id' => 12,
        ]);
        \App\Models\Parameter::insert([
            'id' => 47,
            'parameter' => 'Pegawai Bersangkutan Mampu Menerapkan Point  2 dan Bersedia Menerima Masukan serta Kritikan Untuk Perbaikan',
            'grade' => 3,
            'criteria_id' => 12,
        ]);
        \App\Models\Parameter::insert([
            'id' => 48,
            'parameter' => 'Pegawai Bersangkutan Mampu Menerapkan Point 3 dan Bekerja Secara Tim Baik Sesama Rekan Kerja atau dengan Pegawai Diluar Organisasi',
            'grade' => 4,
            'criteria_id' => 12,
        ]);
    }
}
