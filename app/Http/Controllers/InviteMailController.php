<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class InviteMailController extends Controller
{
    public function inviteMail(Request $request) {

        $user = User::where('id',$request->id)->first();
        // dd($user);

        $data = [
            'title' => '',
            'body' =>' http://127.0.0.1:8000',
            // 'UserName' => $user->name, 
        ];

        Mail::to($user)->send(new SendMail($data));

        return redirect('/users');
    }
}
