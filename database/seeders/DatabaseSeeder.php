<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Santri;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Admin::factory()->create([
            'username' => 'admin',
            'password' => Hash::make('123456'), // wajib di-hash!
        ]);

        Santri::factory()->count(3)->hasTabungan(3)->hasPenarikan(1)->hasIuran(3)->create();
    }
}
