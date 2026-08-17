<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ContactAndAdminTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->artisan('db:seed', ['--class' => 'Database\\Seeders\\AdminSeeder']);
    }

    public function test_contact_form_stores_a_query(): void
    {
        $response = $this->postJson(route('contact.store'), [
            'name' => 'Sara Ali',
            'email' => 'sara@example.com',
            'phone' => '+92 300 0000000',
            'subject' => 'Need a mobile app',
            'message' => 'We want a Flutter app for our shop.',
        ]);

        $response->assertCreated()->assertJson(['success' => true]);
        $this->assertDatabaseHas('contact_messages', [
            'email' => 'sara@example.com',
            'subject' => 'Need a mobile app',
            'status' => 'unread',
        ]);
    }

    public function test_admin_can_login_and_see_queries(): void
    {
        $response = $this->post(route('admin.authenticate'), [
            'email' => 'admin@obtainsolutions.com',
            'password' => 'admin123',
        ]);

        $response->assertRedirect(route('admin.dashboard'));
        $this->assertAuthenticated();

        $this->get(route('admin.dashboard'))->assertOk()->assertSee('Contact queries');
        $this->get(route('admin.messages'))->assertOk()->assertSee('Inbound project inquiries');
    }

    public function test_guest_cannot_open_admin_dashboard(): void
    {
        $this->get(route('admin.dashboard'))->assertRedirect(route('admin.login'));
    }

    public function test_non_admin_cannot_open_dashboard(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->get(route('admin.dashboard'))
            ->assertForbidden();
    }
}
