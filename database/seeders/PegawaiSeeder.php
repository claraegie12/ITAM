<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\pegawai;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        pegawai::factory(100)->create();
    }
}
