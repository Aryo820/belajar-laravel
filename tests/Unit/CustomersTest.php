<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Customers;

class CustomersTest extends TestCase
{
    use RefreshDatabase;
    public function test_customers_creation()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $response = $this->post('/customer', [
            'name' => 'New Customer',
            'phone' => '081233',
            'address' => 'New Address'
        ]);

        $response->assertRedirect('/customer');
        $this->assertDatabaseHas('customers', [
            'name' => 'New Customer',
            'phone' => '081233',
            'address' => 'New Address'
        ]);

        $response->assertSessionHasErrors([
            'phone' => 'Customer with phone 081233 already exists',
        ]);
    }

    public function test_customers_update()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $customer = Customers::factory()->create([
            'name' => 'New Customer',
            'phone' => '081233',
            'address' => 'New Address'
        ]);

        $response = $this->put("/customer/{$customer->id}", [
            'name' => 'Updated Customer',
            'phone' => '081233',
            'address' => 'Updated Address'
        ]);
}
}
