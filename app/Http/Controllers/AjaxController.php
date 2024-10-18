<?php

namespace App\Http\Controllers;

use App\Mail\ContactEmailNotification;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;

class AjaxController extends Controller
{
    public function store(Request $request)
    {
        try {
            $rules = [
                'name' => 'required|string|max:255',
                'phone' => [
                    'required',
                    'string',
                    'min:10',
                    'max:20',
                    function ($attribute, $value, $fail) {
                        if (!preg_match("/^(?:\+7|8)?[\s.-]?[\d]{10}$/", $value)) {
                            $fail('Неверный формат номера.');
                        }
                    },
                ],
                'email' => 'required|email|max:255',
            ];

            $validatedData = $request->validate($rules);

            $contact = Contact::create($validatedData);

            Mail::to('admin@mail.ru')->send(new ContactEmailNotification($contact));

            return response()->json(['success' => true]);
        } catch (\Illuminate\Validation\ValidationException $e) {
        
            return response()->json([
                'error' => $e->errors()['phone'][0], 
                'message' => 'Пожалуйста, введите корректный номер телефона в формате +71234567890 или 81234567890 без пробелов.'
            ], 422);
        }
    }
}

