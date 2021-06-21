<?php

use Illuminate\Database\Seeder;
use App\ReferenceSystemIdentifier;

class ReferenceSystemIdentifierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ReferenceSystemIdentifier::create(['name' => "Cassini Soldner Johor MRT48"]);
        ReferenceSystemIdentifier::create(['name' => "Cassini Soldner Negeri Sembilan / Melaka MRT48"]);
        ReferenceSystemIdentifier::create(['name' => "Cassini Soldner Selangor MRT48"]);
        ReferenceSystemIdentifier::create(['name' => "Cassini Soldner Perak MRT48"]);
        ReferenceSystemIdentifier::create(['name' => "Cassini Soldner Pulau Pinang MRT48"]);
        ReferenceSystemIdentifier::create(['name' => "Cassini Soldner Kedah / Perlis MRT48"]);
        ReferenceSystemIdentifier::create(['name' => "GDM 2000"]);
        ReferenceSystemIdentifier::create(['name' => "World Geodetic System 84"]);
        ReferenceSystemIdentifier::create(['name' => "MRSO (GDM 2000)"]);
        ReferenceSystemIdentifier::create(['name' => "MRSO (MRT 48)"]);
        ReferenceSystemIdentifier::create(['name' => "BRSO (GDM 2000)"]);
        ReferenceSystemIdentifier::create(['name' => "BRSO (MRT 48)"]);
    }
}
