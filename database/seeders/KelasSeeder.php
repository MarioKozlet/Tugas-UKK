<?php

namespace Database\Seeders;

use App\Models\Kelas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //php artisan make:seeder nama Seeder
        //php artisan make:middeleware nama Middeleware
        $kelas = [
            ['kelas' => 'XII-TKJ'],
            ['kelas' => 'XII-RPL-1'],
            ['kelas' => 'XII-RPL-2'],
            ['kelas' => 'XII-MMK'],
            ['kelas' => 'XI-TKJ'],
            ['kelas' => 'XI-RPL-1'],
            ['kelas' => 'XI-RPL-2'],
            ['kelas' => 'X-TJKT-1'],
            ['kelas' => 'XI-TJKT-2'],
            ['kelas' => 'XI-PPLG'],
            ['kelas' => 'XI-DKV'],
        ];
        foreach ($kelas as $data) {
            Kelas::create($data);
        }
    }
}
