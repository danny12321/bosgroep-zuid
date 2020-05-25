<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show()
    {
        return view('pages.cms.contact.index');
    }

    public function feedback()
    {
        $contact = Contact::first();
        $body = file_get_contents(dirname(__DIR__).'\..\..\..\resources\views\dynamic_email_template.blade.php');
        return view('pages.cms.contact.feedback', [
            'email' => $contact->feedbackEmail,
            'body' => $body
        ]);
    }

    public function feedbackUpdate()
    {
        request()->validate(['Emailadres' => ['required']]);
        request()->validate(['Body' => ['required']]);
        file_put_contents(dirname(__DIR__).'\..\..\..\resources\views\dynamic_email_template.blade.php', request('Body'));
        $contact = Contact::first();
        $contact->feedbackEmail = request('Emailadres');
        $contact->save();
        return redirect()->route('cms_contact_show');
        
    }

    public function contact()
    {
        $contact = Contact::first();
        $info = collect();
        $info->push([
            'adres' => $contact->address,
            'emailadres' => $contact->showEmail,
            'telefoon' => $contact->phonenumber,
            'fax' => $contact->faxnumber
        ]);
        return view('pages.cms.contact.contact', [
            'contact' => $info->first()
        ]);
    }

    public function contactUpdate()
    {
        request()->validate(['Adres' => ['required']]);
        request()->validate(['Emailadres' => ['required']]);
        request()->validate(['Telefoon' => ['required']]);
        request()->validate(['Fax' => ['required']]);
        $contact = Contact::first();
        $contact->address = request('Adres');
        $contact->showEmail = request('Emailadres');
        $contact->phonenumber = request('Telefoon');
        $contact->faxnumber = request('Fax');
        $contact->save();
        return redirect()->route('cms_contact_show');
    }
    
    
}
    