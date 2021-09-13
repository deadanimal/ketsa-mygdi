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
            'subkategori' => "Ruang Udara (Air Space - AA)",
            'lapisan_data' => "Transitional Surface",
            'kelas' => 'Terhad',
            'status' => 'Tersedia',
            'harga_data' => "4.50"]);

        SenaraiData::create([
            'kategori' => "Aeronautical",
            'subkategori' => "Lapangan Terbang (Aerodrome-AB)",
            'lapisan_data' => "Transitional Surface",
            'kelas' => 'Terhad',
            'status' => 'Tersedia',
            'harga_data' => "2.55"]);

        SenaraiData::create([
            'kategori' => "Built Environment",
            'subkategori' => "Kediaman (Residential - BA)",
            'lapisan_data' => "Transitional Surface",
            'kelas' => 'Tidak Terhad',
            'status' => 'Tersedia',
            'harga_data' => "1.50"]);
    }
}
