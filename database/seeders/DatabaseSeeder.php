<?php

namespace Database\Seeders;

use App\Models\Organization;
use App\Models\Orgcoreteam;
use App\Models\Orgmember;
use App\Models\Orgrole;
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
        $constantNumber = "0110";
        for ($i = 1; $i <= 5; $i++) {
            User::create([
                'name' => fake()->name,
                'email' => fake()->email,
                'nim' => $constantNumber . random_int(1000, 9999),
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
        $getmhs = User::where('role', 'mahasiswa')->get();
        foreach ($getmhs as $mhs) {
            Orgcoreteam::create([
                'org_id' => rand(Organization::min('id'), Organization::max('id')),
                'user_id' => $mhs->id,
                'role_id' => rand(Orgrole::min('id'), Orgrole::max('id')),
            ]);
        }
    }
}
