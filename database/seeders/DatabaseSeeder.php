<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Aspirasi;
use App\Models\Input_aspirasi;
use App\Models\Kategori;
use App\Models\Penduduk;
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
        // \App\Models\User::factory(10)->create();
         //Input Data Kategori
         Kategori::create(
            [
                'ket_kategori' => 'Kebersihan'
            ]
        );
        Kategori::create(
            [
                'ket_kategori' => 'Keamanan'
            ]
        );
        Kategori::create(
            [
                'ket_kategori' => 'Kesehatan'
            ]
        );
        //Input Data Penduduk
        Penduduk::create([
            'id' => '112233445566778899',
            'nama' => 'Michelle Unjani Riyanti S.Sos',
            'alamat' => 'Kpg. Ters. Buah Batu No. 76, Tegal 31072, DKI',
        ]);
        Penduduk::create([
            'id' => '1209762804061170',
            'nama' => 'Zizi Patricia Safitri',
            'alamat' => 'Ki. Umalas No. 711, Bandung 39017, Riau',
        ]);
        Penduduk::create([
            'id' => '1506926508141921',
            'nama' => 'Ibrani Saptono',
            'alamat' => 'Kpg. Baing No. 743, Pekalongan 23758, Jambi',
        ]);
        //Input Data Aspirasi
          Aspirasi::create([
            'id' => 1,
            'id_aspirasi' => 1,
            'kategori_id' => 2,
            'status' => 'Menunggu',
        ]);
        Aspirasi::create([
            'id' => 2,
            'id_aspirasi' => 2,
            'kategori_id' => 3,
            'status' => 'Menunggu',
        ]);
        //Input Aspirasi
        Input_aspirasi::create([
            'nik' => '1506926508141921',
            'kategori_id' => '2',
            'lokasi' => 'SMK TELKOM',
            'ket' => 'kehilangan motor',
        ]);
        Input_aspirasi::create([
            'nik' => '1506926508141921',
            'kategori_id' => '3',
            'lokasi' => 'Kalideres',
            'ket' => 'Kali kotor',
        ]);
        //input data admin
        Admin::create([
            'username' => 'admin',
            'password' => bcrypt('password'),
        ]);
    }
}