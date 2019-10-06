<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return response()->json([
            "contacts" => Contact::all()
        ], 200);
    }

    public function show(Contact $contact)
    {
        return response()->json([
            "contact" => $contact
        ], 200);
    }

    public function store(Request $request)
    {
        $contact = Contact::create($request->only(["name", "email", "phone"]));

        return response()->json([
            "contact" => $contact
        ], 200);
    }
}
