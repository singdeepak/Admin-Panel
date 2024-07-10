<?php

namespace App\Http\Controllers;

use App\Mail\UserEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function sendEmail(){
        $toEmail = "anything";
        $message = "Hello, welcome to mumbai";
        $subject = "welcome to yahoo baba";
        Mail::to($toEmail)->send(new UserEmail($message, $subject));
    }
}
