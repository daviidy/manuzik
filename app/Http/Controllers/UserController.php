<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Music;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function home() {
        $musics = Music::with('playlists')->orderBy('title')->orderBy('notation')->get();
        return view('dashboard', ['musics' => $musics]);
    }
    public function createUserWithCredentials(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);

        // Create a new user
        $user = new User();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']);
        $user->save();

        return response()->json(['message' => 'User created successfully'], 201);
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json(['message' => 'User deleted successfully']);
    }
}
