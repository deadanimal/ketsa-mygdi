<?php

use App\PortalTetapan;
use Illuminate\Database\Seeder;

class PortalTetapanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PortalTetapan::create(
            ['name' => "Pusat Geospatial Negara (PGN)<br>Kementerian Tenaga dan Sumber Asli (KeTSA)",
            'address' => "Aras 7 & 8, Wisma Sumber Asli<br>No 25, Persiaran Perdana, Presint 4<br>62574 Putrajaya, Malaysia <br>",
            'email_admin' => "adminexplorer@ketsa.gov.my",
            'contact' => "Tel: +603 8886 1156 | Faks: +603 8889 4851",
            'operation_time' => "8.00 Pagi - 5.00 Petang",
        ]);
    }
}
