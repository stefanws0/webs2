<?php

namespace App\Http\Controllers;

use App\Mail\ContactConfirmation;
use Illuminate\Http\Request;
use App\Notifications\ContactNotification;
use App\Models\User;
use Mail;
use Notification;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|max:50',
            'email' => 'required|email|max:255',
            'phone' => 'required|regex:/(06)[0-9]{8}/',
            'message' => 'required|max:255',
            'subject' => 'required|max:50'
        ]);


        $data = [
            'name' => request('name'),
            'email' => request('email'),
            'phone' => request('phone'),
            'message' => request('message'),
            'subject' => request('subject')
        ];


        //$receiver = User::where('email', 'stefankessel@hotmail.com')->first();
        //Notification::send($receiver, new ContactNotification($data));
        $request->session()->flash('contact-confirmation', 'Bedankt voor uw interesse, uw contactaanvraag is ontvangen!');
        return redirect()->route('contact.index');
    }
}