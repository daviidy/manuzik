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

    public function show($id)
    {
        // Find the playlist by its ID along with its related musics
        $playlist = Playlist::with('musics')->find($id);

        // Check if the playlist exists
        if (!$playlist) {
            return abort(404);
        }

        // Pass the playlist and related musics to the view
        return view('playlists.show', compact('playlist'));
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

    public function search(Request $request)
    {
        $searchQuery = $request->input('search');

        $playlists = Playlist::where('title', 'like', '%' . $searchQuery . '%')
            ->get();

        return redirect()->back()->with('playlists', $playlists);
    }

    public function destroy(Request $request, $id)
    {
        $playlist = Playlist::findOrFail($id);

        $playlist->musics()->detach();

        $playlist->delete();

        return redirect()->back()->with('success', 'Playlist deleted successfully.');
    }
}
