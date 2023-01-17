<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class ProductionModuleTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function shows_engineers_screen()
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->get(route('runa.engineer'))
            ->assertViewIs('runa.production.engineers')
            ->assertStatus(200)
            ->assertSee('Cotizaciones pendientes');
    }

    /** @test */
    function shows_manager_screen()
    {
         $user = User::factory()->create();

        $this->actingAs($user)
            ->get(route('runa.manager'))
            ->assertViewIs('runa.production.manager')
            ->assertStatus(200)
            ->assertSee('Cotizaciones pendientes');
    }

    /** @test */
    function shows_designs_screen()
    {
         $user = User::factory()->create();

        $this->actingAs($user)
            ->get(route('runa.design.index'))
            ->assertViewIs('runa.designs')
            ->assertStatus(200)
            ->assertSee('Subir diseño');
    }

    /** @test */
    function shows_operator_screen()
    {
         $user = User::factory()->create();

        $this->actingAs($user)
            ->get(route('runa.operator.index'))
            ->assertViewIs('runa.production.operator')
            ->assertStatus(200)
            ->assertSee('Cotizaciones');
    }
}
