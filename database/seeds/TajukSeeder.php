<?php

use Illuminate\Database\Seeder;
use App\Tajuk;

class ElemenMetadataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($r=1;$r<5;$r++){ //seed for each kategori 1-4
            Tajuk::create(["name"=>"General Information","kategori"=>"","status"=>"1","kategori"=>$r]);
            Tajuk::create(["name"=>"General Information","kategori"=>"","status"=>"1","kategori"=>$r]);
            Tajuk::create(["name"=>"General Information","kategori"=>"","status"=>"1","kategori"=>$r]);
            Tajuk::create(["name"=>"General Information","kategori"=>"","status"=>"1","kategori"=>$r]);
            Tajuk::create(["name"=>"General Information","kategori"=>"","status"=>"1","kategori"=>$r]);
            Tajuk::create(["name"=>"General Information","kategori"=>"","status"=>"1","kategori"=>$r]);
            Tajuk::create(["name"=>"General Information","kategori"=>"","status"=>"1","kategori"=>$r]);
            Tajuk::create(["name"=>"General Information","kategori"=>"","status"=>"1","kategori"=>$r]);
            Tajuk::create(["name"=>"General Information","kategori"=>"","status"=>"1","kategori"=>$r]);
            Tajuk::create(["name"=>"General Information","kategori"=>"","status"=>"1","kategori"=>$r]);
            Tajuk::create(["name"=>"General Information","kategori"=>"","status"=>"1","kategori"=>$r]);
            Tajuk::create(["name"=>"General Information","kategori"=>"","status"=>"1","kategori"=>$r]);
            Tajuk::create(["name"=>"General Information","kategori"=>"","status"=>"1","kategori"=>$r]);
            Tajuk::create(["name"=>"General Information","kategori"=>"","status"=>"1","kategori"=>$r]);
            Tajuk::create(["name"=>"General Information","kategori"=>"","status"=>"1","kategori"=>$r]);
            Tajuk::create(["name"=>"General Information","kategori"=>"","status"=>"1","kategori"=>$r]);
            Tajuk::create(["name"=>"General Information","kategori"=>"","status"=>"1","kategori"=>$r]);
            Tajuk::create(["name"=>"General Information","kategori"=>"","status"=>"1","kategori"=>$r]);
            Tajuk::create(["name"=>"General Information","kategori"=>"","status"=>"1","kategori"=>$r]);
            Tajuk::create(["name"=>"General Information","kategori"=>"","status"=>"1","kategori"=>$r]);
            Tajuk::create(["name"=>"General Information","kategori"=>"","status"=>"1","kategori"=>$r]);
            Tajuk::create(["name"=>"General Information","kategori"=>"","status"=>"1","kategori"=>$r]);
            Tajuk::create(["name"=>"General Information","kategori"=>"","status"=>"1","kategori"=>$r]);
        }
    }
}
