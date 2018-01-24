<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ClientsModuleTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function shows_clients_list()
    {
        $user = factory(\App\User::class)->create();

        $this->actingAs($user)
            ->get(route('runa.client.index'))
            ->assertViewIs('runa.clients.index')
            ->assertStatus(200)
            ->assertSee('Clientes');
    }

    /** @test */
    function creates_a_client()
    {
        $user = factory(\App\User::class)->create();

        $this->actingAs($user)
            ->get(route('runa.client.create'))
            ->assertViewIs('runa.clients.create')
            ->assertStatus(200)
            ->assertSee('Nuevo cliente');
    }
}
