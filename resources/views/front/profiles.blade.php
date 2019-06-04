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

       <div class="row">
           @foreach($profiles as $profile)
            <div class="col-lg-4 col-md-6 mb-4">
     
                                                    <!-- Card -->
                    <div class="card">

                            <!-- Card image -->
                            <div class="view overlay">
                            <img class="card-img-top" src="{{asset('/storage/' . $profile->profilePhoto)}}" height="200" alt="Card image cap">

                            <a href="{{route('profile', $profile->id)}}">
                                <div class="mask rgba-white-slight"></div>
                            </a>
                            </div>
                        
                            <!-- Card content -->
                            <div class="card-body">
                                    
                            <!-- Title -->
                            <span>
                            <a href="{{route('profile', $profile->id)}}"> 

                            <h6>{{ $profile->user->name }}
                                    <span class="float-right">
                                    <i class="fa fa-star icon-a">
                                        <strong>5.0</strong>
                                    </i>
                                </span>
                            </h6>
                             </span>
                            
                            

                            <!-- Text -->
                            <div class="media">
                                <div class="media-body">
                                        {{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content. </p> --}}
                                        <p class="card-text">{{str_limit($profile->shortDesc,40)}} </p>

                                </div>
                                <div class="avatar media-right">
                                    <img src="{{asset('/storage/' . $profile->user->avatar)}}" class="rounded-circle mr-3" height="50px" width="50px" alt="avatar">
                                
                                </div>
                                
                                
                            </div>
                            
                            
                            <hr/>
                            <div>
                                <!-- Button -->
                                <a href="{{route('profile', $profile->id)}}" class="btn btn-primary btn-sm">View Profile</a>
                                <p class=" text-success float-right" style="font-size:15px">
                                    <strong>UGX {{ $profile->price }}</strong></p>
                            </div>
                          

                                            
                            </div>
                        
                        </div>
       
            </div>
             @endforeach
            
        </div>
       
        {{$profiles->links()}}
       </div>
</div>


   
@endsection
