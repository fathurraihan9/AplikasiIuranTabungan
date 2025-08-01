<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\UploadedFile;
use App\Models\Santri;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Iuran>
 */
class IuranFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $fakeImage = UploadedFile::fake()->image('bukti.jpg');

        // Simpan file
        $fakeImage->storeAs('bukti', $fakeImage->hashName(), 'public');

        // Ambil hanya nama filenya saja
        $fileName = $fakeImage->hashName(); // hasil: abc123.jpg

        return [
            'nis' => Santri::inRandomOrder()->first()?->nis ?? Santri::factory(),
            'tanggal' => $this->faker->date(),
            'jumlah' => $this->faker->numberBetween(50000, 200000),
            'bukti' => $fileName // hanya nama file
        ];
    }
}
