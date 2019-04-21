@extends('layouts.base')

@section('content')

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="panel-body">
                    <div class="card-header">{{$profile->user->name}}</div>
                    
                    <img style="width: 65%" src="{{asset('/storage/' . $profile->profilePhoto)}}"
                         class="img-responsive center-block">
                </div>
            </div><br>
            <div class="card">
                <div class="card-header">
                    About {{$profile->user->name}}
                </div>
                <div class="panel-body">
                    <p>{{ $profile->details }}</p>
                    
                </div>
            </div><br>
             <div class="card">
                <div class="card-header">
                    Reviews
                </div>
                {{-- @if(Auth::check() && Auth::user()->orders()) --}}
                @if(Auth::check())
                <div class="well">
                    <h5 class="card-title text-primary">Leave a Review:</h5>
                    {!! Form::open(['route' => 'reviews.store', 'method' => 'POST']) !!}
                    <div class="md-form">
                   
                        <input type="hidden" name="jobProfile_id" value="{{$profile->id}}"><br>
                        
                    {{Form::textarea('body','',['class' => 'form-control','rows'=>'3'])}}
                    </div>
                    
                    <fieldset class="rating"> Leave a Star out of 5:<br>
                              <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
                            <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                            <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Fair - 3 stars"></label>
                            <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                            <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="poor - 1 star"></label>
                        </fieldset>
                        <div class="float-right">
                                {{ Form::submit('Submit', ['class'=>'btn btn-primary'])}}
                        </div>
                   
                    {!! Form::close() !!}
                    {{-- <form role="form">
                        <div class="form-group">
                            <textarea class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form> --}}
                </div>
                 @endif
                <hr>
                <div class="panel-body">
                    @if($reviews->count() > 0)
                        <ul class="list-group">
                            @foreach($reviews as $review)
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <img src="{{asset('/storage/' . $review->photo)}}" class="rounded-circle center-block"
                                                 height="60" width="60">
                                        </div>
                                        <div class="col-md-10">
                                            <h5 class="media-heading"><span class="font-weight-bold blue-text">{{$review->author}}</span>
                                                <span class="small">{{$review->created_at->diffForHumans()}}</span>
                                                @for ($i = 0; $i < $review->rating; $i++)
                                                    <span class="float-right"><i class="fa fa-star icon-a"></i></span>
                                               @endfor
                                              
                                            </h5>
                                            <p>{{ $review->body }}</p>
                                            {{-- Reply Section start --}}
                                            @forelse($review->replies as $reply)
                                            <div id="nested-comment" class="media">
                                                <a class="pull-left" href="#">
                                                        <img class="rounded-circle center-block" width = "64" height= "64" src="{{asset('/storage/' . $reply->photo)}}" alt="">
                                                </a>
                                                <div class="media-body">
                                                    <h6 class="media-heading"><span class="font-weight-bold blue-text">{{$reply->author}}</span>
                                                        <small>{{$reply->created_at->diffForHumans()}}</small>
                                                        
                                                    </h6>
                                                           {{$reply->body}}
                                                </div>
                                                
                                            </div>
                                            @empty
                                            <br> No replies
                                            @endforelse
                                            {{-- Reply Section End --}}
                                            {{-- Reply Form Start Section --}}
                                            <br>
                                            <div class="comment-reply-container">
                                                <button class="toggle-reply btn btn-primary pull-right">Reply</button>
            
                                            <div class="comment-reply col-sm-6">
            
                                                {!! Form::open(['route' => 'replies.store', 'method' => 'POST']) !!}
                                                <div class="form-group">
                                               
                                                    <input type="hidden" name="review_id" value="{{$review->id}}">
                                                {{Form::textarea('body','',['class' => 'form-control','rows'=>'2'])}}
                                                </div>
                            
                                                {{ Form::submit('Submit', ['class'=>'btn btn-primary'])}}
                                                {!! Form::close() !!}
            
                                             </div>
                                        </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <h3>No review yet</h3>
                    @endif
                </div>
            </div> 
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="panel-body">
                @if(Auth::check())
                    <!-- Modal -->
                        <div id="myModal" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header" style="background-color: #1b6d85; color: white">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Order Details</h4>
                                    </div>
                                    <div class="modal-body">
                                      

                                        
                                        <form method="POST" action="{{ route('order.store') }}">
                                            {{csrf_field()}}
                                           
                                            <input name="delivered" value="0" hidden>
                                            <input name="profile_id" value="{{ $profile->id }}" hidden>
                                            <input name="price" value="{{ $profile->price }}" hidden>

                                            <div class="form-group">
                                                <label for="Price">Price:</label>
                                                <input type="number" required name="price" class="form-control" value="{{ $profile->price }}" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label for="Details">Details:</label>
                                            <input type="text" class="form-control input-sm" required name="details" rows ="5" class="form-control" value="{{$profile->details}}" disabled>
                                            </div>
                                            <button type="submit" class="btn btn-success btn-block">
                                                Order Now
                                            </button>
                                            <button type="button" class="btn btn-primary btn-lg" data-dismiss="modal">
                                                    Cancel
                                                </button>
                                        </form>
                                    
                                    </div>
                    
                                </div>
                            </div>
                        </div>
                        
                    @else
                        You need to login to order this person!
                    @endif
                
                    <div style="margin-top: 30px" class="text-center">
                        @if($profile->user->avatar == null)
                            <img src="/storage/users/default.png" class="rounded-circle center-block" height="100" width="100">
                        @else
                            <img src="{{asset('/storage/' . $profile->user->avatar)}}"
                                 class="rounded-circle center-block" height="100" width="100">
                        @endif
                    </div>
                    <a href="">
                        <h4 class="text-center">{{ $profile->user->name }}</h4>
                    </a>
                    @if(Auth::check() && Auth::user()->name != $profile->user->name ) 
                    <div class="text-center">
                        <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModal">
                            Order Now (UGX{{ $profile->price }})
                        </button>
                    </div>
                 
                    @else

                    <!-- Trigger the modal with a button -->
                    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#loginModal">
                            Order Now (UGX{{ $profile->price }})
                    </button>
                    
                    <!-- Modal -->
                    <div class="modal fade" id="loginModal" role="dialog">
                        <div class="modal-dialog">
                        
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                            <p>You need to Login to Order!</p>
                            <button class="btn btn-primary btn-md" data-toggle="modal" data-target="#elegantModalForm" data-dismiss="modal"> Login </button>
                            <button class="btn btn-primary btn-md" data-toggle="modal" data-target="#elegantRegisterForm" data-dismiss="modal"> Register </button>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                        
                        </div>
                    </div>
                    @endif
                    {{--<hr/>--}}
                    {{--{% if gig.user.profile.about %}--}}
                    {{--<p>{{ gig.user.profile.about }}</p>--}}
                    {{--{% else %}--}}
                    {{--<p>New seller</p>--}}
                    {{--{% endif %}--}}
                    
                </div>
            </div><br>
           

           
            <div class="card">
                    <div class="card-header">
                            Profile Overview
                         </div>
                <div class="row">
                    
                    <div class="col-xs-12 col-md-6">
                            <br/>
                        <div class="row rating-desc">
                        
                            
                            <div class="col-xs-3 col-md-3 text-right">
                                <span class="fa fa-star icon-a"></span>5
                            </div>
                            <div class="col-xs-8 col-md-9">
                                <div class="progress" style="height: 20px">
                                    <div class="progress-bar progress-bar-success"  role="progressbar" aria-valuenow="20"
                                        aria-valuemin="0" aria-valuemax="100" style="width: 80%" >
                                        <span class="sr-only">80%</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-3 col-md-3 text-right">
                                <span class="fa fa-star icon-a"></span>4
                            </div>
                            <div class="col-xs-8 col-md-9">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20"
                                        aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                        <span class="sr-only">60%</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-3 col-md-3 text-right">
                                <span class="fa fa-star icon-a"></span>3
                            </div>
                            <div class="col-xs-8 col-md-9">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20"
                                        aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                        <span class="sr-only">40%</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-3 col-md-3 text-right">
                                <span class="fa fa-star icon-a"></span>2
                            </div>
                            <div class="col-xs-8 col-md-9">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="20"
                                        aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                        <span class="sr-only">20%</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-3 col-md-3 text-right">
                                <span class="fa fa-star icon-a"></span>1
                            </div>
                            <div class="col-xs-8 col-md-9">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80"
                                        aria-valuemin="0" aria-valuemax="100" style="width: 15%">
                                        <span class="sr-only">15%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                    </div>
                    <div class="col-xs-12 col-md-6 text-center">
                        <h1 class="rating-num">5.1</h1>
                        <div class="rating">
                            <span class="fa fa-star icon-a "></span>
                            <span class="fa fa-star icon-a"></span>
                            <span class="fa fa-star icon-a"></span>
                            <span class="fa fa-star icon-a"></span>
                            <span class="fa fa-star-half-empty icon-a"></span>
                        </div>
                        <div>
                            <span class="fa fa-user"></span>188 total votes
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
<script type="text/javascript">
    $(".comment-reply-container .toggle-reply").click(function(){
        $(this).next().slideToggle("slow");
    });
</script>
@endsection