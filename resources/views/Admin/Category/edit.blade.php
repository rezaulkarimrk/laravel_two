@extends('layouts.app')
@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-2" ></div>
            <div class="col-md-8" >
                <div class="card" >
                    <div class="card-header"><h2>{{__('Update Category')}}</h2></div>
                    <div class="card-body" >
                        <form method="POST" action="{{route('category.update', $data->id)}}" >
                            @csrf
                            <div class="mb-3">
                              <label for="categoryName" class="form-label">Add Category</label>
                              <input type="text" class="form-control" id="categoryName" name="category_name" placeholder="Category Name" value="{{ $data->category_name}}" >
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
