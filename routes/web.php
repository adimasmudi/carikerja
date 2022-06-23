<?php

use App\Models\Listing;
use Illuminate\Http\Request;
use App\Http\Middleware\IsUser;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApplyController;
use App\Http\Controllers\SeekerController;
use App\Http\Controllers\ListingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Common Resource Routes:
// index - Show all listings
// show - Show single listing
// create - Show form to create new listing
// store - Store new listing
// edit - Show form to edit listing
// update - Update listing
// destroy - Delete listing 

// All Listing
Route::get('/', function () {
    return view('landing');
});


// Create Form
Route::get('/listings/create', [ListingController::class, 'create']);

// Store Listing Data
Route::post('/listings', [ListingController::class, 'store']);

// Show Edit Form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit']);

// Update Listing
Route::put('/listings/{listing}', [ListingController::class, 'update']);

// Delete Listing
Route::delete('/listings/{listing}', [ListingController::class, 'destroy']);

// Single Listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);

// show register option
Route::get('/register/option', [UserController::class, 'registerOption']);

// Show User Registration/create form
Route::get('/register/recruiter', [UserController::class, 'createRecruiter'])->middleware('guest');

// Show User Registration/create form
Route::get('/register/seeker', [UserController::class, 'createSeeker'])->middleware('guest');

// Create a new user
Route::post('/users', [UserController::class, 'store']);

// Create a new user
Route::post('/seekers', [SeekerController::class, 'store']);

// User Logout
Route::post('/logout', [UserController::class, 'logout']);

// show login option
Route::get('/login/option', [UserController::class, 'loginOption']);

// Show Login Form in recruiter or seeker
Route::get('/login/recruiter', [UserController::class, 'loginRecruiter'])->name('loginRecruiter')->middleware('guest');
Route::get('/login/seeker', [UserController::class, 'loginSeeker'])->name('loginSeeker')->middleware('guest');

// Login user
Route::post('/users/recruiter/authenticate', [UserController::class, 'authenticate']);
// Login Seeker
Route::post('/users/seeker/authenticate', [SeekerController::class, 'authenticate']);

// show manage apply
Route::get('/apply/manage', [ApplyController::class, 'manage']);

// show apply to work form
Route::get('/apply/{listing}', [ApplyController::class, 'apply']);




// Admin routes
Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'loginAdmin']);

    Route::get('/register', [AdminController::class, 'registerAdmin']);

    Route::post('/store', [AdminController::class, 'store']);

    Route::post('/authenticate', [AdminController::class, 'authenticate']);

    Route::get('/dashboard', [AdminController::class, 'dashboardAdmin']);

    Route::get('/dashboard/recruiter', [AdminController::class, 'dashboardAdminRecruiter']);

    Route::get('/dashboard/seeker', [AdminController::class, 'dashboardAdminSeeker']);
});

Route::get('/seeker/dashboard', [SeekerController::class, 'dashboardSeeker']);

// Manage Application
Route::get('/seeker/manage', [SeekerController::class, 'manage']);

Route::get('/recruiter/dashboard', [UserController::class, 'dashboardRecruiter']);

// Manage Listings
Route::get('/recruiter/manage', [UserController::class, 'manage']);

// store work application
Route::post('/seeker/apply', [ApplyController::class, 'store']);

// delete application
Route::delete('/seeker/apply/{apply}', [ApplyController::class, 'destroy']);

// See details application
Route::get('/seeker/details/{apply}/{listing}', [SeekerController::class, 'details']);

// View Uploaded File
Route::get('viewpdf/{apply}', [ApplyController::class, 'viewpdf']);

// Manage Application
Route::get('/recruiter/application', [UserController::class, 'application']);

// See details application
Route::get('/recruiter/details/{apply}', [UserController::class, 'details']);

// approve or reject application
Route::put('/applys/{apply}/{listing}/approve', [ApplyController::class, 'approve']);
Route::put('/applys/{apply}/{listing}/reject', [ApplyController::class, 'reject']);
