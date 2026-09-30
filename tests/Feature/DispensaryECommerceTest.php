<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DispensaryECommerceTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }

    public function test_dispensary_catalog_and_cart_flow(): void
    {
        $response = $this->get('/shop');
        $response->assertRedirect('/services');

        $cartView = $this->get('/cart');
        $cartView->assertRedirect('/services');
    }
}
