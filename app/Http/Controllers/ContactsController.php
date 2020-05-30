<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Contacts;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function index()
    {
        return view('contacts.index', [
            'contacts' => Contact::all()
        ]);
    }

    public function favourite()
    {
        return view('contacts.favourite');
    }

    public function add()
    {
        request()->validate([
            'contact_id' => 'required',
        ]);

        if (auth()->user()->contacts->contains(request('contact_id'))) {
            return redirect()->route('contacts.index')->with('exists', 'У вас уже есть данный контакт.');
        }

        auth()->user()->contacts()->attach(request('contact_id'));

        return redirect()->route('contacts.index')->with('added', 'Контакт успешно добавлен в список избранных.');
    }

    public function delete(Contact $contact)
    {
        auth()->user()->contacts()->detach($contact);

        return redirect()->route('contacts.favourite')->with('deleted', 'Контакт успешно удален из списка избранных.');
    }
}
