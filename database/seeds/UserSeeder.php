<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Super Admin =========================================================
        $user = User::create([
            'name' => "Super Admin",
            'email' => "superadmin@pipeline.com",
            'password' => Hash::make('superadmin@pipeline.com'),
            'nric' => '888888888888',
            'agensi_organisasi' => '1',
            'bahagian' => 'IT',
            'sektor' => 1,
            'phone_pejabat' => '0888888888',
            'phone_bimbit' => '0188888888',
            'disahkan' => 1,
            'alamat' => '24 Jalan Melur Taman Bunga 45502 Gopeng Perak',
            'gambar_profil' => 'mrt.jpg',
            'status' => '1'
        ]);
        $user->assignRole('Super Admin');
        
        // Pentadbir Aplikasi ==================================================
        $user = User::create([
            'name' => "Pentadbir Aplikasi",
            'email' => "pentadbiraplikasi@gmail.com",
            'password' => Hash::make('pentadbiraplikasi@gmail.com'),
            'nric' => '888888888888',
            'agensi_organisasi' => '1',
            'bahagian' => 'IT',
            'sektor' => 1,
            'phone_pejabat' => '0888888888',
            'phone_bimbit' => '0188888888',
            'disahkan' => 1,
            'alamat' => '25 Jalan Melur Taman Bunga 45502 Jitra Kedah',
            'gambar_profil' => 'mrt.jpg',
            'status' => '1'
        ]);
        $user->assignRole('Pentadbir Aplikasi');

        // Pengesah Metadata ===================================================
        $user = User::create([
            'name' => "Pengesah Metadata 1",
            'email' => "pengesahmetadata1@gmail.com",
            'password' => Hash::make('pengesahmetadata1@gmail.com'),
            'nric' => '888888888888',
            'agensi_organisasi' => '1',
            'bahagian' => 'IT',
            'sektor' => 1,
            'phone_pejabat' => '0888888888',
            'phone_bimbit' => '0188888888',
            'disahkan' => 1,
            'alamat' => '26 Jalan Melur Taman Bunga 45502 Bangsar Kuala Lumpur',
            'gambar_profil' => 'mrt.jpg',
            'status' => '1'
        ]);
        $user->assignRole('Pengesah Metadata');
        
        $user = User::create([
            'name' => "Pengesah Metadata 2",
            'email' => "pengesahmetadata2@pipeline.com",
            'password' => Hash::make('pengesahmetadata2@pipeline.com'),
            'nric' => '888888888888',
            'agensi_organisasi' => '2',
            'bahagian' => 'IT',
            'sektor' => 1,
            'phone_pejabat' => '0888888888',
            'phone_bimbit' => '0188888888',
            'disahkan' => 1,
            'alamat' => '27 Jalan Melur Taman Bunga 45502 Serendah Selangor',
            'gambar_profil' => 'mrt.jpg',
            'status' => '1'
        ]);
        $user->assignRole('Pengesah Metadata');
        
        $user = User::create([
            'name' => "Pengesah Metadata 3",
            'email' => "pengesahmetadata3@pipeline.com",
            'password' => Hash::make('pengesahmetadata3@pipeline.com'),
            'nric' => '888888888888',
            'agensi_organisasi' => '3',
            'bahagian' => 'IT',
            'sektor' => 1,
            'phone_pejabat' => '0888888888',
            'phone_bimbit' => '0188888888',
            'disahkan' => 1,
            'alamat' => '28 Jalan Melur Taman Bunga 45502 Nilai Negeri Sembilan',
            'gambar_profil' => 'mrt.jpg',
            'status' => '1'
        ]);
        $user->assignRole('Pengesah Metadata');

        // Penerbit Metadata ===================================================
        $user = User::create([
            'name' => "Penerbit Metadata 1",
            'email' => "penerbitmetadata1@gmail.com",
            'password' => Hash::make('penerbitmetadata1@gmail.com'),
            'nric' => '888888888888',
            'agensi_organisasi' => '1',
            'bahagian' => 'IT',
            'sektor' => 1,
            'phone_pejabat' => '0888888888',
            'phone_bimbit' => '0188888888',
            'disahkan' => 1,
            'alamat' => '29 Jalan Melur Taman Bunga 45502 Jasin Melaka',
            'gambar_profil' => 'mrt.jpg',
            'status' => '1'
        ]);
        $user->assignRole('Penerbit Metadata');
        
        $user = User::create([
            'name' => "Penerbit Metadata 2",
            'email' => "penerbitmetadata2@pipeline.com",
            'password' => Hash::make('penerbitmetadata2@pipeline.com'),
            'nric' => '888888888888',
            'agensi_organisasi' => '2',
            'bahagian' => 'IT',
            'sektor' => 1,
            'phone_pejabat' => '0888888888',
            'phone_bimbit' => '0188888888',
            'disahkan' => 1,
            'alamat' => '30 Jalan Melur Taman Bunga 45502 Muar Johor',
            'gambar_profil' => 'mrt.jpg',
            'status' => '1'
        ]);
        $user->assignRole('Penerbit Metadata');
        
        $user = User::create([
            'name' => "Penerbit Metadata 3",
            'email' => "penerbitmetadata3@pipeline.com",
            'password' => Hash::make('penerbitmetadata3@pipeline.com'),
            'nric' => '888888888888',
            'agensi_organisasi' => '3',
            'bahagian' => 'IT',
            'sektor' => 1,
            'phone_pejabat' => '0888888888',
            'phone_bimbit' => '0188888888',
            'disahkan' => 1,
            'alamat' => '31 Jalan Melur Taman Bunga 45502 Jengka Pahang',
            'gambar_profil' => 'mrt.jpg',
            'status' => '1'
        ]);
        $user->assignRole('Penerbit Metadata');

        // Pentadbir Metadata ==================================================
        $user = User::create([
            'name' => "Pentadbir Metadata 1",
            'email' => "pentadbirmetadata1@gmail.com",
            'password' => Hash::make('pentadbirmetadata1@gmail.com'),
            'nric' => '888888888888',
            'agensi_organisasi' => '1',
            'bahagian' => 'IT',
            'sektor' => 1,
            'phone_pejabat' => '0888888888',
            'phone_bimbit' => '0188888888',
            'disahkan' => 1,
            'alamat' => '32 Jalan Melur Taman Bunga 45502 Chukai Terengganu',
            'gambar_profil' => 'mrt.jpg',
            'status' => '1'
        ]);
        $user->assignRole('Pentadbir Metadata');
        
        $user = User::create([
            'name' => "Pentadbir Metadata 2",
            'email' => "pentadbirmetadata2@pipeline.com",
            'password' => Hash::make('pentadbirmetadata2@pipeline.com'),
            'nric' => '888888888888',
            'agensi_organisasi' => '2',
            'bahagian' => 'IT',
            'sektor' => 1,
            'phone_pejabat' => '0888888888',
            'phone_bimbit' => '0188888888',
            'disahkan' => 1,
            'alamat' => '33 Jalan Melur Taman Bunga 45502 Ketereh Kelantan',
            'gambar_profil' => 'mrt.jpg',
            'status' => '1'
        ]);
        $user->assignRole('Pentadbir Metadata');
        
        $user = User::create([
            'name' => "Pentadbir Metadata 3",
            'email' => "pentadbirmetadata3@pipeline.com",
            'password' => Hash::make('pentadbirmetadata3@pipeline.com'),
            'nric' => '888888888888',
            'agensi_organisasi' => '3',
            'bahagian' => 'IT',
            'sektor' => 1,
            'phone_pejabat' => '0888888888',
            'phone_bimbit' => '0188888888',
            'disahkan' => 1,
            'alamat' => '34 Jalan Melur Taman Bunga 45502 Arau Perlis',
            'gambar_profil' => 'mrt.jpg',
            'status' => '1'
        ]);
        $user->assignRole('Pentadbir Metadata');

        // \DB::statement('alter sequence users_id_seq restart with '.(intval($userId))); 
        
        $user = User::create([
            'name' => "Pemohon Data 1",
            'email' => "pemohondata1@pipeline.com",
            'password' => Hash::make('pemohondata1@pipeline.com'),
            'nric' => '888888888888',
            'agensi_organisasi' => '1',
            'bahagian' => 'IT',
            'sektor' => 1,
            'phone_pejabat' => '0888888888',
            'phone_bimbit' => '0188888888',
            'disahkan' => 1,
            'alamat' => '34 Jalan Melur Taman Bunga 45502 Arau Perlis',
            'gambar_profil' => 'mrt.jpg',
            'status' => '1'
        ]);
        $user->assignRole('Pemohon Data');
        
        $user = User::create([
            'name' => "Pemohon Data 2",
            'email' => "pemohondata2@pipeline.com",
            'password' => Hash::make('pemohondata2@pipeline.com'),
            'nric' => '888888888888',
            'agensi_organisasi' => '2',
            'bahagian' => 'IT',
            'sektor' => 1,
            'phone_pejabat' => '0888888888',
            'phone_bimbit' => '0188888888',
            'disahkan' => 1,
            'alamat' => '34 Jalan Melur Taman Bunga 45502 Arau Perlis',
            'gambar_profil' => 'mrt.jpg',
            'status' => '1'
        ]);
        $user->assignRole('Pemohon Data');
        
        $user = User::create([
            'name' => "Pemohon Data 3",
            'email' => "pemohondata3@pipeline.com",
            'password' => Hash::make('pemohondata3@pipeline.com'),
            'nric' => '888888888888',
            'agensi_organisasi' => '3',
            'bahagian' => 'IT',
            'sektor' => 1,
            'phone_pejabat' => '0888888888',
            'phone_bimbit' => '0188888888',
            'disahkan' => 1,
            'alamat' => '34 Jalan Melur Taman Bunga 45502 Arau Perlis',
            'gambar_profil' => 'mrt.jpg',
            'status' => '1'
        ]);
        $user->assignRole('Pemohon Data');
        
        $user = User::create([
            'name' => "Pentadbir Data 1",
            'email' => "pentadbirdata1@pipeline.com",
            'password' => Hash::make('pentadbirdata1@pipeline.com'),
            'nric' => '888888888888',
            'agensi_organisasi' => '1',
            'bahagian' => 'IT',
            'sektor' => 1,
            'phone_pejabat' => '0888888888',
            'phone_bimbit' => '0188888888',
            'disahkan' => 1,
            'alamat' => '34 Jalan Melur Taman Bunga 45502 Arau Perlis',
            'gambar_profil' => 'mrt.jpg',
            'status' => '1'
        ]);
        $user->assignRole('Pentadbir Data');
        
        $user = User::create([
            'name' => "Pentadbir Data 2",
            'email' => "pentadbirdata2@pipeline.com",
            'password' => Hash::make('pentadbirdata2@pipeline.com'),
            'nric' => '888888888888',
            'agensi_organisasi' => '2',
            'bahagian' => 'IT',
            'sektor' => 1,
            'phone_pejabat' => '0888888888',
            'phone_bimbit' => '0188888888',
            'disahkan' => 1,
            'alamat' => '34 Jalan Melur Taman Bunga 45502 Arau Perlis',
            'gambar_profil' => 'mrt.jpg',
            'status' => '1'
        ]);
        $user->assignRole('Pentadbir Data');
        
        $user = User::create([
            'name' => "Pentadbir Data 3",
            'email' => "pentadbirdata3@pipeline.com",
            'password' => Hash::make('pentadbirdata3@pipeline.com'),
            'nric' => '888888888888',
            'agensi_organisasi' => '3',
            'bahagian' => 'IT',
            'sektor' => 1,
            'phone_pejabat' => '0888888888',
            'phone_bimbit' => '0188888888',
            'disahkan' => 1,
            'alamat' => '34 Jalan Melur Taman Bunga 45502 Arau Perlis',
            'gambar_profil' => 'mrt.jpg',
            'status' => '1'
        ]);
        $user->assignRole('Pentadbir Data');
    }
}
