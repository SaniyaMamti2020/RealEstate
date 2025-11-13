<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Auth;
use Str;
use DB;
use Mail;



class UserLoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    } 

    public function userLogin(Request $request)
    {
        if(isset($request->username) && trim($request->username)!="")
        {
            $user = User::where('username',$request->username)->orWhere('email',$request->username)->first();

            if(isset($user) && !empty($user))
            {
                if($user->status == 1)
                {   
                    if(Hash::check($request->password, $user->password))
                    {
                        if($user->username == $request->username)
                        {
                            Auth::attempt(['username'=>$user->username,'password'=>$request->password]);
                                return redirect()->route('dashboard');
                        }
                        
                        if($user->email == $request->username)
                        {
                            Auth::attempt(['email'=>$user->email,'password'=>$request->password]);
                                return redirect()->route('dashboard');
                        }
                    }
                    else
                    {
                        return redirect()->route('login')->withErrors(['password'=> config('constants.error.04')]);
                    }
                }
                else
                {
                    return redirect()->route('login')->withErrors(['username'=> 'You are deactive please contact to admin']);
                }
            }
            else
            {
                return redirect()->route('login')->withErrors(['password'=> config('constants.error.22')]);
            }
        }
        else
        {
            return redirect()->route('login')->withErrors(['password'=> config('constants.error.23')]);
        }
    }

    protected function reset_pws(Request $request)
    {
        if(isset($request->username) && trim($request->username))
        {
            /*
                This select query to match credentials and get data by array
            */
            $udata=User::where(['email'=>$request->username])->get()->toArray();
            if(isset($udata) && !empty($udata))
            {
                $token = Str::random(60);
                /*
                    This table insert token, email and created_at to password_resets table 
                */
                DB::table('password_resets')->insert(
                    ['email' => $request->username, 'token' => $token, 'created_at' => now()]
                );
                try {
                    Mail::send('emails.reset_password',['token' => $token,'udata' => $udata], function($message) use ($request,$udata) {
                      $message->from(env('MAIL_FROM_ADDRESS'),env('MAIL_FROM_NAME'));
                      $message->to($request->username);
                      $message->subject('Reset Password Notification');
                   });
                } catch (\Swift_TransportException $STe) {
                    return redirect('/login')->with(['erro_data'=> config('constants.error.24')]);
                }
                return redirect('/login')->with(['regi_success'=> config('constants.error.25')]);
            }
            else
            {
                return redirect('/login')->with(['erro_data'=> config('constants.error.03')]);
            }
        }
        else
        {
            return redirect()->route('login')->withErrors(['password'=> config('constants.error.01')]);
        }
    }
    public function resetPasswordGet($token=0)
    {
        if(isset($token) && $token!==0)
        {
            return view('auth.forgotpassword-link',compact('token'));
        }
        else
        {
        
            return redirect()->route('login')->with(['erro_data'=> config('constants.error.03')]);
        }
    }
    protected function resetPasswordPost(Request $request)
    {
        $request->validate([

          'email' => 'required|required',

          'password' => 'required|confirmed',

          'password_confirmation' => 'required'

        ]);
        $user = User::where('email', $request->email)->first();
        if(isset($user) && empty($user))
        {
            return redirect()->route('login')->with(['erro_data'=> config('constants.error.03')]);
        }

        $updatePassword = DB::table('password_resets')->where(['email' => $request->email,'token' => $request->token])->first();
        if(!$updatePassword){
          return back()->withInput()->with('erro_data', 'Invalid token!');
        }
        $user = User::where('email', $request->email)->update(['password' => Hash::make($request->password)]);
        DB::table('password_resets')->where(['email'=> $request->email])->delete();
        return redirect('/login')->with(['regi_success'=> 'Your password has been changed!']);
    }
}
