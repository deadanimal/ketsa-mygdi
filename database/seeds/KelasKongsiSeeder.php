<?php

use Illuminate\Database\Seeder;
use App\KelasKongsi;

class KelasKongsiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        KelasKongsi::create(['category' => "G2C",
                          'subcategory' => "Awam",
                          'status' => "1"]);
        KelasKongsi::create(['category' => "G2G",
                          'subcategory' => "Badan Berkanun",
                          'status' => "1"]);
        KelasKongsi::create(['category' => "G2G",
                          'subcategory' => "Agensi Persekutuan/Agensi Negeri",
                          'status' => "1"]);
        KelasKongsi::create(['category' => "G2G",
                          'subcategory' => "GLC",
                          'status' => "1"]);
        KelasKongsi::create(['category' => "G2E",
                          'subcategory' => "IPTA - Pensyarah/Penyelidik",
                          'status' => "1"]);
        KelasKongsi::create(['category' => "G2E",
                          'subcategory' => "IPTA - Pelajar",
                          'status' => "1"]);
        KelasKongsi::create(['category' => "G2E",
                          'subcategory' => "IPTS - Pensyarah/Penyelidik",
                          'status' => "1"]);
        KelasKongsi::create(['category' => "G2E",
                          'subcategory' => "IPTS - Pelajar",
                          'status' => "1"]);
    }
}
