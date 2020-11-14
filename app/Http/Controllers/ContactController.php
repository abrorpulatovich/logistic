<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class ContactController extends Controller
{
    public function contact()
    {
        return view('front.site.contact');
    }

    public function send_message(Request $request)
    {
        $data = $this->validate($request, [
            'name'    => 'required',
            'email'   => 'required',
            'phone'   => 'required',
            'message' => 'required'
        ]);
        Contact::create($data);
        return redirect()->route('contact')->with('message_sent_successfully', __('messages.Message sended successfully') . '. ' . __('messages.Thank you for your attention. We will contact with you soon'));
    }
}
