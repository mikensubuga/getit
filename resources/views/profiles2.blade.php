@extends('layouts.base')

@section('content')
<div class="row">

<div class="col-lg">

        <!-- Blog Search Well -->
        <div class="well">
            <h4>Search Services</h4>
            <div class="input-group">
                <input type="text" class="form-control">
            
                <span class="input-group-btn">
                    <button class="btn btn-success" type="button">      
                        Search
                    </button>

                </span>
            </div>
            <!-- /.input-group -->
           
    
        </div>

        <!-- Blog Categories Well -->
        <div class="well">
            <h4>Categories</h4>
            <div class="row">
                <div class="col-md">
                    <ul class="list-group">
                        
                        @foreach ($categories as $category)
                    <li class="list-group-item "><a href="{{route('profileCategory', $category->id)}}">{{$category->name}}    <span class="badge badge-primary badge-pill pull-right">6</span>
                    </a>
                        </li>
                        @endforeach
                        
                    </ul>
                </div>
            
            </div>
            <!-- /.row -->
        </div>

        <!-- Side Widget Well -->
        <div class="well">
            <h4>Side Widget Well</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
        </div>

    </div>



<div class="col-lg">
            @foreach ($profiles as $profile)
            <div class="col-md-4">
                <!-- Card -->
<div class="card">

        <!-- Card image -->
        <div class="view overlay">
          <img class="card-img-top" src="https://mdbootstrap.com/img/Mockups/Lightbox/Thumbnail/img%20(67).jpg" height="200" alt="Card image cap">
          <a href="#!">
            <div class="mask rgba-white-slight"></div>
          </a>
        </div>
      
        <!-- Card content -->
        <div class="card-body">
                
          <!-- Title -->
          <h4 class="card-title">Nsubuga Mike<span class="pull-right"><i class="fa fa-star icon-a"><strong>5.0</strong></i></span>
          </h4>
          

          <!-- Text -->
          <div class="media">
              <div class="media-body">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content. </p>
              </div>
             <div class="avatar media-right">
                <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-8.jpg" class="img-circle center-block mr-3" height="50px" width="50px" alt="avatar">
            
            </div>
              
              
          </div>
         
          
          <hr/>
          <!-- Button -->
          <a href="#" class="btn btn-primary">View Profile</a>
          <p class=" text-success pull-right">UGX{{ $profile->price }}</p>

                          
        </div>
      
      </div>
      <!-- Card -->
            </div>
            
        @endforeach
   
</div>

   
@endsection
