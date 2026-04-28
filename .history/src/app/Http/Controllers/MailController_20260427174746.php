<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\welcomemail;

class MailController extends Controller
{
    public function send()
    {
        $welcomemail = new welcomemail();

        Mail::send( $welcomemail );

        return view('auth.email');
    }
}
