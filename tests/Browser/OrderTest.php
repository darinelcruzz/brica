<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class OrderTest extends DuskTestCase
{
    use DatabaseTransactions;

    public function test_an_order_can_be_created()
    {
        $this->browse(function (Browser $browser) {
            $browser->visitRoute('order.create')
                    ->select('team', '1')
                    ->select('client', '1')
                    ->type('weight', 800)
                    //->type('date', $date)
                    ->keys('#date', 02)
                    ->keys('#date', 04)
                    ->keys('#date', 2017)
                    ->select('provider', '2')
                    ->type('amount', 1500)
                    ->type('items', 4)
                    ->press('Agregar')
                    ->assertPathIs('/ordenes');
        });

        $this->assertDatabaseHas('orders', [
            'team' => '1',
            'client' => '1',
            'weight' => 800,
            'date' => '2017-02-04',
            'provider' => '2',
            'amount' => 1500,
            'items' => 4,
        ]);
    }
}
