<?php

namespace Database\Seeders;

use App\Models\Organisasi;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OrganisasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $nomorInduk = 0;
        $nomorIndukRand = rand();
        Organisasi::create([
            "nama"=> "bem",
            "Nomor_induk"=> $nomorIndukRand,
        ]);
    }
}
