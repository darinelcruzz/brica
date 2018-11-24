<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminModuleTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function shows_daily_balance_screen()
    {
        $user = factory(\App\User::class)->create();

        $this->actingAs($user)
            ->get(route('runa.balance'))
            //->assertViewIs('runa.balance')
            //->assertStatus(200)
            ->assertSee('Ingresos');
    }

    // /** @test */
    // function shows_monthly_balance_screen()
    // {
    //     $user = factory(\App\User::class)->create();

    //     $this->actingAs($user)
    //         ->get(route('runa.monthly'))
    //         ->assertViewIs('runa.admin.monthly')
    //         ->assertStatus(200)
    //         ->assertSee('Ingresos');
    // }

    /** @test */
    function shows_expenses_screen()
    {
        $user = factory(\App\User::class)->create();

        $this->actingAs($user)
            ->get(route('runa.expenses'))
            ->assertViewIs('runa.admin.expenses')
            ->assertStatus(200)
            ->assertSee('Agregar gasto');
    }

    /** @test */
    function manages_quotations()
    {
        $user = factory(\App\User::class)->create();

        $this->actingAs($user)
            ->get(route('runa.manage'))
            ->assertViewIs('runa.admin.delete')
            ->assertStatus(200)
            ->assertSee('Cotizaciones');
    }
}
