<?php

namespace Database\Seeders;

use App\Models\Durum;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DurumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Durum::create(['ad' => 'Başlangıç']);
        Durum::create(['ad' => 'Devam Ediyor']);
        Durum::create(['ad' => 'Bitti']);
    }
}
