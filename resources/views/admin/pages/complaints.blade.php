@extends('admin.layouts.master')

@section('title')
  complaints
@endsection

@section('content')
    

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
         
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">{{__('messages.home')}}</a></li>
              <li class="breadcrumb-item active">{{__('messages.starter_page')}}</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
  
<div class="container">
 <a class='btn btn-success btn-sm mb-3'href="{{route('create_user')}}"style='width:100px;height:30px'>{{__('messages.create')}}</a> 
   <!-- SEARCH FORM -->
   <form class="form-inline">
    <div class="input-group input-group-sm">
      <input type="search"name='search'class="form-control form-control-navbar" placeholder="{{__('messages.search')}}" aria-label="Search">
      <div class="input-group-append">
        <button class="btn btn-navbar" type="submit">
          <i class="fas fa-search"></i>
        </button>
      </div>
    </div>
   </form>
 
  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">{{__('messages.id')}}</th>
        <th scope="col">{{__('messages.user')}}</th>
        <th scope="col">{{__('messages.messages')}}</th>
        <th scope="col">{{__('messages.action')}}</th>
      </tr>
    </thead>
    <tbody style='background:rgb(253, 253, 253);'>

        @forelse ($complaints as $complaint)
        <tr>
            <td scope="row">{{$complaint->id}}</td>
            <td scope="row">{{$complaint->user->id}}</td>
            <td scop='row'>{{$complaint->message}}</td>
    
            <td>
              <a style="" class='btn btn-danger btn-sm'href="{{route('complaints_delete',$complaint->id)}}">{{__('messages.delete')}}</a>   
            </td>
          </tr>
        @empty
            <p class='alert alert-success text-center'>No complaints sir !!</p>
        @endforelse

    </tbody>
  </table>
  <div class="d-flex justify-content-center">
    <small>{{$complaints->links()}}</small> 
  </div>
</div>



@endsection