<?php

namespace App\Http\Controllers;

use App\Models\Messages;
use App\Models\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\MessagesReplyMail;

class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $messages = Messages::orderBy('created_at', 'desc')->get();
        return view('backend.messages.list_messages', compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $valided_data = $request->validate([
            'names' => 'required|string',
            'email' => 'required|string|lowercase|email:rfc,dns|max:255',
            'message' => 'required|string',
        ]);

        $messages = new Messages;
        $messages->names = $valided_data['names'];
        $messages->email = $valided_data['email'];
        $messages->message = $valided_data['message'];

        $messages->save();

        return back()->with('success', [
            'message' => 'Message Sent Successfully',
            'duration' => $this->alert_message_duration,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Messages $messages)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Messages $messages)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Messages $messages)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Messages $messages)
    {
        //
    }


    public function GetQuotation()
    {
        $collections = Collection::all();
        return view('get_quotation', compact('collections'));
    }

    public function Quotation()
    {
        $collections = Collection::all();
        return view('backend.quotation.add_quotation', compact('collections'));
    }


    // Return the view to rely email
    public function Showreply($id)
    {
        $message = Messages::findOrFail($id);
        return view('backend.emails.inquiry_reply', [
            'message'       => $message,
            'clientName'    => $message->names,
            'clientEmail'   => $message->email,
            'clientMessage' => $message->message,
            'inquiryReply'  => old('reply_message', ''),
        ]);
    }


    // Responsible for sent the mail back to the client
    public function EmailReply( Request $request, Messages $messages)
    {
        $validated_data  = $request->validate([
            'reply_message' => 'required|string',
        ]);

        Mail::send('emails.reply', [
            'clientMessage' => $message->message,
            'clientName' => $message->names,
            'reply_message' => $request->reply_message,
        ], 

        function ($mail) use ($message) {
            $mail->to($message->email)
                ->subject('Reply from '.config('app.name'));
        });

        return redirect()->route('message.index')->with('success', [
            'message' => 'Email Sent Successfully',
            'duration' => $this->alert_message_duration,
        ]);
    }
}
