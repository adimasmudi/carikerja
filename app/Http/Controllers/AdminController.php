<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
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
