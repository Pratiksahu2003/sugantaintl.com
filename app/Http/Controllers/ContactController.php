<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use App\Mail\ContactQueryMail;

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
            Log::info('Contact Form Submission', $contactData);

            // Try to send email using template
            try {
                $emailData = [
                    'name' => $request->name,
                    'email' => $request->email,
                    'subject' => $request->subject,
                    'message' => $request->message,
                    'timestamp' => now()->format('M d, Y \a\t h:i A'),
                    'source' => 'contact form'
                ];

                Mail::to(config('mail.from.address'))
                    ->send(new ContactQueryMail($emailData));
                    
                Log::info('Contact form email sent successfully');
            } catch (\Exception $mailException) {
                // If email fails, just log it but don't fail the form submission
                Log::warning('Email sending failed, but contact form was logged: ' . $mailException->getMessage());
            }

            return redirect()->back()->with('success', 'Thank you for your message! We will get back to you within 24 hours.');
        } catch (\Exception $e) {
            // Log the error for debugging
            Log::error('Contact form processing failed: ' . $e->getMessage());
            
            return redirect()->back()
                ->with('error', 'Sorry, there was an error processing your message. Please try again or contact us directly.')
                ->withInput();
        }
    }

    public function storeModal(Request $request)
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
                ->withInput()
                ->with('modal_error', 'Please fill in all required fields correctly.');
        }

        try {
            // Log the modal contact form submission
            $contactData = [
                'name' => $request->name,
                'email' => $request->email,
                'subject' => $request->subject,
                'message' => $request->message,
                'source' => 'modal',
                'timestamp' => now()->format('Y-m-d H:i:s')
            ];

            Log::info('Modal Contact Form Submission', $contactData);

            // Try to send email using template
            try {
                $emailData = [
                    'name' => $request->name,
                    'email' => $request->email,
                    'subject' => $request->subject,
                    'message' => $request->message,
                    'timestamp' => now()->format('M d, Y \a\t h:i A'),
                    'source' => 'modal query form'
                ];

                Mail::to(config('mail.from.address'))
                    ->send(new ContactQueryMail($emailData));
                    
                Log::info('Modal contact form email sent successfully');
            } catch (\Exception $mailException) {
                // If email fails, just log it but don't fail the form submission
                Log::warning('Modal email sending failed, but contact form was logged: ' . $mailException->getMessage());
            }

            return redirect()->back()->with('modal_success', 'Thank you for your quick query! We will get back to you within 24 hours.');
        } catch (\Exception $e) {
            // Log the error for debugging
            Log::error('Modal contact form processing failed: ' . $e->getMessage());
            
            return redirect()->back()
                ->with('modal_error', 'Sorry, there was an error processing your query. Please try again or contact us directly.')
                ->withInput();
        }
    }

}