<x-app-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8" >
                <div class="card" >
                    <div class="card-header"><h2>{{__('Dashboard')}}</h2></div>
                    <div class="card-body" >
                        <a href="{{route('category.index')}}" >All Category</a>
                        <br/>
                        @if(session('status'))
                            <div class="alert alert success" role="alert" >
                                {{session('status')}}
                            </div>
                        @endif

                        {{_('Your are logged in!')}} {{Auth::user()->name}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
