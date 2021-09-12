<?php

use Illuminate\Database\Seeder;
use App\Tajuk;

class TajukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        for($r=1;$r<5;$r++){ //seed for each kategori 1-4
            Tajuk::create(["name"=>"General Information"]); //1
            Tajuk::create(["name"=>"Identification Information"]); //2
            Tajuk::create(["name"=>"Topic Category"]); //3
//            if($r > 2){
                Tajuk::create(["name"=>"Nominal Resolution"]); //4
                Tajuk::create(["name"=>"Process Step Information"]); //5
                Tajuk::create(["name"=>"Spatial Representation Information"]); //6
                Tajuk::create(["name"=>"Content Information"]); //7
                Tajuk::create(["name"=>"Acquisition Information"]); //8
//            }
            Tajuk::create(["name"=>"Spatial Domain"]); //9
            Tajuk::create(["name"=>"Browsing Information"]); //10
            Tajuk::create(["name"=>"Distribution Information"]); //11
            Tajuk::create(["name"=>"Dataset Identification"]); //12
            Tajuk::create(["name"=>"Reference System Information"]); //13
            Tajuk::create(["name"=>"Constraints"]); //14
            Tajuk::create(["name"=>"Data Quality"]); //15
//        }
    }
}
