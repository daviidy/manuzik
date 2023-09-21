<?php

namespace App\Http\Controllers;

use App\Models\Playlist;
use Illuminate\Http\Request;

class PlaylistController extends Controller
{
    public function index()
    {
        $playlists = Playlist::all();
        return view('playlists.index', ['playlists' => $playlists]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $playlist = Playlist::create($request->all());

        return redirect()->back()->with('success', 'Playlist created successfully.');
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

    public function destroy(Request $request, $id)
    {
        $playlist = Playlist::findOrFail($id);

        $playlist->musics()->detach();

        $playlist->delete();

        return redirect()->back()->with('success', 'Playlist deleted successfully.');
    }
}
