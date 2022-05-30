<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use App\User;
use Hash;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function reset(Request $request){

        dd($request->all());
     
         $user = User::where('email', $request->input('email'))->first();

         if(empty($user)) {

            return redirect('/reset-password')->with('msg_error', 'Email does not exist in the record');
         }

         else{

             if($request->input('password') != $request->input('password_confirmation')){
                
                return redirect('/reset-password')->with('msg_error', 'Password does not correlate , please try again');
             }
             else{
                $user->update([
                    'password' => Hash::make($request->input('password'))
                ]);

                return redirect('/reset-password')->with('msg_success', 'Password reset successfully');
             }

         }

    }
}
