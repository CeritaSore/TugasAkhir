<?php

namespace Database\Seeders;

use App\Models\Organization;
<<<<<<< HEAD
use App\Models\Orgcoreteam;
use App\Models\Orgrole;
=======
>>>>>>> 47b3a8f (update repo & creating login)
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Nette\Utils\Random;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $role = ['mahasiswa', 'kemahasiswaan'];
<<<<<<< HEAD
        $constantNumber = "0110";
=======
>>>>>>> 47b3a8f (update repo & creating login)
        for ($i = 1; $i < 11; $i++) {
            User::create([
                'name' => fake()->name,
                'email' => fake()->email,
<<<<<<< HEAD
                'nim' => $constantNumber . random_int(1000, 9999),
=======
>>>>>>> 47b3a8f (update repo & creating login)
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
<<<<<<< HEAD
        $role = ['ketua', 'wakil', 'sekretaris', 'bendahara'];
        foreach ($role as $item) {
            Orgrole::create([
                'role' => $item
            ]);
        }
        $getmhs = User::where('role', 'mahasiswa')->get();
        foreach ($getmhs as $mhs) {
            Orgcoreteam::create([
                'org_id' => rand(Organization::min('id'), Organization::max('id')),
                'user_id' => $mhs->id,
                'role_id' => rand(Orgrole::min('id'), Orgrole::max('id')),
            ]);
        }
=======
>>>>>>> 47b3a8f (update repo & creating login)
    }
}
