<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;

class ContactMessageController extends Controller
{
    public function index()
    {
        $messages = Contact::latest()->paginate(15);

        return view('admin.messages.index', compact('messages'));
    }

    public function destroy(Contact $message)
    {
        $message->delete();

        return redirect()->route('admin.messages.index')->with('success', 'Message deleted.');
    }
}
