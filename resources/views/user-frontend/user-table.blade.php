@extends('user-layout.user-defualt')
@section('title')
<title>Create The User</title>
@stop
@section('content')

  <!-- Navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="container-fluid">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>User Table</h1>
            <br>
            <div class="pull-right">
              <a class="btn btn-success" href="{{ url('create') }}">Create New User</a>
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h2 class="card-title">User Table</h2>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>User Name</th>
                  <th>Email</th>
                  <th>Password</th>
                  <th>Action</th>
                </tr>
                </thead>
                 @foreach ($users as $user)
                <tbody>
                <tr>
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->email }}</td>
                  <td>{{ $user->password }}</td>
                  <td>
                    <form action="{{ url('destroy') }}/{{$user->id}}" method="POST">
                      <a class="btn btn-info" href="{{ url('edit') }}/{{$user->id}}">Edit</a>
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger">Delete</button>

                    </form>
                  </td>
                </tr>
                </tbody>
                @endforeach                
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

         
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- Control Sidebar -->

  <!-- /.control-sidebar -->

@stop

