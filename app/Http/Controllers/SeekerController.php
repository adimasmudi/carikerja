<?php

namespace App\Http\Controllers;

use App\Models\Apply;
use App\Models\Seeker;
use App\Models\Listing;
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
            $request->session()->put('seeker', $formFields['email']);
            return redirect('/seeker/dashboard')->with([
                'message' => 'Anda sudah login sebagai pencari kerja'
            ]);
        }

        return back()->withErrors(['email' => 'Email atau kata sandi salah'])->onlyInput('email');
    }

    public function dashboardSeeker()
    {
        return view('seeker.dashboard', [
            'heading' => 'Latest Listings',
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->simplePaginate(4)
        ]);
    }

    // Manage application
    public function manage()
    {
        return view('seeker.manage', [
            'applies' => Auth::guard('seeker')->user()->apply()->get()
        ]);
    }

    // see details application
    public function details(Apply $apply, Listing $listing)
    {
        return view('seeker.details', [
            'apply' => $apply,
            'listing' => $listing
        ]);
    }
}
