<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
        
    // Contact Dashboard Class

    public function contact_us_emails(){
        return view('layouts.dashboard.contact_us_emails.contact_us_email', [
            'contacts'=>Contact::all()
        ]);
    }
    

    // Contacts Emails Show

    public function emails(Contact $contact, $id){
        $con = $contact->find($id);
        return view('layouts.dashboard.contact_us_emails.contact_emails', [
            'contact'=> $con,
        ]);
    }

     // Contacts Emails Show

    public function contact_delete($id){
        Contact::find($id)->delete();
        return back()->with('delete_contact', "Successfully Delete Email");
    }

}
