<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ResetPassword;
use Illuminate\Support\Facades\Mail;

class SendEmailController extends Controller
{
    function index()
    {
     return view('email');
    }
    function send(Request $request)
    {
     $this->validate($request, [
      'email_address'  =>  'required|email',
     ]);

        $data = array(
            'email_address'   =>   $request->email_address
        );

     Mail::to('fiocc30@gmail.com')->send(new ResetPassword($data));
     return back()->with('success', 'El correo se ha enviado correctamente!');
    }
}
?>