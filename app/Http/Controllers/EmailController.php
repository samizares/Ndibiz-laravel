<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class EmailController extends Controller
{
    public function sendTest()
    {   
        $data=[];
        $data['username']="sammy3";
        $confirmation_code = str_random(6);

        \Mail::send('emails.activate',['confirmation_code'=> $confirmation_code,'data' =>$data], function ($message)
        {
            $message->from('samizares@beazea.com', 'Testing Emails')
                    ->subject('From sammy with Love')
                    ->to('samizares@gmail.com');

        });
        return 'Message sent successfully';

       // return response()->json(['message' => 'Request completed'])        
    }
}
