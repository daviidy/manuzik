<?php

namespace App\Http\Controllers;

use App\Models\Music;
use App\Models\Playlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MusicController extends Controller
{
    public function index()
    {
        $musics = Music::with('playlists')->orderBy('title')->orderBy('notation')->get();
        return response()->json($musics);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'artist' => 'required|string',
            'album' => 'required|string',
            'year' => 'required|integer',
            'genre' => 'required|string',
            'notation' => 'required|integer|min:0|max:5',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'playlist_ids' => 'nullable|array'
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $extension  = request()->file('image')->getClientOriginalExtension(); //This is to get the extension of the image file just uploaded
            $image_name = time() . '_' . $request->title . '.' . $extension;
            $path = $request->file('image')->storeAs(
                'images',
                $image_name,
                's3'
            );

            $data['image'] = $path;
        }

        $music = Music::create($data);

        if ($request->has('playlist_ids')) {
            $playlistIds = $request->input('playlist_ids');
            $music->playlists()->attach($playlistIds);
        }

        return redirect()->back()->with('success', 'Music Uploaded successfully');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string',
            'artist' => 'required|string',
            'album' => 'required|string',
            'year' => 'required|integer',
            'genre' => 'required|string',
            'notation' => 'required|integer|min:0|max:5',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'playlist_ids' => 'nullable|array'
        ]);
        $music = Music::findOrFail($id);

        if ($request->hasFile('image') && $music->image !== null) {
            Storage::disk('s3')->delete($music->image);
        }
        $data = $request->all();

        if ($request->hasFile('image')) {
            $extension  = request()->file('image')->getClientOriginalExtension(); //This is to get the extension of the image file just uploaded
            $image_name = time() . '_' . $request->title . '.' . $extension;
            $path = $request->file('image')->storeAs(
                'images',
                $image_name,
                's3'
            );

            $data['image'] = $path;
        }

        $music->update($data);

        if ($request->has('playlist_ids')) {
            $playlistIds = $request->input('playlist_ids');

            $music->playlists()->sync($playlistIds);
        }


        return redirect()->back()->with('success', 'Music Uploaded successfully');
    }

    public function destroy(Request $request, $id)
    {
        $music = Music::findOrFail($id);

        if (!empty($music->image)) {
            Storage::disk('s3')->delete($music->image);
        }

        $music->playlists()->detach();

        $music->delete();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Music deleted successfully.');
    }
}
