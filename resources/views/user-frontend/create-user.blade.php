@extends('user-layout.user-defualt')
@section('title')
<title>Create The User</title>
@stop
@section('content')

<div class="container-fluid">
<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create The User</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{ url('store') }}" method="post">
              	@csrf
              	@method('POST')
                <div class="card-body">
                	<div class="form-group">
                    <label for="exampleInputName">User Name</label>
                    <input type="name" class="form-control" name="name" id="exampleInputName" placeholder="Enter Name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
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