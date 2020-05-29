<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Mail\FeedbackMail;

use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
   
    public function index()
    {
        $contact = Contact::first();
        $info = collect();
        $info->push([
            'adres' => $contact->address,
            'emailadres' => $contact->showEmail,
            'telefoon' => $contact->phonenumber,
            'fax' => $contact->faxnumber
        ]);
        return view('pages.contact',[
            'contact' => $info->first()
        ]);
    }

    public function send(){
        request()->validate([
            'feedback' => ['required'],
            'naam' => ['required']
        ]);

        $data = [
            'naam' => request('naam'),
            'feedback' => request('feedback')
        ];

        Mail::to('pim.pallada@gmail.com')->send(new \App\Mail\FeedbackMail($data));
        return back()->with('success', 'Dank voor uw feedback');
    }

}
