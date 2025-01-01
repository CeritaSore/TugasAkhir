<?php

namespace Database\Seeders;

use App\Models\Organization;
use App\Models\Orgrole;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $role = ['mahasiswa', 'kemahasiswaan'];
        for ($i = 1; $i < 11; $i++) {
            User::create([
                'name' => fake()->name,
                'email' => fake()->email,
                'role' => fake()->randomElement($role),
                'password' => 'password',
            ]);
        }
        $organization = ['dpm', 'bem', 'senada'];
        foreach ($organization as $org) {

            Organization::create([
                'nama' => $org,
                'tanggal_berdiri' => fake()->date(),
            ]);
        }
        $role = ['ketua', 'wakil', 'sekretaris', 'bendahara'];
        foreach ($role as $item) {
            Orgrole::create([
                'role' => $item
            ]);
        }
    }
}
