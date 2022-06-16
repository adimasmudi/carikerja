<?php

namespace App\Http\Controllers;

use App\Models\Seeker;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class SeekerController extends Controller
{
    protected $guard = 'seekers';
    // Create New User
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'nama' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('seekers', 'email')],
            'contact' => 'required',
            'alamat' => 'required',
            'password' => 'required|confirmed|min:6'
        ]);

        // Hash Password
        $formFields['password'] = bcrypt($formFields['password']);

        // Create User
        $seeker = Seeker::create($formFields);

        // login
        //auth()->login($seeker);


        return redirect('/login/seeker')->with('message', 'Pencari Kerja telah dibuat');
    }

    // Authenticate Seeker
    public function authenticate(Request $request)
    {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if (Auth::guard('seeker')->attempt($formFields)) {
            $request->session()->regenerate();

            return redirect('/')->with('message', 'Anda sudah login');
        }

        return back()->withErrors(['email' => 'Email atau kata sandi salah'])->onlyInput('email');
    }
}
