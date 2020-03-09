<?php

namespace App\Http\Controllers;
use App\Admin;
use Illuminate\Support\Facades\Hash;


use Illuminate\Http\Request;

class AdminRegisterController extends Controller
{
	 public function showRegisterForm()
    {
        return view('admin-frontend.admin-register');
    }
    

    protected function create(Request $request)
    {
       /* return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);*/

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email'=> ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'=>['required' , 'min:3' , 'max:15']  
        ]);
         
        $password = $request->input('password'); 
        $re_password = $request->input('re_password');

         if($password === $re_password){
            $admin= new Admin;
                $admin->name= $request->input('name');
                $admin->email= $request->input('email');
                $newpassword=Hash::make($password);

                $admin->password=$newpassword;
                $admin->save();
                return redirect('/');
         }

         
         else {
            return response()->json(['success'=>false, 'message' => 'Login Fail, pls check password']);

            
         }

         

    }
}
