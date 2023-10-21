<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
        
    // Contact Dashboard Class

    public function contact_us_emails(){
        return view('layouts.dashboard.contact_us_emails.contact_us_email', [
            'contacts'=>Contact::all()
        ]);
    }
    

    // Contacts Emails Show

    public function emails(Contact $contact){
        return view('layouts.dashboard.contact_us_emails.contact_emails', compact('contact'));
    }

     // Contacts Emails Show

    public function contact_delete(Contact $contact){
        Contact::findOrFail($contact->id)->delete();
        return back();
    }

}
