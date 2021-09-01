<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(MCategorySeeder::class);
        $this->call(CountriesStatesSeeder::class);
        $this->call(ReferenceSystemIdentifierSeeder::class);
        $this->call(PortalSettingsSeeder::class);
        $this->call(KategoriSeeder::class);
        $this->call(KelasKongsiSeeder::class);
        $this->call(SenaraiDataSeeder::class);
        $this->call(PortalTetapanSeeder::class);
        $this->call(AgensiOrganisasiSeeder::class);
    }
}
