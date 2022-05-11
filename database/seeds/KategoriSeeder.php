<?php

use Illuminate\Database\Seeder;
use App\Kategori;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kategori::create(['name' => "Agensi Persekutuan/Agensi Negeri"]);
        Kategori::create(['name' => "Badan Berkanun"]);
        Kategori::create(['name' => "GLC"]);
        Kategori::create(['name' => "IPTA - Pensyarah/Penyelidik"]);
        Kategori::create(['name' => "IPTA - Pelajar"]);
        Kategori::create(['name' => "IPTS - Pensyarah/Penyelidik"]);
        Kategori::create(['name' => "IPTS - Pelajar"]);
    }
}
