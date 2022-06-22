<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Apply;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

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


        return redirect('/login/recruiter')->with('message', 'Akun Recruiter telah berhasil dibuat');
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

        if (Auth::guard('user')->attempt($formFields)) {
            $request->session()->put('recruiter', $formFields['email']);

            return redirect('/recruiter/dashboard')->with('message', 'Anda sudah login sebagai recruiter');
        }

        return back()->withErrors(['email' => 'Email atau kata sandi salah'])->onlyInput('email');
    }

    // display dashboard recruiter
    public function dashboardRecruiter()
    {
        return view('recruiter.dashboard', ['listings' => Auth::guard('user')->user()->listings()->get()]);
    }

    // Manage Listings
    public function manage()
    {
        return view('recruiter.manage', ['listings' => Auth::guard('user')->user()->listings()->get()]);
    }

    // Manage Listings
    public function application()
    {
        return view('recruiter.application', [
            'listings' => Auth::guard('user')->user()->listings()->get()
        ]);
    }
}
