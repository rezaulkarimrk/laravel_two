@extends('layouts.app')
@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Manage Posts</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active">Post Table</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content ">
    <div class="container-fluid">
      <div class="row">
        <div class="col-3"></div>
          <div class="col-8">
          <div class="card">
              <div class="card-header">
                <h3 class="card-title">All Posts</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <td>SL</td>
                    <td>Category</td>
                    <td>Sub-Category</td>
                    <td>Author</td>
                    <td>Title</td>
                    <td>Published</td>
                    <td>Status</td>
                    <td>Action</td>
                  </tr>
                  </thead>
                  <tbody>
                     @foreach ($posts as $key=>$row)
                      <tr>
                          <td>{{++$key}}</td>
                          <td>{{$row->category->category_name}}</td>
                          <td>{{$row->category->subcategory_name}}</td>
                          <td>{{$row->user->name}}</td>
                          <td>{{$row->title}}</td>
                          <td>{{$row->post_date}}</td>
                          <td>
                            @if($row->status==1)
                            <span class="badge badge-success">Active</span>
                            @else
                            <span class="badge badge-danger">Inactive</span>
                            @endif
                          </td>
                          <td>
                              <a href="{{route('category.edit', $row->id)}}" class="btn btn-sm btn-info" >Edit</a>
                              <a href="{{route('subcategory.delete', $row->id)}}" class="btn btn-sm btn-danger delete " >Delete </a>
                          </td>
                      </tr>
                      @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
        </div>
      </div>
    </div>    
  </section>
@endsection