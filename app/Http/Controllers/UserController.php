<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        } else {
            return redirect()->back()->withErrors(['email' => trans('auth.failed')]);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function dashboard()
    {
        $user = Auth::user();

        return view('dashboard', ['user' => $user]);
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'password' => 'nullable|string|min:8',
        ]);

        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];

        if (! empty($validatedData['password'])) {
            $user->password = bcrypt($validatedData['password']);
        }

        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }

    public function getUsers()
    {
        return view('users', ['users' => User::all()]);
    }

    public function createUser(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'nullable|string|min:8',
        ]);
        User::create($validatedData);

        return redirect('/user');
    }

    public function updateUser($id, Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
        ]);
        $user = User::where('id', $id)->first();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];

        if (! empty($validatedData['password'])) {
            $user->password = bcrypt($validatedData['password']);
        }

        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
}
