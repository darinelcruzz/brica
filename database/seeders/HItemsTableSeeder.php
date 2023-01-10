<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class HItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Hercules\HItem::class, 50)->create();
    }
}
