<?php

namespace App\Http\Controllers;

use App\Mail\Csms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailCotreoller extends Controller
{
    public function index()
    {
        $mailData = [
            'title' => 'Mail via CSMS',
            'body' => 'Votre code de confirmation sur CSMS',
        ];

        Mail::to('maherymilanto@gmail.com')->send();
    }
}
