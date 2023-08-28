<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Playlist;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PlaylistControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        $response = $this->get('/playlists');

        $response->assertStatus(200)
            ->assertJson(Playlist::all()->toArray());
    }

    public function testStore()
    {
        $data = [
            'title' => 'New Playlist',
        ];

        $response = $this->post('/playlists', $data);

        $response->assertStatus(201)
            ->assertJson($data);
    }

    public function testUpdate()
    {
        $playlist = Playlist::factory()->create();

        $data = [
            'title' => 'Updated Playlist',
        ];

        $response = $this->put("/playlists/{$playlist->id}", $data);

        $response->assertStatus(302)
            ->assertRedirect('/');

        $this->assertDatabaseHas('playlists', [
            'id' => $playlist->id,
            'title' => $data['title'],
        ]);
    }

    public function testDelete()
    {
        $playlist = Playlist::factory()->create();

        $response = $this->delete("/playlists/{$playlist->id}");

        $response->assertStatus(302)
            ->assertRedirect('/');

        $this->assertDeleted('playlists', ['id' => $playlist->id]);
    }
}
