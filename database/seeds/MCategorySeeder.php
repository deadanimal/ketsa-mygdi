<?php

use Illuminate\Database\Seeder;
use App\MCategory;

class MCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MCategory::create(['name' => "Dataset"]);
        MCategory::create(['name' => "Services"]);
        MCategory::create(['name' => "Imagery"]);
        MCategory::create(['name' => "Gridded"]);
    }
}
