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
})->name('landing')->middleware('guest');

Route::group(['middleware' => ['user']], function () {
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

    Route::get('/recruiter/dashboard', [UserController::class, 'dashboardRecruiter']);

    // Manage Listings
    Route::get('/recruiter/manage', [UserController::class, 'manage']);

    // Manage Application
    Route::get('/recruiter/application', [UserController::class, 'application'])->middleware('user');

    // See details application
    Route::get('/recruiter/details/{apply}', [UserController::class, 'details'])->middleware('user');

    // approve or reject application
    Route::put('/applys/{apply}/{listing}/approve', [ApplyController::class, 'approve']);
    Route::put('/applys/{apply}/{listing}/reject', [ApplyController::class, 'reject']);
});

Route::group(['middleware' => ['seeker']], function () {
    // show manage apply
    Route::get('/apply/manage', [ApplyController::class, 'manage']);

    // show apply to work form
    Route::get('/apply/{listing}', [ApplyController::class, 'apply']);

    // dashboard pencari kerja
    Route::get('/seeker/dashboard', [SeekerController::class, 'dashboardSeeker']);

    // Manage Application
    Route::get('/seeker/manage', [SeekerController::class, 'manage']);

    // store work application
    Route::post('/seeker/apply', [ApplyController::class, 'store']);

    // delete application
    Route::delete('/seeker/apply/{apply}', [ApplyController::class, 'destroy']);

    // See details application
    Route::get('/seeker/details/{apply}/{listing}', [SeekerController::class, 'details']);
});

Route::group(['middleware' => ['guest']], function () {
    // show register option
    Route::get('/register/option', [UserController::class, 'registerOption']);

    // Show User Registration/create form
    Route::get('/register/recruiter', [UserController::class, 'createRecruiter']);

    // Show User Registration/create form
    Route::get('/register/seeker', [UserController::class, 'createSeeker']);

    // show login option
    Route::get('/login/option', [UserController::class, 'loginOption']);

    // Show Login Form in recruiter or seeker
    Route::get('/login/recruiter', [UserController::class, 'loginRecruiter'])->name('loginRecruiter');
    Route::get('/login/seeker', [UserController::class, 'loginSeeker'])->name('loginSeeker');
});


// Single Listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);

// Create a new user
Route::post('/users', [UserController::class, 'store']);

// Create a new seeker
Route::post('/seekers', [SeekerController::class, 'store']);

// User Logout
Route::post('/logout', [UserController::class, 'logout']);

// Login user
Route::post('/users/recruiter/authenticate', [UserController::class, 'authenticate']);
// Login Seeker
Route::post('/users/seeker/authenticate', [SeekerController::class, 'authenticate']);



// Admin routes
Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'loginAdmin']);
    Route::post('/authenticate', [AdminController::class, 'authenticate']);

    Route::group(['middleware' => ['admin']], function () {

        Route::get('/dashboard', [AdminController::class, 'dashboardAdmin']);
        Route::get('/dashboard/recruiter', [AdminController::class, 'dashboardAdminRecruiter']);

        Route::get('/dashboard/seeker', [AdminController::class, 'dashboardAdminSeeker']);

        Route::delete('/dashboard/{listing}', [AdminController::class, 'deleteListing']);

        Route::delete('/seeker/{seeker}', [AdminController::class, 'deleteSeeker']);

        Route::delete('/recruiter/{user}', [AdminController::class, 'deleteRecruiter']);
    });
});

// View Uploaded File
Route::get('viewpdf/{apply}', [ApplyController::class, 'viewpdf']);
