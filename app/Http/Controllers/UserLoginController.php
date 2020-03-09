<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Session;
use Illuminate\Support\Facades\Hash;


class UserLoginController extends Controller
{
         public function showLoginForm()
    {
        return view('user-frontend.user-login');
    }


    public function login(Request $request)
    {
        //$this->validateLogin($request);

        $request->validate([
            'email'=> 'required',
            'password'=>['required' , 'min:3' , 'max:15']  
        ]);


         $email = $request->input('email');
         $password = $request->input('password');


            // its work also when remove '=' sign , and also use firstorfail()
         $user = User::where('email', '=', $email)->first();

         if (!$user) {
            return response()->json(['success'=>false, 'message' => 'Login Fail, please check email id']);
         }
         if (!Hash::check($password, $user->password)) {
            return response()->json(['success'=>false, 'message' => 'Login Fail, pls check password']);
         }
         // return response()->json(['success'=>true,'message'=>'success', 'data' => $user]);
         else{
             Session::put('email',$request->email);   //Update

                Session::put('name', $user->name);
              //  $user=Session::get('user');
                //echo $user->name; die ;


        return redirect('user')->with('success','Login Successfully');

         }
     }
}
