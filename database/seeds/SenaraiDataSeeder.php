<?php

use Illuminate\Database\Seeder;
use App\SenaraiData;

class SenaraiDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SenaraiData::create([
            'kategori' => "Aeronautical",
            'subkategori' => "Lapangan Terbang (Aerodrome-AB)",
            'lapisan_data' => "Transitional Surface",
            'kelas' => 'Terhad',
            'status' => 'Tersedia',
            'harga_data' => "12.50"]);
    }
}
