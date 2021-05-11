@extends('admin.layouts.master')

@section('title')
  Create Category
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
                <h3 class="card-title">Create Post</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class='form'role="form"method='POST'action="{{route('create_category_sotre')}}">
                @csrf
                <div class="card-body">

                  <div class="form-group">
                    <label for="exampleInputEmail1">Name Category</label>
                    <input type="text" class="form-control" name='name'value=''placeholder="Write Category">
                    @error('name')
                      <small class='alert alert-danger'>{{$message}}</small>
                    @enderror
                  </div>

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