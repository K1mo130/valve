<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class ContactController extends Controller {
    public function contact() {
        return view('contact.contact-us');
    }

    public function sendEmail(Request $request) {
        $details = [
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ];

        Mail::to('mhd.altir@student.ehb.be')->send(new ContactMail($details));
        return back()->with('message_send','uw bericht is succesvol verzonden');
    }
}
