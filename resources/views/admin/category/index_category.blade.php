@extends('admin.layouts.master')

@section('title')
    Categiry
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
    
 <a class='btn btn-success btn-sm mb-3'href="{{route('create_category')}}"style='width:100px;height:30px'>{{__('messages.create')}}</a> 
 
  <!-- SEARCH FORM -->
  <form class="form-inline"style='margin-left:7.5%;'>
    <div class="input-group input-group-sm">
      <input type="search"name='search'class="form-control form-control-navbar" placeholder="{{__('messages.search')}}" aria-label="Search">
      <div class="input-group-append">
        <button class="btn btn-navbar" type="submit">
          <i class="fas fa-search"></i>
        </button>
      </div>
    </div>
    </form>
 <div class="d-flex justify-content-center">
     
   <table style='width:85%;'class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">{{__('messages.id')}}</th>
            <th scope="col">{{__('messages.name')}}</th>
            <th scope="col">{{__('messages.action')}}</th>
          </tr>
        </thead>
        <tbody style='background:rgb(253, 253, 253);'>
          @foreach ($categories as $category)  
          <tr>
            <td scope="row">{{$category->id}}</td>
            <td scope="row">{{$category->name}}</td>
           <td scop='row'>
              <a class='btn btn-success btn-sm'href="{{route('update_category',$category->id)}}">{{__('messages.update')}}</a>  
              <a class='btn btn-danger btn-sm'href="{{route('delete_category',$category->id)}}">{{__('messages.delete')}}</a>  
            </td>
          </tr>
          @endforeach
       
        </tbody>
      </table>
 </div>
 <div class="d-flex justify-content-center">
  <small>{{$categories->links()}}</small> 
 </div>
</div>



@endsection