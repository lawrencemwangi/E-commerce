<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StatusController extends Controller
{
    public function StatusPage(Request $request)
    {
        $email = session('email');
        return view('status', compact('email'));
    }
}
