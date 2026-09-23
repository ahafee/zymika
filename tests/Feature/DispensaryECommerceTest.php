<?php

namespace Tests\Feature;

use App\Models\Product;
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
        $product = Product::first();

        $response = $this->get('/shop');
        $response->assertStatus(200);
        $response->assertSee($product->name);

        $detailResponse = $this->get('/shop/'.$product->slug);
        $detailResponse->assertStatus(200);
        $detailResponse->assertSee($product->name);

        // Add to cart
        $cartAdd = $this->post('/cart/add', [
            'product_id' => $product->id,
            'quantity' => 1,
        ]);
        $cartAdd->assertRedirect('/cart');

        $cartView = $this->get('/cart');
        $cartView->assertStatus(200);
        $cartView->assertSee($product->name);

        // Process checkout
        $checkoutPost = $this->post('/checkout', [
            'first_name' => 'John',
            'last_name' => 'Miller',
            'email' => 'john.miller@example.com',
            'phone' => '0412 345 678',
            'address_line1' => '42 Crown Street',
            'city' => 'Surry Hills',
            'state' => 'NSW',
            'postcode' => '2010',
            'payment_method' => 'card',
            'card_number' => '4242424242424242',
            'card_expiry' => '08/28',
            'card_cvc' => '888',
            'prescription_ack' => 1,
        ]);

        $checkoutPost->assertRedirect();
        $this->assertDatabaseHas('orders', [
            'shipping_name' => 'John Miller',
            'payment_status' => 'paid',
        ]);
    }
}
