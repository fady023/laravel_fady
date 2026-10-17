<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserDeleteTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_deletes_the_selected_user_and_redirects_to_the_directory(): void
    {
        $user = User::factory()->create();

        $response = $this->delete(route('user.destroy', $user));

        $response->assertRedirect(route('user.index'))
            ->assertSessionHas('success', 'User deleted.');
        $this->assertDatabaseMissing('users', ['id' => $user->id]);
    }

    public function test_the_users_page_submits_a_delete_request_for_each_user(): void
    {
        $user = User::factory()->create();

        $this->get(route('user.index'))
            ->assertOk()
            ->assertSee(route('user.destroy', $user))
            ->assertSee('name="_method" value="DELETE"', false)
            ->assertSee('Are you sure you want to delete this user?');
    }
}
