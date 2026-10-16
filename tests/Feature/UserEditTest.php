<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UserEditTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_shows_the_selected_users_details_in_the_edit_form(): void
    {
        $user = User::factory()->create([
            'name' => 'Alex Morgan',
            'email' => 'alex@example.com',
        ]);

        $this->get(route('user.edit', $user))
            ->assertOk()
            ->assertSee('value="Alex Morgan"', false)
            ->assertSee('value="alex@example.com"', false)
            ->assertSee('Leave blank to keep the current password');
    }

    public function test_it_updates_the_user_and_redirects_to_the_directory(): void
    {
        $user = User::factory()->create();

        $response = $this->put(route('user.update', $user), [
            'name' => 'Alex Morgan',
            'email' => 'alex@example.com',
            'password' => 'new-password',
        ]);

        $response->assertRedirect(route('user.index'));
        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'name' => 'Alex Morgan',
            'email' => 'alex@example.com',
        ]);
        $this->assertTrue(Hash::check('new-password', $user->fresh()->password));
    }

    public function test_it_rejects_an_email_already_used_by_another_user(): void
    {
        $user = User::factory()->create();
        $anotherUser = User::factory()->create();

        $response = $this->from(route('user.edit', $user))->put(route('user.update', $user), [
            'name' => $user->name,
            'email' => $anotherUser->email,
        ]);

        $response->assertSessionHasErrors('email');
        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'email' => $user->email,
        ]);
    }
}
