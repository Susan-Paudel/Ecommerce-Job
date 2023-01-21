<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Validator;

class RegisterController extends Controller
{
    public function Register(Request $request){
        $validator = Validator::make($request->all(),[
            'email'=>' required | email | max:255 | unique:users',
            'phonenumber'=>'required | string | min:10 | max:10 | regex:/(\+977)?[9][6-9]\d{8}/',
            'password'=>'required | confirmed | min:8',
        ]);
        if(!$validator->passes()){
            return response()->json(['status'=>0,'error'=>$validator->errors()->all()]);
        }
        $user= User::create([
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'phonenumber'=>$request->phonenumber,
        ]);
        if($user){
            return response()->json(['status'=>1,'message'=>"Data insert Successfull"]);
        }else{
            $error="something went wrong!";
            return response()->json(['status'=>0,'error'=>$error]);
        }     
    }
}
