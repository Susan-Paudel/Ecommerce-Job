<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Session;
use Hash;
use App\Models\User;

class LoginController extends Controller
{
    public function login(Request $request){
        $validator=Validator::make($request->all(),[
         'email'=>'required | email',
         'password'=>'required'
        ]);
        if(!$validator->passes()){
            return response()->json(['status'=>0,'error'=>$validator->errors()->all()]);
        }
        $userdata= User::where('email', '=', $request->email)->first();
        if($userdata){
            $userpassword=Hash::check($userdata->password, $request->password);
        }
        if(!$userdata){
            return response()->json(['status'=>405,'error'=>'Email is Invalid!!']);
        }else if($userpassword){
            return response()->json(['status'=>405,'error'=>'Password is Wrong!!']);
        }
       
        Auth::attempt(['email'=>$request->email,'password'=>$request->password]);
        return response()->json(['status'=>1]);
       
    }
    public function logout() {
        Session::flush();
        Auth::logout();
        return redirect()->route('home');
    }
}
