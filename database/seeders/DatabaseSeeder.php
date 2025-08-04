<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Iuran;
use App\Models\Notifikasi;
use App\Models\PenarikanTabungan;
use App\Models\Pesan;
use App\Models\Santri;
use App\Models\Tabungan;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Santri::factory()->count(3)
            ->has(Tabungan::factory()->count(3), 'tabungan')
            ->has(PenarikanTabungan::factory()->count(3), 'penarikan_tabungan')
            ->has(Iuran::factory()->count(3), 'iuran')
            ->has(Notifikasi::factory()->count(3))
            ->create();

        Pesan::factory()->count(10)->create();

        $this->call([
            AdminSeeder::class,
            // tambahkan seeder lain di sini
        ]);
    }
}
