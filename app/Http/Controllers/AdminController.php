<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use App\Models\Seeker;
use App\Models\Listing;
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
            $request->session()->regenerate();
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

    // Delete Listing
    public function deleteListing(Listing $listing)
    {
        // make sure logged in user is owner
        if (Auth::guard('admin')) {
            $listing->delete();

            return redirect('/admin/dashboard')->with('message', 'Listing berhasil dihapus');
        } else {
            abort(403, 'unauthorized action');
        }
    }

    // Delete Seeker
    public function deleteSeeker(Seeker $seeker)
    {
        // make sure logged in user is owner
        if (Auth::guard('admin')) {
            $seeker->delete();

            return redirect('/admin/dashboard')->with('message', 'Pencari Kerja berhasil dihapus');
        } else {
            abort(403, 'unauthorized action');
        }
    }

    // Delete Recruiter
    public function deleteRecruiter(User $user)
    {
        // make sure logged in user is owner
        if (Auth::guard('admin')) {
            $user->delete();

            return redirect('/admin/dashboard')->with('message', 'Recruiter berhasil dihapus');
        } else {
            abort(403, 'unauthorized action');
        }
    }
}
