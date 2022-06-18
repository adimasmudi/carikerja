<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    protected $guard = 'admins';
    // Show Login Login admin
    public function loginAdmin()
    {
        return view('admin.admin');
    }

    // show register form
    public function registerAdmin()
    {
        return view('admin.register');
    }

    // store data admin
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'username' => ['required', Rule::unique('admins', 'username')],
            'password' => 'required|min:6'
        ]);

        // Hash Password
        $formFields['password'] = bcrypt($formFields['password']);

        // Create User
        $seeker = Admin::create($formFields);



        return redirect('/admin')->with('message', 'Akun admin berhasil dibuat');
    }

    // authenticate admin
    public function authenticate(Request $request)
    {
        $formFields = $request->validate([
            'username' => ['required'],
            'password' => 'required'
        ]);

        if (Auth::guard('admin')->attempt($formFields)) {
            $request->session()->put('admin', $formFields['username']);
            return redirect('/admin/dashboard')->with([
                'message' => 'Selamat datang admin'
            ]);
        }

        return back()->withErrors(['email' => 'Email atau kata sandi salah'])->onlyInput('email');
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
