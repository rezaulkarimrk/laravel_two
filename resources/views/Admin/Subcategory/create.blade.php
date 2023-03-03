@extends('layouts.app')
@section('content')
    <div class="container mt-2 ">
        <div class="row justify-content-center">
            <div class="col-md-2" ></div>
            <div class="col-md-8" >
                <div class="card" >
                    <div class="card-body" >
                        <a href="{{route('category.index')}}" class="btn btn-info btn-sm " >All Sub-Category</a>
                        <br/>
                        <form method="POST" action="{{route('subcategory.store')}}" >
                            @csrf
                            <div class="mb-3">
                                <label for="categoryName" class="form-label">Choose Category</label>
                                <select class="form-control" name="category_id" >
                                    @foreach($categoreis as $row)
                                        <option value="{{$row->id}}" >{{$row->category_name}}</option>
                                    @endforeach
                                </select>
                              </div>
                            <div class="mb-3">
                              <label for="categoryName" class="form-label">Add Sub-Category</label>
                              <input type="text" class="form-control @error('subcategory_name') is-invalid @enderror" id="categoryName" name="subcategory_name" placeholder="Sub-Category Name" value="{{old('subcategory_name')}}" >

                              @error('subcategory_name')
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
