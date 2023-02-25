<x-app-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8" >
                <div class="card" >
                    <div class="card-header"><h2>{{__('Update Category')}}</h2></div>
                    <div class="card-body" >
                        <a href="{{route('category.index')}}" class="btn btn-info btn-sm " >All Category</a>
                        <br/>
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
</x-app-layout>
