<?php

use Illuminate\Database\Seeder;
use App\Daerah;

class DaerahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Daerah::truncate();

        $csvFile = fopen(base_path("database/data/daerah.csv"), "r");

        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                Daerah::create([
                    'daerah' => $data['0'],
                    'negeri_id' => $data['1'],
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}
