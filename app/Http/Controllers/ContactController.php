<?php
namespace App\Http\Controllers;

use App\Mail\ContactMessageMail;
use App\Models\ContactMessage;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name'    => 'required|string|max:255',
                'email'   => 'required|email|max:255',
                'subject' => 'nullable|string|max:255',
                'message' => 'required|string|max:1000',
            ]);

            $contactMessage = ContactMessage::create([
                'name'    => $request->name,
                'email'   => $request->email,
                'subject' => $request->subject,
                'message' => $request->message,
                'status'  => 'unread',
            ]);

            // Send email notification to profile email
            $profile      = Profile::first();
            $forwardEmail = $profile && $profile->email
                ? $profile->email
                : env('FORWARD_EMAIL_TO', 'abdur.shobur.me@gmail.com');
            Mail::to($forwardEmail)->send(new ContactMessageMail($contactMessage));

            return response()->json([
                'success' => true,
                'message' => 'Thank you for your message. We will get back to you soon!',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, there was an error sending your message. Please try again.',
                'error'   => $e->getMessage(),
            ], 500);
        }
    }
}
