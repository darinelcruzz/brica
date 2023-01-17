<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\Client;

// class ReportsModuleTest extends TestCase
// {
//     use RefreshDatabase;

//     /** @test */
//     function renders_sales_per_team()
//     {
//         $user = User::factory()->create();

//         $this->actingAs($user)
//             ->get(route('runa.report.teams'))
//             ->assertViewIs('runa.reports.teams')
//             ->assertStatus(200)
//             ->assertSee('Dinero');
//     }

//     /** @test */
//     function renders_sales_graph()
//     {
//         $user = User::factory()->create();

//         $this->actingAs($user)
//             ->get(route('runa.report.sales'))
//             ->assertViewIs('runa.reports.sales')
//             ->assertStatus(200)
//             ->assertSee('Ventas');
//     }

//     /** @test */
//     function renders_sales_per_client()
//     {
//         $user = User::factory()->create();

//         $this->actingAs($user)
//             ->get(route('runa.report.clients'))
//             ->assertViewIs('runa.reports.clients')
//             ->assertStatus(200)
//             ->assertSee('Clientes');
//     }

//     /** @test */
//     function renders_products_graph()
//     {
//         $user = User::factory()->create();

//         $this->actingAs($user)
//             ->get(route('runa.report.products'))
//             ->assertViewIs('runa.reports.products')
//             ->assertStatus(200)
//             ->assertSee('Productos');
//     }
// }
