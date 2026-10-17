<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserDeleteTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_soft_deletes_the_selected_user_and_redirects_to_the_directory(): void
    {
        $user = User::factory()->create();

        $response = $this->delete(route('user.destroy', $user));

        $response->assertRedirect(route('user.index'))
            ->assertSessionHas('success', 'User deleted.');
        $this->assertSoftDeleted('users', ['id' => $user->id]);
    }

    public function test_the_users_page_shows_actions_for_active_users_and_restore_for_deleted_users(): void
    {
        $activeUser = User::factory()->create();
        $deletedUser = User::factory()->create();
        $deletedUser->delete();

        $this->get(route('user.index'))
            ->assertOk()
            ->assertSee(route('user.destroy', $activeUser))
            ->assertDontSee(route('user.restore', $activeUser))
            ->assertSee('name="_method" value="DELETE"', false)
            ->assertSee(route('user.restore', $deletedUser))
            ->assertSee('name="_token"', false)
            ->assertSeeText('Restore')
            ->assertSee('Are you sure you want to delete this user?');
    }

    public function test_it_restores_a_soft_deleted_user(): void
    {
        $user = User::factory()->create();
        $user->delete();

        $response = $this->post(route('user.restore', $user));

        $response->assertRedirect(route('user.index'))
            ->assertSessionHas('success', 'User restored.');
        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'deleted_at' => null,
        ]);
    }
}
