@extends('layouts.base')

@section('content')
<div class="row">

        <div class="col-lg-3">
           

                <!-- Blog Search Well -->
              {{-- include here --}}
            @include('inc.search')
                <!-- Blog Categories Well -->
                <div class="">
                    <h4>Categories</h4>
                    <div class="row">
                        <div class="col-md">
                            <ul class="list-group">
                                
                                @foreach ($categories as $category)
                            <li class="list-group-item list-group-item-action"><a href="{{route('profileCategory', $category->id)}}">{{$category->name}}    <span class="badge badge-primary badge-pill float-right">{{$category->profs->count()}}</span>
                            </a>
                                </li>
                                @endforeach
                                
                            </ul>
                        </div>
                    
                    </div>
                    <!-- /.row -->
                </div>
        
               
        
                       
 </div>
    <div class="col-lg-9">
        <div class="card">
            <div class="card-header">
                    Search Results
            </div>
            <div class="card-body">
                <p class="card-text">
                    9 result(s) from '{{request()->input('query')}}'
              </p>
            </div>
              
    
        </div>
        <div>
                <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Short Description</th>
                            <th>Price</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>John</td>
                            <td>Doe</td>
                            <td>john@example.com</td>
                          </tr>
                          
                        </tbody>
                      </table>
        </div>
    </div>
    
</div>
@endsection