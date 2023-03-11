@extends('layouts.app')
@section('content')
    <div class="container mt-2 ">
        <div class="row ">
            <div class="col-md-2" ></div>
            <div class="col-md-10" >
                <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit Post</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('post.update', $post->id)}}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Post title</label>
                        <input type="text" class="form-control" name="title" value="{{$post->title}}" placeholder="Post Tietle"  required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Category</label>
                        <select class="form-control" name="subcategory_id">
                            <option disabled selected >Choose Category</option>
                            @foreach($category as $cat)
                                @php
                                    $subcategories = DB::table('subcategories')->where('category_id', $cat->id)->get();
                                @endphp
                                <option disabled class="text-info" >{{$cat->category_name}}</option>
                                @foreach($subcategories as $sub)
                                    <option value="{{$sub->id}}" @if($sub->id==$post->subcategory_id) selected @endif >---{{$sub->subcategory_name}}</option>
                                @endforeach
                            @endforeach
                        </select>
                    </div>
                    {{-- <div class="form-group">
                        <label for="exampleInputP
                        assword1">Sub-Category</label>
                        <select class="form-control" name="subcategory_id">
                            <option>Example On</option>
                        </select>
                    </div> --}}
                    <div class="form-group">
                        <label for="exampleInputPassword1">Post Date</label>
                        <input type="date" name="post_date" required value="{{$post->post_date}}" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Taqs</label>
                        <input type="text" name="tags" class="form-control"  required value="{{$post->tags}}" />
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleInputPassword1">Description</label>
                        <textarea class="form-control summernote" name="description">{{$post->description}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">File input</label>
                        <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="image" >
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                        <input type="hidden" name="old_image" value="{{$post->image}}" />
                        <div class="input-group-append">
                            <span class="input-group-text">Upload</span>
                        </div>
                        </div>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="status" @if($post->status==1) checked @endif value="1">
                        <label class="form-check-label" for="exampleCheck1">Published Now</label>
                    </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
@endsection
