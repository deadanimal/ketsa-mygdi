<?php

use Illuminate\Database\Seeder;
use App\Countries;
use App\States;

class CountriesStatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $country = Countries::create(['name' => "Malaysia"]);

        States::create(['name' => "Kedah",'country'=>$country->id]);
        States::create(['name' => "Perlis",'country'=>$country->id]);
        States::create(['name' => "Perak",'country'=>$country->id]);
        States::create(['name' => "Pulau Pinang",'country'=>$country->id]);
        States::create(['name' => "Selangor",'country'=>$country->id]);
        States::create(['name' => "Negeri Sembilan",'country'=>$country->id]);
        States::create(['name' => "Melaka",'country'=>$country->id]);
        States::create(['name' => "Johor",'country'=>$country->id]);
        States::create(['name' => "Pahang",'country'=>$country->id]);
        States::create(['name' => "Terengganu",'country'=>$country->id]);
        States::create(['name' => "Kelantan",'country'=>$country->id]);
        States::create(['name' => "Sabah",'country'=>$country->id]);
        States::create(['name' => "Sarawak",'country'=>$country->id]);
        States::create(['name' => "WP Kuala Lumpur",'country'=>$country->id]);
        States::create(['name' => "WP Putrajaya",'country'=>$country->id]);
        States::create(['name' => "WP Labuan",'country'=>$country->id]);
    }
}
