<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserControllerTest extends TestCase
{
    use RefreshDatabase; // This will reset the database after each test

    /**
     * Test creating a user with login credentials.
     *
     * @return void
     */
    public function testCreateUserWithCredentials()
    {
        // Arrange: Prepare the input data
        $userData = [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => 'secret123',
        ];

        // Act: Call the function to create a user
        $response = $this->post('/create-user', $userData);

        // Assert: Check if the user was created and redirected
        $response->assertStatus(201); // Check if the response status is a redirect
        $this->assertDatabaseHas('users', ['email' => 'john@example.com']); // Check if user was stored in the database
    }

    /** @test */
    public function itCanDeleteAUser()
    {
        $user = User::factory()->create();

        $response = $this->delete('/delete-user/' . $user->id);

        $response->assertStatus(200);
        $this->assertDeleted('users', ['id' => $user->id]);
    }
}
