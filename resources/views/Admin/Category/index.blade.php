@extends('layouts.app')
@section('content')
    <!-- <div class="container mt-4 ">
        <div class="row justify-content-center">
            <div class="col-md-2" ></div>
            <div class="col-md-8" >
                <div class="card" >
                    <div class="card-header"><h2>{{__('All Category')}}</h2></div>
                    <div class="card-body" >
                        <a href="{{route('category.create')}}" class="btn btn-info btn-sm " >Add Category</a>
                        <br/>
                        <table>
                            <thead>
                                <tr>
                                    <td>SL</td>
                                    <td>Name</td>
                                    <td>Slug</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($category as $key=>$row)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{$row->category_name}}</td>
                                    <td>{{$row->category_slug}}</td>
                                    <td>
                                        <a href="{{route('category.edit', $row->id)}}" class="btn btn-sm btn-info" >Edit</a>
                                        <a href="{{route('category.delete', $row->id)}}" class="btn btn-sm btn-danger" >Delete </a>
                                    </td>
                                </tr>
                                @endforeach --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Category</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Category Table</li>
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
                  <h3 class="card-title">All Category</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <td>SL</td>
                      <td>Name</td>
                      <td>Slug</td>
                      <td>Action</td>
                    </tr>
                    </thead>
                    <tbody>
                       @foreach ($category as $key=>$row)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{$row->category_name}}</td>
                            <td>{{$row->category_slug}}</td>
                            <td>
                                <a href="{{route('category.edit', $row->id)}}" class="btn btn-sm btn-info" >Edit</a>
                                <a href="{{route('category.delete', $row->id)}}" class="btn btn-sm btn-danger" >Delete </a>
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
