<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Mail\ContactReplyMail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $validated = $request->validate([
            'fname' => 'required|string|max:255',
            'lname' => 'nullable|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);

        $data = $validated;
        $fname = $validated['fname'];
        $lname = $validated['lname'] ?? '';
        $data['name'] = trim($fname . ' ' . $lname);
        $data['subject'] = $validated['subject'] ?? 'No Subject';
        unset($data['fname'], $data['lname']);

        Message::create($data);

        return back()->with('success', 'Your message has been sent successfully!');
    }

    public function reply(Request $request)
    {
        $request->validate([
            'id' => 'nullable|integer',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        if ($request->id) {
            $msg = Message::find($request->id);
            if ($msg) {
                $msg->update(['is_read' => true]);
            }
        }

        if ($request->message !== '[Replied via Mail App]') {
            Mail::to($request->email)->send(new ContactReplyMail($request->message));
        }

        return response()->json(['success' => true, 'message' => 'Status updated successfully!']);
    }
}
