<?php


namespace App\Http\Controllers\Auth;


use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\Controller;
use Illuminate\Support\MessageBag;

class LoginController extends Controller
{

   // public function register(Request $request){
        //Validate 

    //    $user = new User();
        
    //    $user->identity_doc = $request->identity_doc; 
    //    $user->name = $request->name; 
     //   $user->first_lastname = $request->first_lastname;
    //    $user->second_lastname = $request->second_lastname;
     //   $user->email_address = $request->email_address;
     //   $user->rol_id = $request->rol_id;
     //   $user->user_phone_number = $request->user_phone_number;
     //   $user->password = Hash::make ($request->password);

     //   $user->save();

      //  Auth::login($user);

      //  return redirect(route('index'));
  //  }


    public function login(Request $resquest){

        $credentials = [
            "email_address" => $resquest->email_address,
            "password" => $resquest->password,
        ];

        $remember = ($resquest->has('remember') ? true : false);

        if(Auth::attempt($credentials, $remember)){
            $resquest->session()->regenerate();

            return redirect()->intended(route('index'));


        }else{
            throw ValidationException::withMessages([
                'email_address' => __('auth.failed'),
            ]);
            // return redirect('login')->withErrors('auth.failed')
            // ->withInput();
        }

    }


    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->flush();
        $request->session()->regenerateToken();

        return redirect(route('login'));


    }

    


}