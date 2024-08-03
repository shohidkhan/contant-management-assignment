<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Exception;
use Illuminate\Http\Request;

class ContactController extends Controller {
    //

    function index(Request $request) {
        $contacts = Contact::query();
        if (!empty($request->search)) {
            $contacts->where("name", "like", "%" . $request->search . "%")->orWhere("email", "like", "%" . $request->search . "%");
        }

        if (!empty($request->sort)) {
            $contacts->orderBy($request->sort, $request->get('direction', 'asc'));
        } else {
            $contacts->orderBy('name', 'asc');
        }

        $contacts = $contacts->get();
        return view('contact.index', compact('contacts'));
    }

    function create() {
        return view('contact.create');
    }

    function store(Request $request) {
        try {
            $request->validate([
                "name" => 'required',
                "email" => 'required|unique:contacts,email',
            ]);

            Contact::create([
                "name" => $request->name,
                "email" => $request->email,
                "phone" => $request->phone,
                "address" => $request->address,
            ]);

            return redirect()->back()->with("success", "Contact created successfully");
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    function show($id) {
        $contact = Contact::find($id);
        return view('contact.show', compact('contact'));
    }

    function edit($id) {
        $contact = Contact::find($id);

        return view('contact.edit', compact('contact'));
    }

    function update(Request $request) {
        try {
            $contact = Contact::where("id", $request->id)->first();
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:contacts,email,' . $contact->id,
            ]);
            Contact::where("id", $request->id)->update([
                "name" => $request->name,
                "email" => $request->email,
                "phone" => $request->phone,
                "address" => $request->address,
            ]);
            return redirect()->back()->with("success", "Contact created successfully");
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    function destroy(Request $request) {
        Contact::where("id", $request->id)->delete();
        return redirect()->back()->with("success", "Contact Deleted successfully");
    }
}
