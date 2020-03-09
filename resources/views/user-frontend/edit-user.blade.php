@extends('user-layout.user-defualt')
@section('title')
<title>Create The User</title>
@stop
@section('content')

<div class="container-fluid">
<div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Edit The User</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{ url('update') }}/{{$admin->id}}" method="post">
              	@csrf
              	@method('PUT')
                <div class="card-body">
                	<div class="form-group">
                    <label for="exampleInputName">User Name</label>
                    <input type="name" class="form-control" name="name" value="{{ $admin->name }}" id="exampleInputName" placeholder="Enter Name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" name="email" value="{{ $admin->email }}" id="exampleInputEmail1" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" name="password" value="{{ $admin->password }}" id="exampleInputPassword1" placeholder="Password">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
 </div>
 </div>
 @stop