<?php

namespace Database\Factories;

use App\Models\Barang;
use App\Models\Masyarakat;
use App\Models\Petugas;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lelang>
 */
class LelangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id_barang' => fake()->randomElement(Barang::all())['id_barang'],
            'tgl_lelang' => fake()->date(),
            'harga_akhir' => 1000000,
            'id_user' => fake()->randomElement(Masyarakat::all())['id_user'],
            'id_petugas' => fake()->randomElement(Petugas::all())['id_petugas'],
        ];
    }
}
