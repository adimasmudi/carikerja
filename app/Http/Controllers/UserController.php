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

    // Show Registration Form of Recruiter
    public function createRecruiter()
    {
        return view('users.registerRecruiter');
    }

    // Show Registration Form of Seeker
    public function createSeeker()
    {
        return view('users.registerSeeker');
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
    public function loginSeeker()
    {
        return view('users.loginSeeker');
    }

    public function loginRecruiter()
    {
        return view('users.loginRecruiter');
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

    // Show Login Login admin
    public function loginAdmin()
    {
        return view('admin.admin');
    }

    // dashboard admin
    public function dashboardAdmin()
    {
        return view('admin.dashboard');
    }

    public function dashboardAdminRecruiter()
    {
        return view('admin.recruiter');
    }

    public function dashboardAdminSeeker()
    {
        return view('admin.seeker');
    }
}
