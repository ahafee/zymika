<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PublicPagesTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }

    public function test_home_page_is_accessible(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('ZOVI LEAF');
        $response->assertSee('Dr. Suneetha Batthala');
        $response->assertSee('Check Eligibility');
    }

    public function test_about_page_is_accessible(): void
    {
        $response = $this->get('/about');
        $response->assertStatus(200);
        $response->assertSee('Surry Hills');
        $response->assertSee('Dr. Suneetha Batthala');
    }

    public function test_how_it_works_page_is_accessible(): void
    {
        $response = $this->get('/how-it-works');
        $response->assertStatus(200);
        $response->assertSee('How Australian Telehealth Works');
        $response->assertSee('Intake Assessment');
    }

    public function test_services_page_is_accessible(): void
    {
        $response = $this->get('/services');
        $response->assertStatus(200);
        $response->assertSee('Initial Telehealth Consultation');
    }

    public function test_faqs_page_is_accessible(): void
    {
        $response = $this->get('/faqs');
        $response->assertStatus(200);
        $response->assertSee('Is medicinal cannabis legal in Australia?');
    }

    public function test_contact_page_is_accessible_and_submittable(): void
    {
        $response = $this->get('/contact');
        $response->assertStatus(200);
        $response->assertSee('Surry Hills NSW 2010');

        $postResponse = $this->post('/contact', [
            'name' => 'Alice Test',
            'email' => 'alice@example.com',
            'phone' => '0412000000',
            'subject' => 'General Question',
            'message' => 'I would like to inquire about booking a consultation.',
        ]);
        $postResponse->assertRedirect();
        $postResponse->assertSessionHas('success');
    }
}
