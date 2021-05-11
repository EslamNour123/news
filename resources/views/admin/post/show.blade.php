@extends('admin.layouts.master')

@section('title')
  Show Post
@endsection

@section('content')
    


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Show Article</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">

            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div style='width: 70%'class="card">
        <div class="card-header">
          <h3 class="card-title">{{$post->title}}</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body text-center">
         <img src="{{asset('uploade/admin/image/'.$post->image)}}"width='60%'height='20%'alt="{{$post->image}}">
          <p>
            The div element has no special meaning at all. It represents its children. It can be used with the class, lang, and title 
            attributes to mark up semantics common to a group of consecutive elements.
          </p>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <div class="container">
            <div class="row">
              <div class="col-md-8">
                <i class="fa fa-calendar"></i>::{{$post->created_at->format('Y-F-j')}}
              </div>
              <div class="col-md-4">
                {{$post->category->name }}&& {{Auth::user()->name}}
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->




</div>


@endsection