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
            'lapisan_data' => "Transitional Surface 3",
            'kelas' => 'Terhad',
            'status' => 'Tersedia',
            'harga_data' => "4.50"]);

        SenaraiData::create([
            'kategori' => "Aeronautical",
            'subkategori' => "Lapangan Terbang (Aerodrome-AB)",
            'lapisan_data' => "Transitional Surface 2",
            'kelas' => 'Terhad',
            'status' => 'Tersedia',
            'harga_data' => "2.55"]);

        SenaraiData::create([
            'kategori' => "Built Environment",
            'subkategori' => "Kediaman (Residential - BA)",
            'lapisan_data' => "Transitional",
            'kelas' => 'Tidak Terhad',
            'status' => 'Tersedia',
            'harga_data' => "1.50"]);

            SenaraiData::truncate();

            $csvFile = fopen(base_path("database/data/senarai_data.csv"), "r");

            $firstline = true;
            while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
                if (!$firstline) {
                    SenaraiData::create([
                        'kategori' => $data['0'],
                        'subkategori' => $data['1'],
                        'lapisan_data' => $data['2'],
                        'kelas' => $data['3'],
                        'status' => $data['4'],
                        'harga_data' => $data['5'],
                        'kod' => $data['6'],
                    ]);
                }
                $firstline = false;
            }

            fclose($csvFile);
    }
}
