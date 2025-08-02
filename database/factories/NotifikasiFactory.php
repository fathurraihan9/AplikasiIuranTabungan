<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Notifikasi>
 */
class NotifikasiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'jenis_transaksi' => $this->faker->randomElement(['iuran', 'tabungan']),
            'nis' => $this->faker->numerify('########'), // 8 digit angka
            'jumlah' => $this->faker->numberBetween(10000, 200000),
            'keterangan' => $this->faker->sentence(),
            'tanggal' => $this->faker->date(),
        ];
    }
}
