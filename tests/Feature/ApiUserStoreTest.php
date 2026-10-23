<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ApiUserStoreTest extends TestCase
{
    use RefreshDatabase;

    public function test_invalid_user_data_returns_json_validation_errors(): void
    {
        $response = $this->postJson('/api/user', []);

        $response
            ->assertUnprocessable()
            ->assertJsonValidationErrors(['name', 'email', 'password']);
    }

    public function test_valid_user_data_creates_a_user(): void
    {
        $response = $this->postJson('/api/user', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'secret123',
        ]);

        $response
            ->assertCreated()
            ->assertJsonPath('user.email', 'test@example.com');

        $this->assertDatabaseHas('users', [
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
