<?php

namespace App\Http\Controllers;
use App\Admin;
use Illuminate\Support\Facades\Hash;
use Session;


use Illuminate\Http\Request;

class AdminLoginController extends Controller
{
     public function showLoginForm()
    {
        return view('admin-frontend.admin-login');
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
         $user = Admin::where('email', '=', $email)->first();

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
                Session::put('id', $user->id);
                Session::put('file', $user->file);


              //  $user=Session::get('user');
                //echo $user->name; die ;
                //$filename=$request->file;


        return redirect('admin')->with('success','Login Successfully');

         }
     }
}
