<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    // Affiche tous les contacts
    public function index()
    {
        $contacts = Contact::all();
        return view('contact.index', compact('contacts'));
    }

    // Affiche le formulaire de création
    public function create()
    {
        return view('contact.create');
    }

    // Enregistre un nouveau contact
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:contacts,email',
        ]);

        Contact::create($data);

        return redirect()->route('contact.index')->with('success', 'Contact créé avec succès !');
    }

    // Affiche un contact (optionnel)
    public function show(Contact $contact)
    {
        return view('contact.show', compact('contact'));
    }

    // Affiche le formulaire de modification
    public function edit(Contact $contact)
    {
        return view('contact.edit', compact('contact'));
    }

    // Met à jour un contact existant
    public function update(Request $request, Contact $contact)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:contacts,email,' . $contact->id,
        ]);

        $contact->update($data);

        return redirect()->route('contact.index')->with('success', 'Contact mis à jour avec succès !');
    }

    // Supprime un contact
    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()->route('contact.index')->with('success', 'Contact supprimé avec succès !');
    }
}
