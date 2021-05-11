@extends('admin.layouts.master')

@section('title')
  Profile
@endsection

@section('content')
    

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper d-flex justify-content-center">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section style='width:100%;'class="content">
      <div class="container-fluid">
   

            <!-- Profile Image -->
            <div class="card col-md-8 d-flex mx-auto my-5">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="{{asset('uploade\admin\user/'.Auth::user()->image)}}"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{Auth::user()->name}}</h3>

                <p class="text-muted text-center">{{Auth::user()->role}}</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>{{__('messages.email')}}</b> <a class="float-right">{{Auth::user()->email}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>{{__('messages.mobil')}}</b> <a class="float-right">{{Auth::user()->phone}}</a>
                  </li>

                  <li class="list-group-item">
                     <a href="{{route('update_user',Auth::user()->id)}}"class="btn btn-success w-100">Update</a>
                  </li>
                </ul>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>


@endsection