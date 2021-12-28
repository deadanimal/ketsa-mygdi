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
