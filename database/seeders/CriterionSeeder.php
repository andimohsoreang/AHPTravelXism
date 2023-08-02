<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Criterion;

class CriterionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Criterion::create([
            'name' => 'Jenis Pariwisata',
        ]);

        Criterion::create([
            'name' => 'Aspek Destinasi',
        ]);

        Criterion::create([
            'name' => 'Fasilitas',
        ]);
    }
}
