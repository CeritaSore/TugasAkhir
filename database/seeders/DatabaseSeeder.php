<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Event;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\EventType;
use App\Models\FormType;
use App\Models\InputType;
use App\Models\Organization;
use App\Models\OrganizationBudget;
use App\Models\OrganizationCoreTeam;
use App\Models\OrganizationDivision;
use App\Models\OrganizationProgram;
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
        $inputType = ['teks singkat', 'teks panjang', 'file',  'dropdown', 'skala likert(1-5)', 'skala likert(1-10)'];
        foreach ($inputType as $input) {
            FormType::create([
                'tipe' => $input
            ]);
        }

        $divisi = ['divisi 1', 'divisi 2', 'divisi 3', 'divisi 4'];
        foreach ($divisi as $div) {
            OrganizationDivision::create([
                'divisi' => $div,
            ]);
        }
        OrganizationCoreTeam::create([
            'user_id' => 1,
            'organisasi_id' => 1,
            'role_id' => 1,
            'divisi_id' => 1,
        ]);
        OrganizationProgram::create([
            'nama_program' => 'makan siang gratis',
            'deskripsi' => null,
            'tanggal_mulai' => '2012-12-12',
            'tanggal_selesai' => '2012-12-12',
            'tempat' => 'jadi',
            'pelaksana' => '1',
        ]);
        OrganizationBudget::create([
            'jumlah_anggaran' => 123123,
            'program_id' => 1
        ]);
        Event::create([
            'nama' => 'mbg sulawesi',
            'deskripsi' => null,
            'type_id' => 3,
            'tanggal_mulai' => '2012-12-12',
            'tanggal_selesai' => '2012-12-12',
            'slug' => 'mbg-sulawesi',
            'proker_id' => 1,
        ]);
        // $this->call(Anggara nSeeder::class);
    }
}
