<?php

namespace Database\Seeders;

use App\Models\Pengurus;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;
class PengurusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create('id_ID');
        for ($i = 0; $i < 5; $i++) {

            Pengurus::create([
                'nama' => $faker->name,
                'nim' => $faker->numberBetween(1, 5),
                'prodi' => 'sosial',
                'jabatan' => 'sekretaris',
                'organisasi_id'=>1,
            ]);
        }
    }
}
