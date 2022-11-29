<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class GeneratedCertificateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Models\GeneratedCertificate::factory(283)->create();
    }
}
