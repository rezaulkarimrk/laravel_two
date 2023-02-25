<x-app-layout>
    <div class="container">
        <div class="row justify-content-center">
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
                                @foreach ($category as $key=>$row)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{$row->category_name}}</td>
                                    <td>{{$row->category_slug}}</td>
                                    <td>
                                        <a href="{{route('category.edit', $row->id)}}" class="btn btn-sm btn-info" >Edit</a>
                                        <a href="" class="btn btn-sm btn-danger" >Delete </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
