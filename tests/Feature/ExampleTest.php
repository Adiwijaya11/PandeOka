<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_new_arrivals_page_returns_successful_response(): void
    {
        $response = $this->get('/new-arrivals');

        $response->assertStatus(200);
        $response->assertSee('NEW ARRIVALS');
    }

    public function test_product_detail_page_returns_successful_response(): void
    {
        $response = $this->get('/products/sofa-3-seater-minimalis-jati-salak-brown');

        $response->assertStatus(200);
        $response->assertSee('Sofa 3-Seater Minimalis Kayu Jati');
        $response->assertSee('Rp 4.250.000');
    }

    public function test_invalid_product_returns_404(): void
    {
        $response = $this->get('/products/produk-tidak-ditemukan');

        $response->assertStatus(404);
    }
}
