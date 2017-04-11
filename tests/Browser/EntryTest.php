<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class EntryTest extends DuskTestCase
{
    //use DatabaseMigrations;

    public function test_an_entry_can_be_created()
    {
        $this->browse(function (Browser $browser) {
            $browser->visitRoute('entries.create')
                    ->type('quotation', 5910)
                    ->type('weight', 800)
                    ->type('date', '11/04/2017')
                    ->select('provider', '2')
                    ->type('amount', 1500)
                    ->type('items', 4)
                    ->press('Agregar')
                    ->assertPathIs('/entradas/crear');
        });

        $this->assertDatabaseHas('entries', [
            'quotation' => 5910,
            'weight' => 800,
            'date' => '11/04/2017',
            'provider' => '2',
            'amount' => 1500,
            'items' => 4,
        ]);
    }
}
