<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request) {

        $data = $request->validate([
            'name' => 'nullable|string|max:100',
            'email' => 'required|string|max:100|email',
            'message' => 'required|string'
        ]);

        $newContact = new Contact();

        $newContact->name = $data['name'];
        $newContact->email = $data['email'];
        $newContact->message = $data['message'];

        $newContact->save();

        return $newContact;
    }
}
