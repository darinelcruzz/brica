<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProvidersModuleTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function shows_providers_list()
    {
        $user = factory(\App\User::class)->create();

        $this->actingAs($user)
            ->get(route('runa.provider.index'))
            ->assertViewIs('runa.providers.index')
            ->assertStatus(200)
            ->assertSee('Proveedores');
    }

    /** @test */
    function creates_a_provider()
    {
        $user = factory(\App\User::class)->create();

        $this->actingAs($user)
            ->get(route('runa.provider.create'))
            ->assertViewIs('runa.providers.create')
            ->assertStatus(200)
            ->assertSee('Agregar proveedor');
    }
}
