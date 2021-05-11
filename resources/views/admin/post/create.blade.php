@extends('admin.layouts.master')

@section('title')
  Create Post
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
              <form class='form'role="form"method='POST'action="{{route('create_post_store')}}"enctype='multipart/form-data'>
                @csrf
                <div class="card-body">

                  <div class="form-group">
                    <label for="exampleInputEmail1">title</label>
                    <input type="text" class="form-control" name='title'value=''id="exampleInputEmail1" placeholder="title">
                    @error('title')
                      <small class='alert alert-danger'>{{$message}}</small>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Content</label>
                    <textarea style='height:200px;'type="text" class="form-control" name='content'id="exampleInputEmail1" placeholder="content"></textarea>
                    @error('content')
                    <small class='alert alert-danger'>{{$message}}</small>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="exampleInputFile">image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        <input type="file" class="custom-file-input" name='image' id="exampleInputFile">                        
  
                     

                        @error('image')
                        <small class='alert alert-danger mt-5'>{{$message}}</small>
                        @enderror
                      </div>
                      <div class="input-group-append">
                      
                      </div>
                    </div>
                  </div>

                  <label>Choose a Category:</label>

                  <select class='form-control'name='category_id'>
                    @foreach ($category as $categorys)
                      <option value="{{$categorys->id}}">{{$categorys->name}}</option>
                    @endforeach
                   </select>
                   @error('category_id')
                   <small class='alert alert-danger'>{{$message}}</small>
                   @enderror

                 

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