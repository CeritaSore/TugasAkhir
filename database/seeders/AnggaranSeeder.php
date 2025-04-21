<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\OrganizationBudget;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AnggaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $anggaran = ['anggaran 1', 'anggaran 2', 'anggaran 3', 'anggaran 4', 'anggaran 5'];
        foreach ($anggaran as $anggaran) {
            OrganizationBudget::create([
                'nama_anggaran' => $anggaran,
                'divisi_id' => random_int(1, 4),
                'user_id' => random_int(1, 4),
            ]);
        }
    }
}
