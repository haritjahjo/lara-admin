<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function show()
    {
        return view('contact.show');
    }

    public function submit(ContactRequest $request)
    {
        Mail::to('my@mail.com')->send(new ContactMail($request->first_name, $request->last_name, $request->email, $request->message));

        return to_route('welcome');
    }
}
