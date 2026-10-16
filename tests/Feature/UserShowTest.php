<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserShowTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_displays_the_selected_users_profile_details(): void
    {
        $user = User::factory()->create([
            'name' => 'Alex Morgan',
            'email' => 'alex@example.com',
        ]);

        $response = $this->get(route('user.show', $user));

        $response->assertOk()
            ->assertSeeText('Alex Morgan')
            ->assertSeeText('alex@example.com')
            ->assertSeeText((string) $user->id)
            ->assertSee(route('user.index'));
    }
}
