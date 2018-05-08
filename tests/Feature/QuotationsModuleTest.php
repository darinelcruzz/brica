<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class QuotationsModuleTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function list_quotations_to_be_paid()
    {
        $user = factory(\App\User::class)->create();

        $this->actingAs($user)
            ->get(route('runa.cashier'))
            ->assertViewIs('runa.cashier.index')
            ->assertStatus(200)
            ->assertSee('Producto terminado');
    }

    /** @test */
    function generates_tickets_for_quotations()
    {
        $user = factory(\App\User::class)->create();

        $this->actingAs($user)
            ->get(route('runa.cashier.finished'))
            ->assertViewIs('runa.cashier.finished')
            ->assertStatus(200)
            ->assertSee('Cotizaciones por pagar');
    }

    /** @test */
    function creates_terminated_quotation()
    {
        $user = factory(\App\User::class)->create();

        $this->actingAs($user)
            ->get(route('runa.quotationt.create'))
            //->assertViewIs('runa.quotations.terminated')
            //->assertStatus(200)
            ->assertSee('Nueva cotización');
    }

    /** @test */
    function creates_production_quotation()
    {
        $user = factory(\App\User::class)->create();

        $this->actingAs($user)
            ->get(route('runa.quotationp.create'))
            //->assertViewIs('runa.quotations.production')
            //->assertStatus(200)
            ->assertSee('Anticipo para producción');
    }
}
