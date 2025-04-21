<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Event;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\EventType;
use App\Models\InputType;
use App\Models\Organization;
use Illuminate\Database\Seeder;
use App\Models\OrganizationRole;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        for ($i = 0; $i <= 3; $i++) {
            User::create([
                'name' => fake()->name(),
                'email' => fake()->name() . '@gmail.com',
                'nim' => random_int(1000000, 9999999),
                'role' => 'kemahasiswaan',
                'password' => bcrypt('password'),
            ]);
        }
        for ($i = 0; $i < 3; $i++) {
            User::create([
                'name' => fake()->name(),
                'email' => fake()->email(),
                'nim' => random_int(1000000, 9999999),
                'role' => 'mahasiswa',
                'password' => bcrypt('password'),
            ]);
        }
        $organisasi = ['dpm', 'bem', 'senada'];
        foreach ($organisasi as $org) {
            Organization::create([
                'nama' => $org,
                'deskripsi' => null,
                'foto' => null,
                'tanggal_berdiri' => Carbon::now(),
                'status' => 1,
            ]);
        }
        OrganizationRole::create([
            'role' => 'Ketua',
        ]);
        $eventType = ['open tender', 'open recruitment', 'webinar & workshop'];
        foreach ($eventType as $type) {
            EventType::create([
                'tipe' => $type,
            ]);
        }
        $inputType = ['text', 'textarea', 'number', 'date', 'time', 'file'];
        foreach ($inputType as $type) {
            InputType::create([
                'tipe' => $type,
            ]);
        }
    }
}
