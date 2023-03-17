<?php

namespace Database\Factories;

use App\Models\Lelang;
use App\Models\Masyarakat;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\History>
 */
class HistoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id_lelang' => fake()->randomElement(Lelang::all())['id_lelang'],
            'id_barang' => fake()->randomElement(Lelang::all())['id_barang'],
            'id_user' => fake()->randomElement(Masyarakat::all())['id_user'],
            'penawaran_harga' => fake()->numberBetween(1000, 9999999),
        ];
    }
}
