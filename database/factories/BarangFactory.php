<?php

namespace Database\Factories;

use App\Models\Barang;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Barang>
 */
class BarangFactory extends Factory
{
    protected $model = Barang::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama_barang' => fake()->text(25),
            'tgl' => fake()->date(),
            'harga_awal' => fake()->numberBetween(1000, 9999999),
            'deskripsi_barang' => fake()->text(100),
        ];
    }
}
