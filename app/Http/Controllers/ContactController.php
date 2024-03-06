<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Contact;

class ContactController extends Controller
{
    // Contact Dashboard Class

    public function contact_us_emails()
    {
        return view('layouts.dashboard.contact_us_emails.contact_us_email', [
            'contacts' => Contact::all(),
        ]);
    }

    // Contacts Emails Show

    public function emails(Contact $contact, $id)
    {
        $con = $contact->find($id);

        return view('layouts.dashboard.contact_us_emails.contact_emails', [
            'contact' => $con,
        ]);
    }

    // Contacts Emails Show

    public function contact_delete($id)
    {
        Contact::find($id)->delete();

        return back()->with('delete_contact', 'Successfully Delete Email');
    }

    // Contacts Emails Show

    public function trash_emails()
    {
        return view('layouts.dashboard.trash.emails_trash_index', [
            'contacts' => Contact::onlyTrashed()->get(),
        ]);
    }

    // Contacts Emails Show

    public function restore_emails(string $id)
    {
        Contact::withTrashed()->find($id)->restore();
        Contact::withTrashed()->find($id)->update([
            'deleted_at' => null,
        ]);

        return redirect('contact/emails/trash');
    }

    // Email Trash Route Permanent Delete
    public function delete_emails(string $id)
    {
        Contact::withTrashed()->find($id)->forceDelete();

        return redirect('contact/emails/trash');
    }

    // Email Trash Route  Show
    public function trash_email_details(string $id)
    {
        $contact = Contact::withTrashed()->find($id);

        return view('layouts.dashboard.trash.trash_email_details', compact('contact'));
    }

    // Category Trash Route Empty Trash
    public function deleteAll_emails()
    {
        Contact::onlyTrashed()->forceDelete();

        return redirect('contact/emails');
    }

    // Category Trash Route Empty Trash
    public function restoreAll_emails()
    {
        Contact::onlyTrashed()->restore();

        return redirect('contact/emails');
    }
}
