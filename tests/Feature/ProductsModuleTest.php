<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class ProductsModuleTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function shows_products_list()
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->get(route('runa.product.index'))
            ->assertViewIs('runa.products.index')
            ->assertStatus(200)
            ->assertSee('Producto');
    }

    /** @test */
    function creates_a_product()
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->get(route('runa.product.create'))
            ->assertViewIs('runa.products.create')
            ->assertStatus(200)
            ->assertSee('Agregar producto');
    }
}
