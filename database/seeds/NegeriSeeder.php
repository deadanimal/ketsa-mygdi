<?php

use Illuminate\Database\Seeder;
use App\Negeri;

class NegeriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Negeri::truncate();

        $csvFile = fopen(base_path("database/data/negeri.csv"), "r");

        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                Negeri::create([
                    'negeri' => $data['1'],
                    'kod_negeri' => $data['0'],
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}
