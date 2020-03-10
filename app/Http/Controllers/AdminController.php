<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Session;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin()
    {
        //$filename=Admin::select('file')->where('id',  Session::get('id') )->get();

        return view('admin-frontend.admin-index');
    }
    public function userTable()
    {
        return view('user-frontend.user-table');
    }
    
    public function index()
    {
        //$users= User::select('select * from users')->get();
        $users = User::orderBy("id")->get();
        return view('user-frontend.user-table' , ['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user-frontend.create-user');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required',
            'email'=>'required',
            'password' => 'required'  
        ]);

        /*User::create($request->all());
        return redirect('table');
                   // ->with('success','User Created Successfully');*/


        $password = $request->input('password');
        $newpassword=Hash::make($password);
            $user= new User;
                $user->name= $request->input('name');
                $user->email= $request->input('email');

                $user->password=$newpassword;
                $user->save();
                return redirect('table');
         
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = User::findOrFail($id);
        return view('user-frontend.edit-user',['admin'=>$admin] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=> 'required',
            'email'=>'required',
            'password'=> 'required' 
        ]);
        $admin = User::findOrFail($id);
        $admin->update($request->all());
        return redirect('table');
                    //->with('success',' Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin=User::findOrFail($id);
        $admin->delete();
        return redirect('table');
                        //->with('success', ' Deleted Successfully');
    }
}
