<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Santri>
 */
class SantriFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $nis = $this->faker->numerify('########');

        return [
            'nis' => $nis,
            'nama' => $this->faker->name,
            'kelas' => $this->faker->randomElement(['TKA', 'TQA']),
            'jenis_kelamin' => $this->faker->randomElement(['laki-laki', 'perempuan']),
            'password' => bcrypt($nis)
        ];
    }
}
