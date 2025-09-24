<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|min:10'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            // For now, we'll log the contact form submission
            // In production, you would configure proper SMTP settings
            $contactData = [
                'name' => $request->name,
                'email' => $request->email,
                'subject' => $request->subject,
                'message' => $request->message,
                'timestamp' => now()->format('Y-m-d H:i:s')
            ];

            // Log the contact form submission
            \Log::info('Contact Form Submission', $contactData);

            // Try to send email (will work if SMTP is configured)
            try {
                Mail::raw($this->formatEmailContent($request), function ($message) use ($request) {
                    $message->to('suganta1@gmail.com')
                        ->subject('New Contact Form Submission - ' . $request->subject)
                        ->from($request->email, $request->name)
                        ->replyTo($request->email, $request->name);
                });
            } catch (\Exception $mailException) {
                // If email fails, just log it but don't fail the form submission
                \Log::warning('Email sending failed, but contact form was logged: ' . $mailException->getMessage());
            }

            return redirect()->back()->with('success', 'Thank you for your message! We will get back to you within 24 hours.');
        } catch (\Exception $e) {
            // Log the error for debugging
            \Log::error('Contact form processing failed: ' . $e->getMessage());
            
            return redirect()->back()
                ->with('error', 'Sorry, there was an error processing your message. Please try again or contact us directly.')
                ->withInput();
        }
    }

    private function formatEmailContent($request)
    {
        return "
New Contact Form Submission from SuGanta Internationals Website

Name: {$request->name}
Email: {$request->email}
Service Type: {$request->subject}

Message:
{$request->message}

---
This message was sent from the contact form on sugantaintl.com.test
        ";
    }
}