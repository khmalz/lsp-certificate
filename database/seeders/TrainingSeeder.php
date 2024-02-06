<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Training;

class TrainingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $trainingData = [
            [
                'title' => 'Pengenalan Pemrograman Python',
                'started_at' => '2023-02-15',
            ],
            [
                'title' => 'Pemahaman Dasar Jaringan Komputer',
                'started_at' => '2023-03-01',
            ],
            [
                'title' => 'Menggunakan Git untuk Pengembangan Perangkat Lunak',
                'started_at' => '2023-03-15',
            ],
            [
                'title' => 'Keamanan Informasi: Konsep Dasar',
                'started_at' => '2023-04-01',
            ],
            [
                'title' => 'Pengembangan Aplikasi Web dengan Framework Django',
                'started_at' => '2023-04-15',
            ],
            [
                'title' => 'Pemrograman JavaScript Modern',
                'started_at' => '2023-05-01',
            ],
            [
                'title' => 'Analisis Data dengan Python Pandas',
                'started_at' => '2023-05-15',
            ],
            [
                'title' => 'Pengembangan Aplikasi Mobile dengan React Native',
                'started_at' => '2023-06-01',
            ],
            [
                'title' => 'Pemahaman Cloud Computing',
                'started_at' => '2023-06-15',
            ],
            [
                'title' => 'Pengujian Perangkat Lunak: Metode dan Strategi',
                'started_at' => '2023-07-01',
            ],
        ];

        foreach ($trainingData as $data) {
            Training::create($data);
        }
    }
}
