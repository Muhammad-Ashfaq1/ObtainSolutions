<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactMessageRequest;
use App\Models\ContactMessage;

class ContactController extends Controller
{
    public function store(StoreContactMessageRequest $request)
    {
        if ($request->filled('website')) {
            return response()->json([
                'success' => true,
                'message' => 'Thank you for your message! We will get back to you soon.',
            ], 201);
        }

        ContactMessage::create($request->safe()->only([
            'name',
            'email',
            'phone',
            'subject',
            'message',
        ]));

        return response()->json([
            'success' => true,
            'message' => 'Thank you for your message! We will get back to you soon.',
        ], 201);
    }
}
