<?php

namespace App\Http\Controllers;

use App\Models\Apply;
use App\Models\Listing;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Symfony\Component\HttpFoundation\File\File;

class ApplyController extends Controller
{
    // Show apply to work form
    public function apply(Listing $listing)
    {
        return view('apply.apply', [
            'listing' => $listing
        ]);
    }

    // store application
    public function store(Request $request)
    {
        $formFields = $request->validate([
            "subjek" => "required",
            "uraian" => "required",
            "file" => "mimes:pdf"
        ]);
        $formFields['file'] = $request->file('file')->store('files', 'public');
        $formFields['seeker_id'] = Auth::guard('seeker')->user()->id;
        $formFields['listing_id'] = $request->input('listing_id');
        $formFields['tgl'] = date('Y-m-d H:i:s');
        $formFields['status'] = 'menunggu';

        Apply::create($formFields);

        return redirect('/seeker/dashboard')->with('message', 'Lamaran berhasil dikirim!');
    }

    // Delete Listing
    public function destroy(Apply $apply)
    {
        // make sure logged in user is owner
        if ($apply->seeker_id != Auth::guard('seeker')->id()) {
            abort(403, 'Unauthorized Action');
        }
        $apply->delete();

        return redirect('/seeker/manage')->with('message', 'Lamaran berhasil dihapus');
    }

    public function viewpdf(Apply $apply)
    {
        $path = storage_path('app/public/files/' . explode('/', $apply->file)[1]);

        return Response::make(file_get_contents($path), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . explode('/', $apply->file)[1] . '"'
        ]);
    }

    public function approve(Apply $apply, Listing $listing)
    {
        // make sure logged in user is owner
        if ($listing->user_id != Auth::guard('user')->id()) {
            abort(403, 'Unauthorized Action');
        }
        $apply->update(['status' => "diterima"]);


        return redirect('/recruiter/manage')->with('message', 'Anda telah menyetujui lamaran');
    }

    public function reject(Apply $apply, Listing $listing)
    {
        // make sure logged in user is owner
        if ($listing->user_id != Auth::guard('user')->id()) {
            abort(403, 'Unauthorized Action');
        }
        $apply->update(['status' => "ditolak"]);


        return redirect('/recruiter/manage')->with('message', 'Anda telah menolak lamaran');
    }
}
