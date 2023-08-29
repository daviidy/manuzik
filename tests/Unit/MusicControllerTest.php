<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;
use App\Models\Music;
use App\Models\Playlist;

class MusicControllerTest extends TestCase
{
    use DatabaseTransactions;

    public function testIndex()
    {
        $response = $this->getJson(route('musics.index'));

        $response->assertOk();
    }

    public function testStore()
    {
        Storage::fake('s3');

        $playlistIds = Playlist::factory()->count(2)->create()->pluck('id')->toArray();

        $musicData = Music::factory()->make()->toArray();

        $data = array_merge($musicData, [
            'playlist_ids' => $playlistIds,
        ]);

        $response = $this->postJson(route('musics.store'), $data);

        $response->assertStatus(302);
    }

    public function testUpdate()
    {
        Storage::fake('s3');

        $music = Music::factory()->create();
        $playlistIds = Playlist::factory()->count(2)->create()->pluck('id')->toArray();

        $musicData = Music::factory()->make()->toArray();

        $data = array_merge($musicData, [
            'playlist_ids' => $playlistIds,
        ]);

        $response = $this->putJson(route('musics.update', $music->id), $data);

        $response->assertStatus(302);
    }

    public function testDelete()
    {
        Storage::fake('s3');

        $music = Music::factory()->create();
        $music->playlists()->attach(Playlist::factory()->create());

        $response = $this->deleteJson(route('musics.destroy', $music->id));

        $response->assertStatus(302);
    }
}

