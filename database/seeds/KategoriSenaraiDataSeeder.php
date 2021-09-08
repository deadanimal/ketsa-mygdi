<?php

use App\KategoriSenaraiData;
use Illuminate\Database\Seeder;

class KategoriSenaraiDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        KategoriSenaraiData::create(['name' => "Aeronautical"]);
        KategoriSenaraiData::create(['name' => "Built Environment"]);
        KategoriSenaraiData::create(['name' => "Demarcation"]);
        KategoriSenaraiData::create(['name' => "Geology"]);
        KategoriSenaraiData::create(['name' => "Hydrography"]);
        KategoriSenaraiData::create(['name' => "Hypsography"]);
        KategoriSenaraiData::create(['name' => "Soil"]);
        KategoriSenaraiData::create(['name' => "Transportation"]);
        KategoriSenaraiData::create(['name' => "Utility"]);
        KategoriSenaraiData::create(['name' => "Vegatation"]);
        KategoriSenaraiData::create(['name' => "Special Use"]);
        KategoriSenaraiData::create(['name' => "General"]);
    }
}
