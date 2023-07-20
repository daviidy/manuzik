<?php

namespace App\Http\Controllers;

use App\Models\Playlist;
use Illuminate\Http\Request;

class PlaylistController extends Controller
{
    public function index()
    {
        $playlists = Playlist::all();
        return response()->json($playlists);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
        ]);

        $playlist = Playlist::create($request->all());

        return response()->json($playlist, 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $playlist = Playlist::findOrFail($id);

        $playlist->title = $request->input('title');

        $playlist->save();

        return redirect()->back()->with('success', 'Playlist updated successfully.');
    }

    public function delete(Request $request, $id)
    {
        $playlist = Playlist::findOrFail($id);

        $playlist->musics()->detach();

        $playlist->delete();

        return redirect()->back()->with('success', 'Playlist deleted successfully.');
    }
}
