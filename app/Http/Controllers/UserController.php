<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // show register option
    public function registerOption()
    {
        return view('users.registerOption');
    }

    // Show Registration Form
    public function create()
    {
        return view('users.register');
    }

    // Create New User
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6'
        ]);

        // Hash Password
        $formFields['password'] = bcrypt($formFields['password']);

        // Create User
        $user = User::create($formFields);

        // login
        auth()->login($user);


        return redirect('/')->with('message', 'User telah dibuat dan berhasil login');
    }

    // User Logout
    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'Anda berhasil logout');
    }

    // show login option
    public function loginOption()
    {
        return view('users.loginOption');
    }

    // Show Login Form
    public function login()
    {
        return view('users.login');
    }

    // Authenticate User
    public function authenticate(Request $request)
    {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if (auth()->attempt($formFields)) {
            $request->session()->regenerate();

            return redirect('/')->with('message', 'Anda sudah login');
        }

        return back()->withErrors(['email' => 'Email atau kata sandi salah'])->onlyInput('email');
    }
}
