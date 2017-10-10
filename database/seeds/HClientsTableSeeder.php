<?php

use Illuminate\Database\Seeder;

class HClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Hercules\HClient::class, 20)->create();
    }
}
