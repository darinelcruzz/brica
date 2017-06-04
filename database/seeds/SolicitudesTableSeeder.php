<?php

use Illuminate\Database\Seeder;

class SolicitudesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Solicitude::class, 1)->create();
    }
}