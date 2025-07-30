<?php

namespace App\Http\Controllers;

use App\Models\Messages;
use App\Models\Collection;
use Illuminate\Http\Request;

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
}
