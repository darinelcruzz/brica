<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class EntryTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function test_an_entry_can_be_created()
    {
        $this->browse(function (Browser $browser) {
            $browser->visitRoute('entries.create')
                    ->type('quotation', 5910)
                    ->type('weight', 800)
                    ->type('items', 4)
                    ->type('date', '11-04-2017')
                    ->type('amount', 1500);
        });
    }
}
