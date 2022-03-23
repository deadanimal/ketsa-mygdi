<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// Reset cached roles and permissions
    	app()['cache']->forget('spatie.permission.cache');
        Role::create(['name' => 'Pentadbir Aplikasi']);
        Role::create(['name' => 'Pemohon Data']);
        Role::create(['name' => 'Pengesah Metadata']);
        Role::create(['name' => 'Penerbit Metadata']);
        Role::create(['name' => 'Pentadbir Metadata']);
        Role::create(['name' => 'Pentadbir Data']);
        Role::create(['name' => 'Super Admin']);
    }
}
