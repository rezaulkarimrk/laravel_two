@extends('layouts.app')
@section('content')
    <div class="container mt-2 ">
        <div class="row justify-content-center">
            <div class="col-md-2" ></div>
            <div class="col-md-8" >
                <div class="card" >
                    <div class="card-header"><h2>{{__('Add New Category')}}</h2></div>
                    <div class="card-body" >
                        <a href="{{route('category.index')}}" class="btn btn-info btn-sm " >All Category</a>
                        <br/>
                        <form method="POST" action="{{route('category.store')}}" >
                            @csrf
                            <div class="mb-3">
                              <label for="categoryName" class="form-label">Add Category</label>
                              <input type="text" class="form-control @error('category_name') is-invalid @enderror" id="categoryName" name="category_name" placeholder="Category Name" value="{{old('category_name')}}" >

                              @error('category_name')
                                <span class="invalid-feedback" role="alert" >
                                    <strong>{{ $message}}</strong>
                                </span>
                              @enderror
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
