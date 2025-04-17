<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'number' => 'nullable|string|max:20',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);

        Mail::to('eldeene103@gmail.com')->send(new ContactFormMail($data));

        return response()->json(['message' => 'Message sent successfully!'], 200);
    }
}
