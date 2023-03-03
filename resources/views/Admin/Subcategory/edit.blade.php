@extends('layouts.app')
@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-2" ></div>
            <div class="col-md-8" >
                <div class="card" >
                    <div class="card-header"><h2>{{__('Update Sub-Category')}}</h2></div>
                    <div class="card-body" >
                        <form method="POST" action="{{route('subcategory.update', $data->id)}}" >
                            @csrf
                            <div class="mb-3">
                                <label for="categoryName" class="form-label">Choose Category</label>
                                <select class="form-control" name="category_id" >
                                    @foreach($categoreis as $row)
                                        <option value="{{$row->id}}" @if($row->id == $data->categoreis_id) selected  @endif  >{{$row->category_name}}</option>
                                    @endforeach
                                </select>
                              </div>
                            <div class="mb-3">ss
                              <label for="categoryName" class="form-label">Add Sub-Category</label>
                              <input type="text" class="form-control @error('subcategory_name') is-invalid @enderror" id="categoryName" name="subcategory_name" placeholder="Sub-Category Name" value="{{$data->subcategory_name}}" >

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
