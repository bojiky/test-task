<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Validator;

class ContactEmail extends Controller
{
    public function index()
    {
        return view('contact.email');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|string|email|max:255|unique:contacts,email',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $contact = new Contact();
        $contact->name = $request->input('name');
        $contact->phone = $request->input('phone');
        $contact->email = $request->input('email');

        if ($contact->save()) {
            return redirect()->route('contact.success')->with('success', 'Контакт успешно отправлен.');
        } else {
            return redirect()->back()->withErrors(['error' => 'Не удалось сохранить контакт. Попробуйте еще раз.']);
        }
    }

    public function success()
    {
        return view('contact.success');
    }
}