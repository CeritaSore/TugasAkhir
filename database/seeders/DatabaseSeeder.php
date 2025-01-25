<?php

namespace Database\Seeders;

use App\Models\Organization;
<<<<<<< HEAD
<<<<<<< HEAD
use App\Models\Orgcoreteam;
use App\Models\Orgrole;
=======
>>>>>>> 47b3a8f (update repo & creating login)
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Nette\Utils\Random;
=======
use App\Models\Orgrole;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
>>>>>>> 320b1045e0f2c1096493f18dd60522f3c2c6da9b

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $role = ['mahasiswa', 'kemahasiswaan'];
<<<<<<< HEAD
<<<<<<< HEAD
        $constantNumber = "0110";
=======
>>>>>>> 47b3a8f (update repo & creating login)
=======
>>>>>>> 320b1045e0f2c1096493f18dd60522f3c2c6da9b
        for ($i = 1; $i < 11; $i++) {
            User::create([
                'name' => fake()->name,
                'email' => fake()->email,
<<<<<<< HEAD
<<<<<<< HEAD
                'nim' => $constantNumber . random_int(1000, 9999),
=======
>>>>>>> 47b3a8f (update repo & creating login)
=======
>>>>>>> 320b1045e0f2c1096493f18dd60522f3c2c6da9b
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
<<<<<<< HEAD
=======
>>>>>>> 320b1045e0f2c1096493f18dd60522f3c2c6da9b
        $role = ['ketua', 'wakil', 'sekretaris', 'bendahara'];
        foreach ($role as $item) {
            Orgrole::create([
                'role' => $item
            ]);
        }
<<<<<<< HEAD
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
=======
>>>>>>> 320b1045e0f2c1096493f18dd60522f3c2c6da9b
    }
}
