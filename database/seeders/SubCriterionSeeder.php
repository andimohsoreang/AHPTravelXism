<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SubCriterion;

class SubCriterionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SubCriterion::create([
            'name' => 'Wisata Bangunan Dan Budaya',
            'criterion_id' => 1,
        ]);

        SubCriterion::create([
            'name' => 'Wisata Buatan',
            'criterion_id' => 1,
        ]);

        SubCriterion::create([
            'name' => 'Wisata Pengetahuan',
            'criterion_id' => 1,
        ]);

        SubCriterion::create([
            'name' => 'Wisata Sejarah',
            'criterion_id' => 1,
        ]);

        SubCriterion::create([
            'name' => 'Wisata Bahari',
            'criterion_id' => 1,
        ]);

        SubCriterion::create([
            'name' => 'Harga Masuk',
            'criterion_id' => 2,
        ]);

        SubCriterion::create([
            'name' => 'Rating',
            'criterion_id' => 2,
        ]);

        SubCriterion::create([
            'name' => 'Jarak Dan Kebersihan',
            'criterion_id' => 2,
        ]);

        SubCriterion::create([
            'name' => 'Fasilitas Umum',
            'criterion_id' => 3,
        ]);

        SubCriterion::create([
            'name' => 'Fasilitas Penunjang',
            'criterion_id' => 3,
        ]);
    }
}