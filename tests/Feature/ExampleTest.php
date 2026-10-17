<?php

namespace Tests\Feature;

use App\Models\CartItem;
use App\Models\Product;
use App\Models\User;
use App\Services\CartService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_navbar_shows_login_button_for_guests(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Masuk');
        $response->assertDontSee('Keluar (Logout)');
    }

    public function test_navbar_shows_user_profile_and_hides_login_button_for_authenticated_users(): void
    {
        $user = User::factory()->create([
            'name' => 'Wayan Sudira',
            'email' => 'wayan@pandeoka.com',
        ]);

        $response = $this->actingAs($user)->get('/');

        $response->assertStatus(200);
        $response->assertSee('Wayan Sudira');
        $response->assertSee('Keluar (Logout)');
        $response->assertDontSee('>Masuk<');
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

    public function test_products_are_loaded_from_database(): void
    {
        $customProduct = Product::factory()->create([
            'name' => 'Meja Konsol Jati Ukir Jepara Asli',
            'slug' => 'meja-konsol-jati-ukir-jepara-asli',
            'price' => 3750000,
        ]);

        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('Meja Konsol Jati Ukir Jepara Asli');

        $detailResponse = $this->get('/products/'.$customProduct->slug);
        $detailResponse->assertStatus(200);
        $detailResponse->assertSee('Meja Konsol Jati Ukir Jepara Asli');
    }

    public function test_invalid_product_returns_404(): void
    {
        $response = $this->get('/products/produk-tidak-ditemukan');

        $response->assertStatus(404);
    }

    public function test_login_page_returns_successful_response(): void
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
        $response->assertSee('Masuk ke Akun');
        $response->assertSee('PANDE OKA');
    }

    public function test_login_submission_redirects_with_success(): void
    {
        $user = User::factory()->create([
            'email' => 'pelanggan@pandeoka.com',
            'password' => 'password123',
        ]);

        $response = $this->post('/login', [
            'email' => 'pelanggan@pandeoka.com',
            'password' => 'password123',
            'remember' => 'on',
        ]);

        $response->assertRedirect('/');
        $response->assertSessionHas('success');
        $this->assertAuthenticatedAs($user);
    }

    public function test_superadmin_login_redirects_to_superadmin_index(): void
    {
        $superAdmin = User::factory()->superAdmin()->create([
            'email' => 'admin@pandeoka.com',
            'password' => 'password123',
        ]);

        $response = $this->post('/login', [
            'email' => 'admin@pandeoka.com',
            'password' => 'password123',
        ]);

        $response->assertRedirect(route('superadmin.index'));
        $this->assertAuthenticatedAs($superAdmin);
    }

    public function test_regular_user_cannot_access_superadmin_index(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/superadmin/index');

        $response->assertStatus(403);
    }

    public function test_superadmin_can_access_superadmin_index(): void
    {
        $superAdmin = User::factory()->superAdmin()->create();

        $response = $this->actingAs($superAdmin)->get('/superadmin/index');

        $response->assertStatus(200);
    }

    public function test_login_fails_with_invalid_credentials(): void
    {
        $response = $this->from('/login')->post('/login', [
            'email' => 'unknown@pandeoka.com',
            'password' => 'wrongpassword123',
        ]);

        $response->assertRedirect('/login');
        $response->assertSessionHasErrors(['email']);
        $this->assertGuest();
    }

    public function test_login_protects_against_sql_injection(): void
    {
        $response = $this->from('/login')->post('/login', [
            'email' => "' OR '1'='1' --",
            'password' => "' OR '1'='1'",
        ]);

        $response->assertRedirect('/login');
        $response->assertSessionHasErrors(['email']);
        $this->assertGuest();
    }

    public function test_login_rate_limiting_throttles_brute_force_attempts(): void
    {
        // Execute 5 failed login attempts
        for ($i = 0; $i < 5; $i++) {
            $this->post('/login', [
                'email' => 'victim@pandeoka.com',
                'password' => 'wrongpass',
            ]);
        }

        // 6th attempt should be locked out by rate limiter
        $response = $this->from('/login')->post('/login', [
            'email' => 'victim@pandeoka.com',
            'password' => 'wrongpass',
        ]);

        $response->assertSessionHasErrors(['email']);
        $errorMessage = session('errors')->first('email');
        $this->assertStringContainsString('Terlalu banyak percobaan', $errorMessage);
    }

    public function test_register_page_returns_successful_response(): void
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
        $response->assertSee('Buat Akun Pelanggan Baru');
        $response->assertSee('Alamat Lengkap Pengiriman Furniture');
    }

    public function test_register_submission_redirects_to_login_with_success(): void
    {
        $response = $this->post('/register', [
            'name' => 'I Made Adiwijaya',
            'email' => 'adiwijaya@example.com',
            'phone' => '081234567890',
            'province' => 'Bali',
            'city' => 'Denpasar',
            'postal_code' => '80361',
            'address' => 'Jl. Sunset Road No. 88, Badung, Bali',
            'password' => 'secret1234',
            'password_confirmation' => 'secret1234',
        ]);

        $response->assertRedirect('/login');
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('users', [
            'email' => 'adiwijaya@example.com',
            'name' => 'I Made Adiwijaya',
            'province' => 'Bali',
            'city' => 'Denpasar',
            'role' => 'user',
        ]);
    }

    public function test_register_sanitizes_xss_payloads(): void
    {
        $response = $this->post('/register', [
            'name' => '<b>I Made Adiwijaya</b>',
            'email' => 'xssclean@example.com',
            'phone' => '081234567891',
            'province' => 'Bali',
            'city' => 'Denpasar',
            'postal_code' => '80361',
            'address' => 'Jl. Legian No. 12 <script>evil()</script> Badung',
            'password' => 'secret1234',
            'password_confirmation' => 'secret1234',
        ]);

        $response->assertRedirect('/login');

        // Verify tags are stripped out and malicious HTML/scripts are never saved
        $this->assertDatabaseMissing('users', [
            'email' => 'xssclean@example.com',
            'name' => '<b>I Made Adiwijaya</b>',
        ]);

        $this->assertDatabaseHas('users', [
            'email' => 'xssclean@example.com',
            'name' => 'I Made Adiwijaya',
            'address' => 'Jl. Legian No. 12 evil() Badung',
        ]);
    }

    public function test_register_prevents_duplicate_email(): void
    {
        User::factory()->create([
            'email' => 'existing@example.com',
        ]);

        $response = $this->from('/register')->post('/register', [
            'name' => 'Pelanggan Baru',
            'email' => 'existing@example.com',
            'phone' => '081234567890',
            'province' => 'Bali',
            'city' => 'Denpasar',
            'postal_code' => '80361',
            'address' => 'Jl. Bypass Ngurah Rai No. 100',
            'password' => 'secret1234',
            'password_confirmation' => 'secret1234',
        ]);

        $response->assertRedirect('/register');
        $response->assertSessionHasErrors(['email']);
    }

    public function test_cart_page_renders_empty_state_when_no_items(): void
    {
        $response = $this->get('/cart');

        $response->assertStatus(200);
        $response->assertSee('Keranjang Belanja');
        $response->assertSee('Keranjang Belanja Anda Masih Kosong');
    }

    public function test_user_can_add_product_to_cart_via_api(): void
    {
        $user = User::factory()->create();
        $product = Product::factory()->create([
            'name' => 'Meja Kerja Solid Kayu Jati Minimalis',
            'price' => 3200000,
        ]);

        $response = $this->actingAs($user)->postJson('/cart/add', [
            'product_id' => $product->id,
            'quantity' => 2,
            'variation' => 'Natural Satin Doff',
        ]);

        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
            'count' => 2,
        ]);

        $this->assertDatabaseHas('cart_items', [
            'user_id' => $user->id,
            'product_id' => $product->id,
            'quantity' => 2,
            'variation' => 'Natural Satin Doff',
        ]);
    }

    public function test_cart_page_displays_real_database_items(): void
    {
        $user = User::factory()->create();
        $product = Product::factory()->create([
            'name' => 'Kursi Santai Lounge Jati Bali',
            'price' => 2400000,
        ]);

        $this->actingAs($user)->postJson('/cart/add', [
            'product_id' => $product->id,
            'quantity' => 1,
        ]);

        $response = $this->actingAs($user)->get('/cart');

        $response->assertStatus(200);
        $response->assertSee('Kursi Santai Lounge Jati Bali');
        $response->assertSee('Rp 2.400.000');
        $response->assertDontSee('Keranjang Belanja Anda Masih Kosong');
    }

    public function test_cart_data_api_returns_real_items_and_summary(): void
    {
        $user = User::factory()->create();
        $product = Product::factory()->create([
            'name' => 'Dipan Tempat Tidur Jati King Size',
            'price' => 8500000,
        ]);

        $this->actingAs($user)->postJson('/cart/add', [
            'product_id' => $product->id,
            'quantity' => 1,
        ]);

        $response = $this->actingAs($user)->getJson('/cart/data');

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'count',
            'items',
            'summary' => [
                'total_items',
                'selected_count',
                'subtotal',
                'formatted_subtotal',
            ],
        ]);
        $response->assertJsonFragment([
            'count' => 1,
            'total_items' => 1,
        ]);
    }

    public function test_user_can_update_cart_quantity_and_selection(): void
    {
        $user = User::factory()->create();
        $product = Product::factory()->create(['price' => 1500000, 'stock' => 10]);

        $addResponse = $this->actingAs($user)->postJson('/cart/add', [
            'product_id' => $product->id,
            'quantity' => 1,
        ]);
        $itemId = $addResponse->json('item.id');

        // Update quantity to 3
        $updateResponse = $this->actingAs($user)->patchJson("/cart/{$itemId}", [
            'quantity' => 3,
            'is_selected' => false,
        ]);

        $updateResponse->assertStatus(200);
        $updateResponse->assertJsonFragment(['count' => 3]);

        $this->assertDatabaseHas('cart_items', [
            'id' => $itemId,
            'quantity' => 3,
            'is_selected' => 0,
        ]);
    }

    public function test_user_can_delete_cart_item(): void
    {
        $user = User::factory()->create();
        $product = Product::factory()->create(['price' => 2000000]);

        $addResponse = $this->actingAs($user)->postJson('/cart/add', [
            'product_id' => $product->id,
            'quantity' => 1,
        ]);
        $itemId = $addResponse->json('item.id');

        $this->assertDatabaseHas('cart_items', ['id' => $itemId]);

        $deleteResponse = $this->actingAs($user)->deleteJson("/cart/{$itemId}");
        $deleteResponse->assertStatus(200);
        $deleteResponse->assertJson(['success' => true, 'count' => 0]);

        $this->assertDatabaseMissing('cart_items', ['id' => $itemId]);
    }

    public function test_user_can_clear_all_cart_items(): void
    {
        $user = User::factory()->create();
        $productA = Product::factory()->create();
        $productB = Product::factory()->create();

        $this->actingAs($user)->postJson('/cart/add', ['product_id' => $productA->id, 'quantity' => 1]);
        $this->actingAs($user)->postJson('/cart/add', ['product_id' => $productB->id, 'quantity' => 2]);

        $clearResponse = $this->actingAs($user)->postJson('/cart/clear');
        $clearResponse->assertStatus(200);
        $clearResponse->assertJson(['success' => true, 'count' => 0]);

        $this->assertDatabaseEmpty('cart_items');
    }

    public function test_guest_cart_migrates_to_user_upon_login(): void
    {
        $user = User::factory()->create([
            'email' => 'migrateduser@example.com',
            'password' => 'secret1234',
        ]);

        $product = Product::factory()->create();

        // Guest adds item with explicit session
        $sessionId = 'guest_session_test_xyz';
        CartItem::create([
            'session_id' => $sessionId,
            'product_id' => $product->id,
            'quantity' => 2,
            'is_selected' => true,
        ]);

        $this->assertDatabaseHas('cart_items', [
            'product_id' => $product->id,
            'quantity' => 2,
            'user_id' => null,
            'session_id' => $sessionId,
        ]);

        // Migrate guest cart to user
        CartService::migrateGuestCart($user->id, $sessionId);

        // Verify cart item now belongs to the authenticated user
        $this->assertDatabaseHas('cart_items', [
            'product_id' => $product->id,
            'user_id' => $user->id,
            'quantity' => 2,
        ]);
    }

    public function test_cart_checkout_downloads_excel_order_output_and_clears_cart(): void
    {
        $user = User::factory()->create([
            'name' => 'Made Sudarma',
            'email' => 'madesudarma@example.com',
            'phone' => '+6281234567899',
        ]);

        $product = Product::factory()->create([
            'name' => 'Meja Makan Trembesi Solid Custom',
            'price' => 5000000,
        ]);

        $this->actingAs($user)->postJson('/cart/add', [
            'product_id' => $product->id,
            'quantity' => 1,
            'variation' => 'Natural Teak Wood • Ukuran: 180x90x78 cm (P x L x T)',
        ]);

        $response = $this->actingAs($user)->post('/cart/checkout/excel');

        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'application/vnd.ms-excel; charset=utf-8');
        $this->assertStringContainsString('SPK_Pesanan_PandeOka_', $response->headers->get('Content-Disposition'));
        $this->assertStringContainsString('PANDE OKA FURNITURE &amp; LIVING BALI', $response->getContent());
        $this->assertStringContainsString('180x90x78 cm', $response->getContent());
        $this->assertStringContainsString('TANPA PENGIRIMAN EKSPEDISI', $response->getContent());

        // Assert items in cart were cleared after purchase
        $this->assertDatabaseMissing('cart_items', [
            'user_id' => $user->id,
            'product_id' => $product->id,
        ]);
    }

    public function test_product_detail_page_has_custom_dimension_inputs_and_no_gratis_ongkir(): void
    {
        $product = Product::factory()->create([
            'slug' => 'kursi-makan-jati-custom-test',
            'name' => 'Kursi Makan Jati Custom Test',
            'dimensions' => '50 x 45 x 85 cm',
        ]);

        $response = $this->get('/products/'.$product->slug);

        $response->assertStatus(200);
        $response->assertSee('id="custom-length"', false);
        $response->assertSee('id="custom-width"', false);
        $response->assertSee('id="custom-height"', false);
        $response->assertSee('Custom Ukuran Langsung (P x L x T)');
        $response->assertDontSee('Gratis Ongkir');
    }

    public function test_cards_do_not_contain_gratis_ongkir_badge(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertDontSee('Gratis Ongkir');
    }

    public function test_beli_sekarang_page_renders_with_direct_product_and_custom_variation(): void
    {
        $product = Product::factory()->create([
            'name' => 'Meja Kerja Solid Jati Bali',
            'price' => 3500000,
        ]);

        $response = $this->get('/beli-sekarang?product_id='.$product->id.'&quantity=2&variation='.urlencode('Natural Teak Wood • Ukuran: 150x70x75 cm (P x L x T)'));

        $response->assertStatus(200);
        $response->assertSee('Meja Kerja Solid Jati Bali');
        $response->assertSee('150x70x75 cm');
        $response->assertSee('Beli Sekarang');
        $response->assertSee('Workshop &amp; Showroom Pande Oka', false);
        $response->assertSee('Konfirmasi &amp; Unduh SPK Excel', false);
    }

    public function test_beli_sekarang_process_validates_and_downloads_spk_excel(): void
    {
        $product = Product::factory()->create([
            'name' => 'Kursi Santai Sungkai Solid',
            'price' => 1800000,
        ]);

        $response = $this->post('/beli-sekarang/proses', [
            'customer_name' => 'Kadek Artawan',
            'customer_phone' => '081999888777',
            'customer_email' => 'kadek@pandeoka.id',
            'product_id' => $product->id,
            'quantity' => 1,
            'variation' => 'Salak Brown • Ukuran: 60x60x78 cm (P x L x T)',
            'payment_method' => 'Bayar di Workshop (Cash/EDC/Transfer)',
            'voucher_code' => 'PANDEOKA2026',
        ]);

        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'application/vnd.ms-excel; charset=utf-8');
        $this->assertStringContainsString('SPK_Pesanan_PandeOka_', $response->headers->get('Content-Disposition'));
        $this->assertStringContainsString('Kadek Artawan', $response->getContent());
        $this->assertStringContainsString('Kursi Santai Sungkai Solid', $response->getContent());
        $this->assertStringContainsString('60x60x78 cm', $response->getContent());
    }
}
