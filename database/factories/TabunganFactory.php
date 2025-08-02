<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\UploadedFile;
use App\Models\Santri;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tabungan>
 */
class TabunganFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nis' => Santri::inRandomOrder()->first()?->nis ?? Santri::factory(),
            'tanggal' => $this->faker->date(),
            'setoran' => $this->faker->numberBetween(50000, 200000)
        ];
    }
}
