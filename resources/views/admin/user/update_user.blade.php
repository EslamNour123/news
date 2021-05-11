@extends('admin.layouts.master')


@section('title')
  Update User
@endsection

@section('content')

<div class="wrapper">



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            
          </div>

        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content mt-5">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-11">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Update User</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class='form'role="form"method='POST'action="{{route('update_user_store',$users->id)}}"enctype='multipart/form-data'>
                @csrf
                <div class="card-body">

                  <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" name='name'value='{{$users->name}}'placeholder="Write Name">
                    @error('name')
                      <small class='alert alert-danger'>{{$message}}</small>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="text" class="form-control" name='email'value='{{$users->email}}'placeholder="Write Email">
                    @error('email')
                      <small class='alert alert-danger'>{{$message}}</small>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Password </label>
                    <input type="password" class="form-control" name='password'value='{{$users->password}}'placeholder="Write Password">
                    @error('password')
                      <small class='alert alert-danger'>{{$message}}</small>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Image</label>
                    <input type="file" class="form-control" name='image'placeholder="Write Image">
                    @error('image')
                      <small class='alert alert-danger'>{{$message}}</small>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Phone</label>
                    <input type="text" class="form-control" name='phone'value='{{$users->phone}}'placeholder="Write Phone">
                    @error('phone')
                      <small class='alert alert-danger'>{{$message}}</small>
                    @enderror
                  </div>
              
                  <select name="role">
                    <option value='user' @if($users->role == 'user')
                        selected
                    @endif>user</option>
  
                    <option value="admin" @if($users->role == 'admin')
                      selected
                  @endif>admin</option>

                  <option value="writer" @if($users->role == 'writer')
                    selected
                @endif>writer</option>

                    @error('role')
                    <small class='alert alert-danger'>{{$message}}</small>
                  @enderror  
                </select>

                   <div class="form-check">
          
                    <label class="form-check-label" for="exampleCheck1"></label>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
           <!-- /.card -->

@endsection