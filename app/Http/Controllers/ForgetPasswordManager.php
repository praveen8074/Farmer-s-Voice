<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Pest\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ForgetPasswordManager extends Controller
{
    function forgetPassword(){
        return view ("forget-password");
    }
    function forgetPasswordPost(Request $request){
        $request->validate([
            'email'=>"required|email|exists:users",
        ]);
        $token=Str::random(64);
        DB::table('password_reset_tokens')->insert([
            'email'=>$request->email,
            'token'=>$token,
            'created_at'=>Carbon::now()

        ]);
        Mail::send("emails.forget-password", ['token' => $token, 'email'=> $request->email], function($message) use ($request){
            $message->to($request->email)->subject('Reset Password');
        });
        return redirect()->route('forget.password')->with('success','Link successfully sent to your mail!');   
    }
    function resetPassword($token){
        $email=request("email");
        return view ("new-password", compact('token', 'email'));

    }
    function resetPasswordPost(Request $request){
        $request->validate([
            'email'=>"required|email|exists:users",
            "password"=> [
                'required',
                'string',
                'min:8',
                'regex:/[A-Z]/',     
                'regex:/[a-z]/',     
                'regex:/[0-9]/',      
                'regex:/[@$!%*#?&]/', 
            ],
            'password_confirmation'=>"required"

        ]);
        $updatePassword=DB::table('password_reset_tokens')->where([
            "email"=>$request->email,
            "token"=>$request->token,
        ])->first();

        if (!$updatePassword){
            return back()->with("error","invalid token");
         }

        User::where("email",$request-> email)->update(["password"=>Hash::make($request->password)]);
        DB::table("password_reset_tokens")->where(["email"=>$request->email])->delete();
        return redirect()->route("login")->with("success","password reset success");

    }
}
