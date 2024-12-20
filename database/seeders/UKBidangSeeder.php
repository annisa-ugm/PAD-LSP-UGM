<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UKBidang;

class UKBidangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nama_bidang' => 'Sosial',
            ],
            [
                'nama_bidang' => 'Teknologi',
            ],
            [
                'nama_bidang' => 'Data',
            ],

        ];

        foreach ($data as $item) {
            UKBidang::create($item);
        }
    }
}
