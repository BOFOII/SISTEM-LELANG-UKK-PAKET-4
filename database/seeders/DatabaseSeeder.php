<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Barang;
use App\Models\History;
use App\Models\Lelang;
use App\Models\Masyarakat;
use App\Models\Petugas;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Level::factory(1)->create([
            'level' => 'administrator',
        ]);
        \App\Models\Level::factory(1)->create([
            'level' => 'petugas',
        ]);

        Petugas::factory(20)->create();
        Masyarakat::factory(20)->create();
        Barang::factory(20)->create();
        Lelang::factory(20)->create();
        History::factory(100)->create();
    }
}
