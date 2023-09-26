<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Music;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', ['users' => $users]);
    }

    public function home()
    {
        $musics = Music::with('playlists')->orderBy('title')->orderBy('notation')->get();
        return view('dashboard', ['musics' => $musics]);
    }
    public function createUserWithCredentials(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:4',
        ]);

        // Create a new user
        $user = new User();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']);
        $user->save();

        return redirect()->back()->with('success', 'User created successfully');
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        if ($user !== null) {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email',
            ]);

            $user->name = $request->input('name');
            $user->email = $request->input('email');

            $user->save();

            return redirect()->back()->with('success', 'User updated successfully');
        }

        return redirect()->back()->with('error', 'User not found');

    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json(['message' => 'User deleted successfully']);
    }

    public function destroy(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect()->back()->with('success', 'User deleted successfully.');
    }
}
