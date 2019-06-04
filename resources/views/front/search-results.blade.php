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
                    {{$profiles->count()}} result(s) from '{{request()->input('query')}}'
              </p>
            </div>
              
    
        </div>
        <div>
                <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Short Description</th>
                            <th></th>
                            <th>Price</th>
                          </tr>
                        </thead>
                        <tbody>
                            @forelse ($profiles as $profile)
                            <tr>
                                   
                                    <td>  {{$profile->user->name}}  </td>
                                    <td><a style="color:white" href="{{route('profile', $profile->id)}}" class="btn btn-primary btn-sm">View Profile</a></td>
                                    <td>{{str_limit($profile->shortDesc,40)}}</td>
                                    <td>{{$profile->price}}</td>
                             </tr>
                            @empty
                         <tr>
                                <td>No Results</td>
                                <td></td>
                                <td></td>
                                <td></td>
                         </tr>
                          @endforelse
                        </tbody>
                      </table>
        </div>
    </div>
    
</div>
@endsection